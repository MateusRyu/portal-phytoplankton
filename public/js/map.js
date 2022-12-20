var attribution = new ol.control.Attribution({
	collapsible: false
});

mapsSource = new ol.source.OSM({
	url: 'https://tile.openstreetmap.org/{z}/{x}/{y}.png',
	attributions: [
		ol.source.OSM.ATTRIBUTION,
		'Desenvolvido com <a href="https://openlayers.org/">OpenLayers</a>' 
	],
	maxZoom: 18
})

const markersLayer = new ol.layer.Vector();

var map = new ol.Map({
	controls: ol.control.defaults.defaults({attribution: false}).extend([attribution]),
	layers: [
		new ol.layer.Tile({source: mapsSource}),
		markersLayer
	],
	target: 'map',
	view: new ol.View({
		center: ol.proj.fromLonLat([-40.35247, -10.84673]),
		maxZoom: 25,
		zoom: 3
	})
});

const geojsonObject = fetch('https://portal.loc/api/map')
	.then((data) => {
		return data.json()
	})
	.then((markersJson) => {
		source = new ol.source.Vector();
		for (let index in markersJson) {			
			addMarker(markersJson[index], source)			
		}
		markersLayer.setSource(source);
	});

function addMarker(marker, source) {
	let collectedAt = marker.collectedAt.split(' ');
	collectedAt[0] = collectedAt[0].split('-');
	collectedAt[1] = collectedAt[1].split(':');
	collectedAt = new Date(collectedAt[0][0], collectedAt[0][1], collectedAt[0][2], collectedAt[1][0], collectedAt[1][1], collectedAt[1][2]);
	let iconFeature = new ol.Feature({
		geometry: new ol.geom.Point(ol.proj.fromLonLat([marker.longitude, marker.latitude])),
		name: marker.name,
		register: marker.register,
		cover: marker.cover,
		localization: marker.city+', '+marker.state,
		coordinates: marker.longitude+', '+marker.latitude,
		description: marker.description,
		depth: marker.depth+' metros',
		unitMeasure: marker.measure.name+' ('+marker.measure.unit+')',
		fitoplancton: marker.fitoplancton,
		context: marker.context,
		reference: marker.reference,
		collectedAt: collectedAt.toLocaleString("pt-BR", { 
			weekday: 'long', 
			year: 'numeric', 
			month: 'long', 
			day: 'numeric', 
			hour12: false,
			hour: "2-digit", 
			minute: "2-digit"
		}),
		lastUpdate: marker.editedAt
	});

	let iconStyle = new ol.style.Style({
		image: new ol.style.Icon({
			anchorXUnits: 'fraction',
			anchorYUnits: 'pixels',
			src: marker.iconFile
		}),
	});

	iconFeature.setStyle(iconStyle);
	source.addFeature(iconFeature);
}

map.on('singleclick', function (event) {
	if (map.hasFeatureAtPixel(event.pixel) === true) {
		closePopup();
		const feature = map.forEachFeatureAtPixel(event.pixel, function (feature) {
			return feature;
		});
		const sampleImage = document.getElementById('popup-image')
		const sampleTitle = document.getElementById('popup-title')
		const sampleSubtitle = document.getElementById('popup-subtitle')
		const sampleReference = document.getElementById('popup-reference')
		const sampleLocalization = document.getElementById('popup-localization')
		const sampleCoordinates = document.getElementById('popup-coordinates')
		const sampleDepth = document.getElementById('popup-depth')
		const sampleCollectedAt = document.getElementById('popup-collectedAt')
		const sampleDescription = document.getElementById('popup-description')
		const sampleFitoplancton = document.getElementById('popup-fitoplancton')
		const sampleInfo = document.getElementById('popup-info')
		const popupPhytoplanktonImages = document.getElementById('phytoplanktonImages');
		const sampleLastUpdate = document.getElementById('popup-lastUpdate');
		const taxonMeasure = document.getElementById('taxonMeasure');

		const fitoplancton = feature.get('fitoplancton');
		const context = feature.get('context')
		
		if (feature.get('cover')) {
			sampleImage.src = feature.get('cover');
			sampleImage.alt = "Foto do local";
			sampleImage.classList.remove("placeholder");
			sampleImage.classList.remove("d-none");
		} else {
			sampleImage.src = "data:image/gif;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs="
			sampleImage.alt = "";
			sampleImage.classList.add("placeholder");
			sampleImage.classList.add("d-none");
		}
		let indicators = document.getElementById('phytoplanktonImages-indicators');
		let carrousel = document.getElementById('phytoplanktonImages-inner');
		indicators.innerHTML = '';
		carrousel.innerHTML = '';
		let phytoplanktonImages = fitoplancton.filter(taxon => taxon.image !== null );
		if (phytoplanktonImages.length > 0) {
			popupPhytoplanktonImages.classList.remove('d-none');
			for (let index = 0; index < phytoplanktonImages.length; index++) {
				let button = document.createElement('button');
				let item = document.createElement('div');
				let image = document.createElement('img');
				let caption = document.createElement('div');
				let text = document.createElement('p');

				item.classList.add('carousel-item');
				button.type = 'button';
				button.setAttribute('data-bs-target', '#phytoplanktonImages');
				button.setAttribute('data-bs-slide-to', index);
				if (index === 0) {
					button.classList.add('active');
					button.setAttribute('aria-current', "true");
					item.classList.add('active');
				}
				button.setAttribute('aria-label', 'Slide '+ index);

				image.src = phytoplanktonImages[index].image;
				image.classList.add('d-block');
				image.classList.add('w-100');
				image.alt = phytoplanktonImages[index].name;

				caption.classList.add('carousel-caption');
				caption.classList.add('d-none');
				caption.classList.add('d-md-block');

				text.classList.add('bg-black');
				text.classList.add('bg-opacity-25');
				text.innerText = phytoplanktonImages[index].name;				
                
				indicators.appendChild(button);
				caption.appendChild(text);
				item.appendChild(image);
				item.appendChild(caption);
				carrousel.appendChild(item);
			}
		} else {
			popupPhytoplanktonImages.classList.add('d-none');
		}
		
		sampleTitle.innerHTML = feature.get('name')
		sampleSubtitle.innerHTML = feature.get('register');
		sampleReference.innerHTML = feature.get('reference');
		sampleLocalization.innerHTML = feature.get('localization');
		sampleCoordinates.innerHTML = feature.get('coordinates');
		sampleDepth.innerHTML = feature.get('depth');
		taxonMeasure.innerHTML = feature.get('unitMeasure');
		sampleCollectedAt.innerHTML = feature.get('collectedAt');
		sampleDescription.innerHTML = feature.get('description');
		sampleLastUpdate.innerHTML = feature.get('lastUpdate');

		sampleFitoplancton.textContent = "";
		for (let index in fitoplancton) {
			let item = document.createElement("tr");
			let name = document.createElement("th");
			let max = document.createElement("th");
			let mean = document.createElement("th");
			name.scope = "row";
			name.innerHTML = fitoplancton[index]['name'];
			mean.innerHTML = fitoplancton[index]['mean'];
			max.innerHTML = fitoplancton[index]['max'];
			item.appendChild(name);
			item.appendChild(mean);
			item.appendChild(max);
			sampleFitoplancton.appendChild(item);
		}

		sampleInfo.textContent = "";
		for (let index in context) {
			let item = document.createElement("li");
			let sectionTitle = document.createElement("h5");
			let infoValue = context[index]['name']+': '+context[index]['value'];
			infoValue += context[index]['measure']?' '+context[index]['measure']:'';
			item.innerHTML = infoValue;
			sampleInfo.appendChild(sectionTitle);
			sampleInfo.appendChild(item);
		}
		openPopup();
	} else {
		closePopup();
	}
});

function openPopup() {
	const popup = document.getElementById('popup')
	popup.classList.remove('d-none')
}

function closePopup() {
	const popup = document.getElementById('popup')
	popup.classList.add('d-none')
}

// change mouse cursor when over marker
// map.on('pointermove', function (e) {
// 	const pixel = map.getEventPixel(e.originalEvent);
// 	const hit = map.hasFeatureAtPixel(pixel);
// 	map.getTarget().style.cursor = hit ? 'pointer' : '';
// });

// https://stackoverflow.com/questions/18155208/adding-data-to-an-open-layers-marker
// https://stackoverflow.com/questions/55789146/how-to-add-marker-to-open-layer-map
let params = (new URL(document.location)).searchParams;
let lat = params.get("lat");