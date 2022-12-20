<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Library\Spreadsheet;
use App\Library\Session;
use App\Library\Image;
use App\Models\Taxon;
use App\Models\Fitoplancton;
use App\Models\Amostra as Sample;
use App\Models\Variavel_auxiliar as Info;
use App\Models\Contexto as Context;
use App\Models\Pais as Country;
use App\Models\Estado as State;
use App\Models\Cidade as City;

class SampleController extends Controller
{
    public function showSample($id, $alert=''): void
    {
        $modelSamples = new Sample();

        $samples = $modelSamples->getSamplesByRegisterId($id);
        $user = Session::getUser();

        $responseContent = parent::load('pages/samples/allSamples', array(
            'id' => $id,
            'username' => $user['firstName'],
            'role' => $user['role'],
            'samples' => $samples,
            'alert' => $alert
        ));
        $responseContent->sendResponse();
    }

    public function formSampleManual($registerId, $alert=''): void
    {
        $modelSamples = new Sample();
        $modelTaxon = new Taxon();
        $modelInfo = new Info();

        $samples = $modelSamples->getSamplesByRegisterId($registerId);
        $taxon = $modelTaxon->getAllNames();
        $taxonMeasureUnits = $modelSamples->getMeasureUnits();
        $info = $modelInfo->getMeasureUnits();
        $user = Session::getUser();
        $dataNames = array();
        $dataUnits = array();

        foreach ($info as $key => $value) {
            if (in_array($value['name'], $dataNames) == false){
                array_push($dataNames, $value['name']);
            }
            if (in_array($value['unit'], $dataUnits) == false){
                array_push($dataUnits, $value['unit']);
            }
        }
        $taxonUnits = array();
        for ($i = 0; $i < count($taxonMeasureUnits); ++$i) {
            $unit = explode(",", $taxonMeasureUnits[$i]['label']);
            $measure = [
                'sampleId' => $taxonMeasureUnits[$i]['id'],
                'measure' => trim($unit[0])??'',
                'unit' => trim($unit[1])?trim($unit[1]):''
            ];
            array_push($taxonUnits, $measure);
        }

        $responseContent = parent::load('pages/samples/formManualInsert', array(
            'id' => $registerId,
            'username' => $user['firstName'],
            'role' => $user['role'],
            'samples' => $samples,
            'taxon' => $taxon,
            'taxonUnits' => $taxonUnits,
            'dataNames' => $dataNames,
            'dataUnits' => $dataUnits,
            'alert' => $alert
        ));
        $responseContent->sendResponse();
    }

    public function formSampleAutomatic($id, $alert=''): void
    {
        $modelSamples = new Sample();
        $modelTaxon = new Taxon();
        $modelInfo = new Info();

        $samples = $modelSamples->getSamplesByRegisterId($id);
        $taxon = $modelTaxon->getAllNames();
        $taxonMeasureUnits = $modelSamples->getMeasureUnits();
        $info = $modelInfo->getMeasureUnits();
        $user = Session::getUser();
        $dataNames = array();
        $dataUnits = array();

        foreach ($info as $key => $value) {
            if (in_array($value['name'], $dataNames) == false){
                array_push($dataNames, $value['name']);
            }
            if (in_array($value['unit'], $dataUnits) == false){
                array_push($dataUnits, $value['unit']);
            }
        }
        $taxonUnits = array();
        for ($i = 0; $i < count($taxonMeasureUnits); ++$i) {
            $unit = explode(",", $taxonMeasureUnits[$i]['label']);
            $measure = [
                'sampleId' => $taxonMeasureUnits[$i]['id'],
                'measure' => trim($unit[0])??'',
                'unit' => trim($unit[1])?trim($unit[1]):''
            ];
            array_push($taxonUnits, $measure);
        }

        $responseContent = parent::load('pages/samples/formAutomaticInsert', array(
            'id' => $id,
            'username' => $user['firstName'],
            'role' => $user['role'],
            'samples' => $samples,
            'taxon' => $taxon,
            'taxonUnits' => $taxonUnits,
            'dataNames' => $dataNames,
            'dataUnits' => $dataUnits,
            'alert' => $alert
        ));
        $responseContent->sendResponse();
    }

    private function prepareToStoreImage($prefixName, $image)
    {
        $Image = new Image();
        $uniqueId = uniqid($prefixName);
        $extension = pathinfo($image['full_path'])['extension'];
        $path = $uniqueId . '.' . $extension;
        $file = $image['tmp_name'];
        $success = $Image->save($path, $file);

        if ($success){
            return $path;
        }
        return false;
    }

    public function updateCover($sampleId): void
    {
        $registerId = $_POST['registerId'];
        $error = $_FILES['image']['error'];
        $mbInBytes = 1024 * 1024;
        $maxSize = 5 * $mbInBytes;
        if ($_FILES['image']['size'] > $maxSize || $error === UPLOAD_ERR_INI_SIZE || $error === UPLOAD_ERR_FORM_SIZE) {
            $alert = 'Tamanho do arquivo é muito grande e o processo
                não foi concluido. O tamanho máximo é de 5 MB';
            $this->editSample($registerId, $sampleId, $alert);
        }

        if ($error === UPLOAD_ERR_PARTIAL) {
            $alert = 'Erro durante a transmissão do arquivo. Dados chegaram
                corrompidos e o processo foi cancelado';
            $this->editSample($registerId, $sampleId, $alert);
        }

        if ($error === UPLOAD_ERR_NO_FILE) {
            $alert = 'Erro: não foi encontrado nenhuma imagem. O processo foi cancelado';
            $this->editSample($registerId, $sampleId, $alert);
        }

        if ($error === UPLOAD_ERR_NO_TMP_DIR || $error === UPLOAD_ERR_CANT_WRITE || $error === UPLOAD_ERR_EXTENSION) {
            $alert = 'Erro no servidor. Tente atualizar a imagem mais tarde.
                Caso esse problema persista, por favor, nos informe.';
            $this->editSample($registerId, $sampleId, $alert);
        }

        $user = Session::getUser();
        $Image = new Image();
        $image = [
            'full_path' => $_FILES['image']['full_path'],
            'tmp_name' => $_FILES['image']['tmp_name'],
            'size' => $_FILES['image']['size']
        ];
        $prefixName = $user['id'].'-'.$sampleId.'-';
        $path = $this->prepareToStoreImage($prefixName, $image);
        $fullPath = Image::$uploadPublicDir.$path;

        $sample = new Sample();

        $oldPath = $sample->getCoverPathById($sampleId);
        $sample->updateCoverById($sampleId, $fullPath);
        $this->editSample($registerId, $sampleId);
        $Image->delete($oldPath['path']);
    }

    public function deleteCover($sampleId): void
    {
        $sample = new Sample();
        $sample->deleteCoverById($sampleId);
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        $path = $sample->getCoverPathById($sampleId);
        $image = new Image();
        $image->delete($path['path']);
        exit();
    }

    public function updateImage($sampleId): void
    {
        $registerId = $_POST['registerId'];
        $error = $_FILES['image']['error'];
        $mbInBytes = 1024 * 1024;
        $maxSize = 5 * $mbInBytes;
        if ($_FILES['image']['size'] > $maxSize || $error === UPLOAD_ERR_INI_SIZE || $error === UPLOAD_ERR_FORM_SIZE) {
            $alert = 'Tamanho do arquivo é muito grande e o processo
                não foi concluido. O tamanho máximo é de 5 MB';
            $this->editSample($registerId, $sampleId, $alert);
        }

        if ($error === UPLOAD_ERR_PARTIAL) {
            $alert = 'Erro durante a transmissão do arquivo. Dados chegaram
                corrompidos e o processo foi cancelado';
            $this->editSample($registerId, $sampleId, $alert);
        }

        if ($error === UPLOAD_ERR_NO_FILE) {
            $alert = 'Erro: não foi encontrado nenhuma imagem. O processo foi cancelado';
            $this->editSample($registerId, $sampleId, $alert);
        }

        if ($error === UPLOAD_ERR_NO_TMP_DIR || $error === UPLOAD_ERR_CANT_WRITE || $error === UPLOAD_ERR_EXTENSION) {
            $alert = 'Erro no servidor. Tente atualizar a imagem mais tarde.
                Caso esse problema persista, por favor, nos informe.';
            $this->editSample($registerId, $sampleId, $alert);
        }

        $user = Session::getUser();
        $Image = new Image();
        $image = [
            'full_path' => $_FILES['image']['full_path'],
            'tmp_name' => $_FILES['image']['tmp_name'],
            'size' => $_FILES['image']['size']
        ];
        $prefixName = $user['id'].'-'.$sampleId.'-';
        $path = $this->prepareToStoreImage($prefixName, $image);
        $fullPath = Image::$uploadPublicDir.$path;

        $fitoplancton = new fitoplancton();
        $oldPath = $fitoplancton->getImagePathById($sampleId);
        $fitoplancton->updateImageById($sampleId, $fullPath);
        $this->editSample($registerId, $sampleId);
        $Image->delete($oldPath['path']);
    }

    public function deleteImage($sampleId): void
    {
        $fitoplancton = new fitoplancton();
        $fitoplancton->deleteImageById($sampleId);
        $path = $fitoplancton->getImagePathById($sampleId);
        $image = new Image();
        $image->delete($path['path']);
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit();
    }

    public function sendToCurate($registerId, $sampleId): void
    {
        $modelSamples = new Sample();
        $modelSamples->updateSampleToCurate($sampleId);
        parent::redirect('registros/'.$registerId.'/amostras');
    }

    public function sendAllToCurate($registerId): void
    {
        $modelSamples = new Sample();
        $modelSamples->updateSamplesToCurateByRegisterId($registerId);
        parent::redirect('registros/'.$registerId.'/amostras');
    }

    public function storeImages($files, $user, $id)
    {
        $imagesPaths = array();
        $updateImagesPaths = array();
        $coverDir = '';
        foreach ($files as $filename => $file) {
            $image = [
                'name' => $filename,
                'full_path' => $file['full_path'],
                'tmp_name' => $file['tmp_name'],
                'size' => $file['size']
            ];
            if ($file['error'] === UPLOAD_ERR_OK) {
                $prefixName = $user['id'].'-'.$id.'-';
                $path = $this->prepareToStoreImage($prefixName, $image);

                if ($path) {
                    if ($image['name'] == 'fotoLocal') {
                        $coverDir = Image::$uploadPublicDir.$path;
                    } elseif (parent::strStartWith($image['name'], 'image_')) {
                        $imagesPaths[$image['name']] = Image::$uploadPublicDir.$path;
                    } elseif (parent::strStartWith($image['name'], 'currentImage_')) {
                        $updateImagesPaths[$image['name']] = Image::$uploadPublicDir.$path;
                    }
                }
            }
        }

        return [
            'updateImagesPaths' => $updateImagesPaths,
            'imagesPaths' => $imagesPaths,
            'coverDir' => $coverDir
        ];
    }

    private function createAddress(array $inputs): array
    {
        $country = new Country();
        $state = new State();
        $city = new City();
        $countryId = $country->create($inputs['country']);
        $stateId = $state->create($inputs['state'], $countryId);
        $cityId = $city->create($inputs['city'], $stateId);
        unset($inputs['city']);
        unset($inputs['state']);
        unset($inputs['country']);

        return [
            'inputs' => $inputs,
            'countryId' => $countryId,
            'stateId' => $stateId,
            'cityId' => $cityId
        ];
    }

    private function constructSampleFromForm($registerId, $inputs, $cityId): array
    {
        $sample = new Sample();
        $measureInput = $sample->getMeasureUnitById($inputs['measure']);
        $measure = ($inputs['newMeasure'] != '')?$inputs['newMeasure']:$measureInput['label'];
        $result = [
            'registerId' => $registerId,
            'name' => $inputs['nameSample'],
            'latitude' => $inputs['latitude'],
            'longitude' => $inputs['longitude'],
            'city' => $cityId,
            'depth' => $inputs['profunfidade'],
            'colectedAt' => str_replace('T', ' ', $inputs['data']),
            'editedAt' => date("Y-m-d H:i:s", time()+(int)date('T')),
            'status' => Sample::$status['draft'],
            'coverDir' => false,
            'unitMeasure' => $measure,
        ];

        unset($inputs['nameSample']);
        unset($inputs['latitude']);
        unset($inputs['longitude']);
        unset($inputs['profunfidade']);
        unset($inputs['data']);
        unset($inputs['measure']);
        unset($inputs['newMeasure']);
        $result['inputs'] = $inputs;

        return $result;
    }

    private function insertTaxon($sampleId, $sampled)
    {
        $fitoplancton = new fitoplancton();
        $taxon = new Taxon();
        foreach ($sampled as $index => $value) {
            if (array_key_exists('taxon', $value)){
                if ($value['taxon'] != '') {
                    $taxonId = $taxon->create($value['taxon']);
                    $fitoplancton->create($value, $sampleId, $taxonId);
                }
            }
        }
    }

    private function updateTaxon($sampleId, $updatedSample)
    {
        $fitoplancton = new fitoplancton();
        $taxon = new Taxon();
        foreach ($updatedSample as $index => $value) {
            if (array_key_exists('deleteFitoplancton', $value)){
                $image = new Image();
                $path = $fitoplancton->getImagePathById($sampleId);
                $fitoplancton->delete($index);
                $image->delete($path['path']);
            } elseif (array_key_exists('currentTaxon', $value)){
                if ($value['currentTaxon'] != '') {
                    $taxonId = $taxon->create($value['currentTaxon']);
                    $fitoplancton->update($value, $index, $taxonId);
                }
            }
        }
    }

    private function insertContext($sampleId, $context)
    {
        $var = new Info();
        $Context = new Context();
        foreach ($context as $key => $value) {
            $varId = $var->create($value['name'], $value['unit']);
            $Context->create($value['value'], $sampleId, $varId);
        }
    }

    private function updateContext($sampleId, $updatedSample)
    {
        $var = new Info();
        $context = new Context();
        foreach ($updatedSample as $index => $value) {
            $varId = $var->create($value['currentName'], $value['currentUnit']);
            if (array_key_exists('deleteContext', $value)){
                $context->delete($sampleId, $varId);
            } elseif (array_key_exists('currentName', $value)){
                if ($value['currentName'] != '') {
                    $context->update($value['currentValue'], $sampleId, $varId);
                }
            }
        }
    }

    private function organizeRestOfInputs($inputs)
    {
        $sampled = array();
        $context = array();
        $updatedSample = array();
        $updatedContext = array();
        $sampleUpdateInputs = ['currentTaxon', 'currentMean', 'currentMax', 'deleteFitoplancton'];
        $contextUpdateInputs = ['currentName', 'currentValue', 'currentUnit', 'deleteContext'];
        $sampleInputs = ['taxon', 'mean', 'max'];
        $contextInputs = ['name', 'value', 'unit'];

        foreach ($inputs as $name => $value) {
            $index = explode("_", $name);
            if (in_array($index[0], $sampleUpdateInputs)) {
                $updatedSample[$index[1]][$index[0]] = $value;
            } elseif (in_array($index[0], $contextUpdateInputs)) {
                $updatedContext[$index[1]][$index[0]] = $value;
            } elseif (in_array($index[0], $sampleInputs)) {
                $sampled[$index[1]][$index[0]] = $value;
            } elseif (in_array($index[0], $contextInputs)) {
                $context[$index[1]][$index[0]] = $value;
            }
        }
        return [
            'sampled' => $sampled,
            'context' => $context,
            'updatedSample' => $updatedSample,
            'updatedContext' => $updatedContext
        ];
    }

    public function insertSampleFromForm($registerId): void
    {
        $inputs = parent::normalizeInputs($_POST);
        $inputs = $this->createAddress($inputs);
        extract($inputs);
        $sample = $this->constructSampleFromForm($registerId, $inputs, $cityId);
        $inputs = array_pop($sample);

        if (empty($sample['unitMeasure'])) {
            $this->formSampleManual($registerId, 'Preenchimento incorreto: unidade de medida da coleta não definido');
            exit();
        }

        $user = Session::getUser();
        $imagesPaths = $this->storeImages($_FILES, $user, $registerId);
        if ($imagesPaths === 1){
            $this->formSampleManual($registerId, 'Erro ao enviar imagens. O cadastro não foi concluido.');
            exit();
        } elseif ($imagesPaths === 2){
            $this->formSampleManual($registerId, 'Erro interno ao salvar as imagens. O cadastro não foi concluido.');
            exit();
        }
        extract($imagesPaths);
        $sample['coverDir'] = $coverDir;

        $sampleModel = new Sample();
        $sampleId = $sampleModel->createFromForm($sample);

        $inputs = $this->organizeRestOfInputs($inputs);
        extract($inputs);
        foreach ($imagesPaths as $index => $value) {
            $index = explode("_", $index);
            $sampled[$index[1]]['imagePath'] = $value;
        }

        $this->insertTaxon($sampleId, $sampled);
        $this->insertContext($sampleId, $context);

        parent::redirect('registros/'.$registerId.'/amostras');
    }

    public function deleteSample($registerId, $sampleId): void
    {
        $Amostra = new Sample();
        $Amostra->deleteById($sampleId);
        parent::redirect('registros/'.$registerId.'/amostras');
    }

    public function showSamplesToCurate(): void
    {
        $config = require APP_DIR.'/configurations/app.php';
        $baseUrl = $config["url"];
        $user = Session::getUser();
        $fitoplanctonModel = new Fitoplancton();
        $contextModel = new Context();
        $Amostra = new Sample();
        $samples = $Amostra->getSamplesToCurate();
        $data = array();
        $markers = array();

        foreach ($Amostra::$marker as $key => $value) {
            $marker = [
                'label' => $key,
                'value' => $value
            ];
            array_push($markers, $marker);
        }

        foreach ($samples as $sample) {
            $id = $sample['id'];
            $measure = explode(", ", $sample['measure']);

            $editedAtRaw = explode(' ', $sample['editedAt']);
            $editedAtDate = array_reverse(explode('-', $editedAtRaw[0]));
            $editedAt = implode('/', $editedAtDate).' '.$editedAtRaw[1];

            $colectedAtRaw = explode(' ', $sample['colectedAt']);
            $colectedAtDate = array_reverse(explode('-', $colectedAtRaw[0]));
            $colectedAt = implode('/', $colectedAtDate).' '.$colectedAtRaw[1];

            $sample['cover'] = $sample['cover']?$baseUrl.$sample['cover']:false;
            $sample['longitude'] = number_format($sample['longitude'], 6, '.', ',');
            $sample['latitude'] = number_format($sample['latitude'], 6, '.', ',');
            $sample['measure'] = $measure[0].' ('.$measure[1].')';
            $sample['context'] = $contextModel->getDataBySampleId($id);
            $sample['fitoplancton'] = $fitoplanctonModel->getFitoplanctonBySampleId($id);
            $sample['editedAt'] = $editedAt;
            $sample['colectedAt'] = $colectedAt;
            $sample['images'] = array();

            foreach ($sample['fitoplancton'] as &$taxon) {
                if ($taxon['image'] == null) {
                    unset($taxon['image']);
                } else {
                    $image = [
                        'name'=> $taxon['name'],
                        'path' => array_pop($taxon)
                    ];
                    array_push($sample['images'], $image);
                }
            }
            $data[$id] = $sample;
        }
        $responseContent = parent::load('pages/samples/curateList', array(
            'username' => $user['firstName'],
            'role' => $user['role'],
            'samples' => $data,
            'markers' => $markers
        ));
        $responseContent->sendResponse();
    }

    public function approveSample($sampleId): void
    {
        $modelSamples = new Sample();
        $user = Session::getUser();
        $feedback = 'Aprovado por: '.$user['username'].' #'.$user['id'];
        $marker = $_POST['marker'];
        $modelSamples->approveSample($sampleId, $feedback, $marker);

        parent::redirect('curadoria');
    }

    public function rejectSample($sampleId): void
    {
        $modelSamples = new Sample();
        $feedback = $_POST['feedback'];
        $modelSamples->disapproveSample($sampleId, $feedback);

        parent::redirect('curadoria');
    }

    public function showFormEditSample($registerId, $sampleId, $alert=''): void
    {
        $modelSamples = new Sample();
        $modelTaxon = new Taxon();
        $contextModel = new Context();
        $infoModel = new Info();
        $fitoplanctonModel = new Fitoplancton();

        $samples = $modelSamples->getSamplesByRegisterId($registerId);
        $sample = $modelSamples->getSampleById($sampleId);
        $sample['context'] = $contextModel->getDataBySampleId($sampleId);
        $sample['fitoplancton'] = $fitoplanctonModel->getFitoplanctonBySampleId($sampleId);

        $taxon = $modelTaxon->getAllNames();
        $taxonMeasureUnits = $modelSamples->getMeasureUnits();
        $info = $infoModel->getMeasureUnits();
        $user = Session::getUser();
        $dataNames = array();
        $dataUnits = array();
        foreach ($info as $key => $value) {
            if (in_array($value['name'], $dataNames) == false){
                array_push($dataNames, $value['name']);
            }
            if (in_array($value['unit'], $dataUnits) == false){
                array_push($dataUnits, $value['unit']);
            }
        }

        $taxonUnits = array();
        foreach ($taxonMeasureUnits as $key => $value) {
            $id = ($value['label']==$sample['measureUnit'])?$sample['id']:$key;
            $unit = explode(',', $value['label']);
            $measure = [
                'sampleId' => $id,
                'measure' => trim($unit[0])??'',
                'unit' => isset($unit[1])?trim($unit[1]):''
            ];
            array_push($taxonUnits, $measure);
        }
        $measureUnit = explode(',', $sample['measureUnit']);
        $sample['measureUnit'] = [
            'measure' => $measureUnit[0],
            'unit' => isset($measureUnit[1])?$measureUnit[1]:''
        ];

        $responseContent = parent::load('pages/samples/formManualInsert', array(
            'id' => $registerId,
            'sample' => $sample,
            'username' => $user['firstName'],
            'role' => $user['role'],
            'samples' => $samples,
            'taxon' => $taxon,
            'taxonUnits' => $taxonUnits,
            'dataNames' => $dataNames,
            'dataUnits' => $dataUnits,
            'alert' => $alert
        ));
        $responseContent->sendResponse();
    }

    public function updateSample($sampleId)
    {
        $inputs = parent::normalizeInputs($_POST);
        $inputs = $this->createAddress($inputs);
        extract($inputs);
        $sampleModel = new Sample();
        $registerId = $sampleModel->getRegisterIdBySampleId($sampleId)['registerId'];
        $sample = $this->constructSampleFromForm($registerId, $inputs, $cityId);
        $inputs = array_pop($sample);

        if (empty($sample['unitMeasure'])) {
            $this->formSampleManual($registerId, 'Preenchimento incorreto: unidade de medida da coleta não definido');
            exit();
        }

        $user = Session::getUser();
        $imagesPaths = $this->storeImages($_FILES, $user, $registerId);
        if ($imagesPaths === false){
            $this->formSampleManual($registerId, 'Erro ao enviar imagens. O cadastro não foi concluido.');
            exit();
        }

        extract($imagesPaths);
        if (!empty($coverDir)){
            $oldPath = $sampleModel->getCoverPathById($sampleId);
            $sampleModel->updateCoverById($sampleId, $coverDir);
            $this->editSample($registerId, $sampleId);
            $Image->delete($oldPath['path']);
        }

        $sampleModel = new Sample();
        $sampleModel->updateBySampleId($sampleId, $sample);

        $inputs = $this->organizeRestOfInputs($inputs);
        extract($inputs);

        foreach ($imagesPaths as $index => $value) {
            $index = explode("_", $index);
            $sampled[$index[1]]['imagePath'] = $value;
        }
        foreach ($updateImagesPaths as $index => $value) {
            $index = explode("_", $index);
            $updatedSample[$index[1]]['imagePath'] = $value;
        }

        $this->updateTaxon($sampleId, $updatedSample);
        $this->insertTaxon($sampleId, $sampled);

        $this->updateContext($sampleId, $updatedContext);
        $this->insertContext($sampleId, $context);
        parent::redirect('registros/'.$registerId.'/amostra/'.$sampleId.'/editar');
    }

    public function insertSampleFromFile($registerId): void
    {
        $sampleModel = new Sample();
        $country = new Country();
        $state = new State();
        $city = new City();

        try {
            $reader = new Spreadsheet($_FILES['file']['type']);
        } catch (\Exception $e) {
            $this->formSampleAutomatic('Tipo de arquivo não é suportado');
        }
        $spreadsheet = $reader->load($_FILES['file']["tmp_name"]);
        $metadata = $spreadsheet->getSheet(0)->toArray();

        $samples = array();
        $labels = array_shift($metadata);
        foreach ($metadata as $row => $values) {
            $colectedAt = explode(' ', $values[2]);
            $date = explode('/', $colectedAt[0]);
            $values[2] = $date[2].'-'.$date[1].'-'.$date[0].' '.$colectedAt[1];

            $sample = [
                'registerId' => $registerId,
                'editedAt' => date("Y-m-d H:i:s", time()+(int)date('T'))
            ];
            $values[8] = $country->create($values[8]);
            $values[7] = $state->create($values[7], $values[8]);
            $values[6] = $city->create($values[6], $values[7]);

            foreach ($values as $key => $value) {
                $label = $labels[$key];
                $sample[$label] = $value;
            }

            $sampleId =  $sampleModel->createFromFile(array_values($sample));
            $name = array_values($sample)[2];
            $samples[$name] =$sampleId;
        }


        $sampled = $spreadsheet->getSheet(1)->toArray();
        $labels = array_shift($sampled);
        $fitoplancton = new fitoplancton();
        $taxon = new Taxon();
        foreach ($sampled as $key => $value) {
            $values = ['mean'=> $value[2], 'max'=>$value[3]];
            if ($value[1] != '') {
                $taxonId = $taxon->create($value[1]);
                $fitoplancton->create($values, $samples[$value[0]], $taxonId);
            }
        }
        $context = $spreadsheet->getSheet(2)->toArray();
        $labels = array_shift($context);
        $var = new Info();
        $Context = new Context();
        foreach ($context as $key => $value) {
            $varId = $var->create($value[1], $value[3]);
            $Context->create($value[2], $samples[$value[0]], $varId);
        }
        parent::redirect('registros/'.$registerId.'/amostras');
    }
}
