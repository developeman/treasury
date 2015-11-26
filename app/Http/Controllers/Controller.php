<?php namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesCommands;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Auth;
use Request;
use BrowserDetect;
abstract class Controller extends BaseController {

	use DispatchesCommands, ValidatesRequests;

	public function __construct()
	{
		$active = true;
		if($active == false && Auth::admin()->check() == false && !Request::is('admin/*'))
		{
			abort('503');
		}

	}

	

}
