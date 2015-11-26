<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Securities;
use Redirect;
use Auth;


class FrontSecuritiesCtrl extends Controller {

	public function index()
	{
		$securities=Securities::paginate(10);
		return View('front.Securities.index',compact('securities'));
	}

	
	public function show($id)
	{
		$securities=Securities::findorfail($id);
		return View('front.Securities.show',compact('securities'));	
	}
	
}
