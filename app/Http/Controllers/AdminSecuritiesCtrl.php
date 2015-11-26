<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests\SecuritiesRequest;
use App\Securities;
use Redirect;

class AdminSecuritiesCtrl extends Controller {

	public function index()
	{
		$securities=Securities::paginate(5);
		return View('admin.securities.index',compact('securities'));
	}

	public function create()
	{
		return View('admin.securities.create');
	}

	public function store(SecuritiesRequest $request)
	{
		Securities::create($request->all());
		return redirect()->to(Url('/').'/admin/securities/');;
	}

	public function show($id)
	{
		$securities = Securities::findorfail($id);
		return View('admin.securities.show',compact('securities'));		
	}

	public function edit($id)
	{
		$securities = Securities::findorfail($id);
		return View('admin.securities.edit',compact('securities'));
	}

	public function update($id,SecuritiesRequest $request)
	{
		$securities = Securities::findorfail($id);
		$securities->update($request->all());
		return redirect()->to(Url('/').'/admin/securities/');;
	}
	public function delete($id)
	{
		$securities = Securities::findorfail($id);
		$securities->delete();
		return Redirect::back();
	}
}