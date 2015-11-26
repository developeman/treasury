<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Clients;
use Redirect;
use Auth;
use App\orders;



class DashboardCtrl extends Controller {

	public function index()
	{
		return View('front.dashboard.index');
	}
	
	public function my_securities()
	{
		$securities = orders::MySecurities()->paginate(5);
		return View('front.dashboard.securities',compact('securities'));
	}

	
}
