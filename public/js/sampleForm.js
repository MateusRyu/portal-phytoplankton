function updateMeasure(input) {
    const selectInput = document.getElementById("measure");
    const labelUnidadeFitoplanctonMedia = document.getElementById("labelUnidadeFitoplanctonMedia");
    const labelUnidadeFitoplanctonMaxima = document.getElementById("labelUnidadeFitoplanctonMaxima");

    const value = input.value.split(",");
    if (value.length > 1) {
        labelUnidadeFitoplanctonMedia.innerText = value[1].trim();
        labelUnidadeFitoplanctonMaxima.innerText = value[1].trim();
    } else {
        const list = document.getElementById('taxonUnits');
        const text = list.querySelector('option[value="' + selectInput.value + '"]').label;
        labelUnidadeFitoplanctonMedia.innerText = text;
        labelUnidadeFitoplanctonMaxima.innerText = text;
    }

}

function addInputTextField(container, name, placeholder = '') {
    const newInput = document.createElement('input');
    newInput.type = 'text';
    newInput.name = name;
    newInput.id = name;
    newInput.maxlength = "50";
    newInput.placeholder = placeholder;

    container.appendChild(newInput);
}

function addInputDatalistField(container, name, placeholder = '', datalist) {
    const newInput = document.createElement('input');
    newInput.type = 'text';
    newInput.name = name;
    newInput.id = name;
    newInput.maxlength = "50";
    newInput.setAttribute('list', datalist);
    newInput.placeholder = placeholder;

    container.appendChild(newInput);
}

function addInputNumberField(container, name, placeholder = '') {
    const newInput = document.createElement('input');
    newInput.type = 'number';
    newInput.name = name;
    newInput.id = name;
    newInput.step = "0.01";
    newInput.min = 0;
    newInput.max = 99999999;
    newInput.placeholder = placeholder;

    container.appendChild(newInput);
}

function addInputImageField(container, name) {
    const newInput = document.createElement('input');
    newInput.type = 'file';
    newInput.name = name;
    newInput.accept = "image/*";
    onchange = "validateSize(this)";
    newInput.id = name;

    container.appendChild(newInput);
}

function addInput(form) {
    let line = document.getElementById(form).childElementCount;
    const newdiv = document.createElement('tr');
    newdiv.id = `${form}_${line}`

    switch (form) {
        case "fitoplancton":
            const taxon = document.createElement('td');
            const mean = document.createElement('td');
            const max = document.createElement('td');
            const img = document.createElement('td');
            addInputDatalistField(taxon, `taxon_${line}`, 'Nome', 'taxon');
            addInputNumberField(mean, `mean_${line}`, 'Média');
            addInputNumberField(max, `max_${line}`, 'Máximo');
            addInputImageField(img, `image_${line}`);
            newdiv.appendChild(taxon);
            newdiv.appendChild(mean);
            newdiv.appendChild(max);
            newdiv.appendChild(img);
            break;

        case "auxiliar":
            const name = document.createElement('td');
            const value = document.createElement('td');
            const unit = document.createElement('td');
            const other = document.createElement('td');
            addInputDatalistField(name, `name_${line}`, 'Nome. Ex: salinidade da água', 'dataName');
            addInputTextField(value, `value_${line}`, 'Valor encontrado. Ex: 35,3');
            addInputDatalistField(unit, `unit_${line}`, 'Unidade de medida. Ex: g/kg', 'dataUnit');
            newdiv.appendChild(name);
            newdiv.appendChild(value);
            newdiv.appendChild(unit);
            break;
    }

    const deleteButton = document.createElement('button');
    deleteButton.classList.add('btn');
    deleteButton.classList.add('btn-outline-danger');
    deleteButton.type = 'button';
    deleteButton.innerText = '☓';
    deleteButton.onclick = function (e) {
        if (confirm('Realmente deseja deletar estes campos?')) {
            const row = e.target.parentNode;
            row.remove();;

            return true;
        }
        return false;
    }

    newdiv.appendChild(deleteButton);
    document.getElementById(form).appendChild(newdiv);
}

function validateSize(input, maxSizeInMB) {
    const bytesPerMB = 1024 * 1024
    if (input.files[0].size > maxSizeInMB * bytesPerMB) {
        alert("Imagem é muito grande! O arquivo precisa ter menos que "+maxSizeInMB+" MB.");
        input.value = "";
    };
}

function addGeoData() {
    const lat = document.getElementById("latitude").value;
    const lon = document.getElementById("longitude").value;
    const city = document.getElementById("city");
    const state = document.getElementById("state");
    const country = document.getElementById("country");
    const params = 'format=json&zoom=10&accept-language=pt-BR';
    const link = 'https://nominatim.openstreetmap.org/reverse?lat=' + lat + '&lon=' + lon + '&' + params;
    const data = fetch(link);
    data.then((response) => { return response.json() })
        .then((json) => {
            let address = json.address;
            if (address.city && address.city !==  undefined) {
                city.value = address.city;
            }
            if (address.state && address.state !==  undefined) {
                state.value = json.address.state;
            }
            if (address.country && address.country !==  undefined) {
                country.value = json.address.country;
            }
        })
        .catch((error) => {
            console.log(error)
        })
}

beforeSubmit = function () {
    const submitButtonText = document.getElementById("submitButtonText");
    const spinner = document.getElementById("spinner");


    spinner.classList.remove('d-none');
    submitButtonText.innerText = "Preparando para enviar...";
}