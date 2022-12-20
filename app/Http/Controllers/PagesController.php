<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class PagesController extends Controller
{
    public function home(): void
    {
        $responseContent = parent::load('pages/home/index');
        $responseContent->sendResponse();
    }

    public function about(): void
    {
        // die('teste');
        $responseContent = parent::load('pages/home/about');
        $responseContent->sendResponse();
    }

    public function sessionNotFound(): void
    {
        $responseContent = parent::load('pages/home/sessionNotFound');
        $responseContent->sendResponse();
    }
    public function showPrivacyPolicy(): void
    {
        $responseContent = parent::load('pages/terms/privacy-policy-2022', array(
            'fullPage' => True
        ));
        $responseContent->sendResponse();
    }
    
    public function showStatementOfResponsibility(): void
    {
        $responseContent = parent::load('pages/terms/UserResponsibility-2022', array(
            'fullPage' => True
        ));
        $responseContent->sendResponse();
    }
}