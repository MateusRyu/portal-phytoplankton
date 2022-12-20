<?php

namespace App\Http\Controllers;

use App\Http\Response;
use App\Http\Controllers\Controller;
use App\Models\Amostra as Sample;
use App\Models\Contexto as Context;
use App\Models\Fitoplancton;

class ApiController extends Controller
{
    private function sendApiResponse($data): void
    {
		$response = new Response($data, 200, 'application/json');
        $response->sendResponse();
    } 

    public function map(): void
    {
        $config = require APP_DIR.'/configurations/app.php';
        $baseUrl = $config["url"];
        $sampleModel = new Sample();
        $fitoplanctonModel = new Fitoplancton();
        $contextModel = new Context();
        $samples = $sampleModel->getAllSafeData();
        $data = array();

        $markers = [
            'normal' => 'green',
            'atenção' => 'yellow',
            'alerta' => 'orange',
            'perigo' => 'red',
            'bloom' => 'blue',
        ];

        foreach ($samples as $sample) {
            $id = array_pop($sample);
            $measure = explode(',',$sample['measure']);
            if (empty($measure[1])){
                $measure[1] = '';
            } else {
                $measure[1] = trim($measure[1]);
            }
            $measure = empty($measure[1])?['name' => $measure[0]]:['name' => $measure[0], 'unit' => $measure[1]];
            $sample['city'] = $sample['city']??'Não identificado';
            $sample['state'] = $sample['state']??'Não identificado';
            $sample['country'] = $sample['country']??'Não identificado';
            $sample['cover'] = $sample['cover']?$baseUrl.$sample['cover']:false;
            $sample['iconFile'] = $baseUrl.'/data/icons/'.$markers[$sample['marker']].'.svg';
            $sample['measure'] = $measure;
            $sample['fitoplancton'] = $fitoplanctonModel->getFitoplanctonBySampleId($id);
            $sample['context'] = $contextModel->getDataBySampleId($id);

            $data[$id] = $sample;
        }
        $this->sendApiResponse($data);
    }

    public function sessionNotFound(): void
    {
        $responseContent = parent::load('pages/home/sessionNotFound');
        $responseContent->sendResponse();
    }
}
