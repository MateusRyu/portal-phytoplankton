<?php

namespace App\Http\Controllers;

use App\Http\Response;
use App\Http\View;

class Controller
{
	protected function normalizeInputs(array $inputs): array
	{
		$callback = function($input){
			if (isset($input)){
				$input = htmlentities($input);
				return (isset($input))?trim($input):null;
			}
			return null;
		};
		return array_map($callback, $inputs);
	}

	protected function strStartWith($subject, $string): bool
	{
		return substr($subject, 0, strlen($string)) === $string;
	}

	protected function load(string $view, array $context=[], int $code=200): Response
	{
		$render =  new View($view, $context);
		return(new Response($render, $code));
	}

	protected function redirect(string $path, $debug=''): void
	{
		if (DEBUG) {
			$timer = 0;
		}
		$redirectResponse =  $this->load('templates/redirect', [
            'timer' => $timer??0,
            'url' => $path,
			'body' => $debug
        ], 303);
		$redirectResponse->sendResponse();
	}
}
