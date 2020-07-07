<?php

namespace App\Http\Controllers;

use App\Shortlink;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RedirectionController extends Controller {

	public function redirect($short, Request $request) {
		$shortlink = Shortlink::where('short', $short)->first();
		$url = $shortlink->url;

		if (strpos($url, 'http') === false) {
			$url = 'http://' . $url;
		}

		$redirection = redirect()->away($url);
		$redirection->setStatusCode(Response::HTTP_FOUND);

		return $redirection;
	}

}