<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Shortlink;

class ShortlinkController extends Controller {

	public function index(Request $request) {
		return response()->json(Shortlink::all());
	}

	public function show(Shortlink $shortlink, Request $request) {
		return response()->json($shortlink);
	}

	public function store(Request $request) {
		$dictionary = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';

		$short = '';
		for ($i = 0; $i < 10; $i++) {
			$rand = rand(0, strlen($dictionary));
			$short .= $dictionary[$rand];
		}

		$shortlink = Shortlink::create([
			'short' => $short,
			'url' => $request->input('url')
		]);

		return response()->json($shortlink);
	}
}