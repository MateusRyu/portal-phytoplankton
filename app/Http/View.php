<?php
namespace App\Http;

use App\Http\Response;

class View
{
    private static $templates;
    private static $globalContext;
    private static $renderFileFormat;
    private $view;
    private $context;

    public function __construct($view, $context=[])
    {
        $this->view = $view . self::$renderFileFormat;
        $this->context = $context;
    }
    
	public function __toString()
    {
        self::$globalContext = self::$globalContext??[];
        $viewVariables = array_merge($this->context, self::$globalContext);
        $render = self::$templates->render($this->view, $viewVariables);
        $safeRender = $this->removeComments($render);
        $view = DEBUG?$safeRender:$this->minifyRender($safeRender);
        return $view;
    }

    public static function setup(): void
    {
        $config = require(APP_DIR.'/configurations/app.php');
        self::$renderFileFormat = $config['renderFileFormat'];
        $templateCacheConfiguration = DEBUG?[]:['cache' => $config['pathCache'].'template/'];
        $templateLoader = new \Twig\Loader\FilesystemLoader($config['pathTemplates']);
        self::$templates = new \Twig\Environment($templateLoader, $templateCacheConfiguration);
        self::$globalContext = require APP_DIR.'/configurations/viewGlobals.php';
    }

    private function minifyRender(string $render): string
    {
        $trimTags = ['head','meta','title','div','a','small', 
        'p','address','area','article','aside','audio','base', 
        'body','br','button','canvas','ul','ol','li','script'];

        $render = preg_replace('/[ ]{2,}/',' ', $render);
        $render = str_replace(PHP_EOL, '', $render);
        $explodedRender = explode('>', $render);
        $render = trim(array_shift($explodedRender));
        foreach ($explodedRender as $htmlText){
            $render .= '>'.trim($htmlText);
        }
        foreach ($trimTags as $tag) {
            $render = $this->trimHtmlTag($render, $tag);
        }
        return $render;
    }

    private function trimHtmlTag($render, $tag): string
    {
        $explodedRender = explode('<'.$tag, $render);
        $output = trim(array_shift($explodedRender));
        foreach ($explodedRender as $htmlText){
            $output .= '<'.$tag.rtrim($htmlText);
        }

        $explodedRender = explode('</'.$tag, $output);
        $output = trim(array_shift($explodedRender));
        foreach ($explodedRender as $htmlText){
            $output .= '</'.$tag.ltrim($htmlText);
        }
        return $output;
    }

    private function removeComments(string $view): string
    {
        $safeView ='';
        $explodedView = explode('<!--', $view);
        foreach ($explodedView as $htmlText){
            if (substr_count($htmlText, '-->')){
                $htmlTextExploded = explode('-->', $htmlText);
                $htmlText = $htmlTextExploded[1];
            }
            $safeView .=$htmlText;
        }
        return $safeView;
    }
}