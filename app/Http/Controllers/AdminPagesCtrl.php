<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests\PagesRequest;
use App\Pages;
use Redirect;

class AdminPagesCtrl extends Controller {

	public function index()
	{
		$securities=Pages::where('ct_id',0)->orderby('sort')->paginate(5);
		return View('admin.pages.index',compact('securities'));
	}

	public function create()
	{
		$pages = Pages::where('ct_id',0)->lists('name','id');
		return View('admin.pages.create',compact('pages'));
	}

	public function store(PagesRequest $request)
	{
		Pages::create($request->add());
		return redirect()->to(Url('/').'/admin/pages/');;
	}

	public function show($id)
	{
		$securities = Pages::findorfail($id);
		$sub = Pages::where('ct_id',$id)->orderby('sort')->paginate(5);
		return View('admin.pages.show',compact('securities','sub'));		
	}

	public function edit($id)
	{
		$pages = Pages::where('ct_id',0)->lists('name','id');
		$securities = Pages::findorfail($id);
		return View('admin.pages.edit',compact('securities','pages'));
	}

	public function update($id,PagesRequest $request)
	{
		$securities = Pages::findorfail($id);
		$securities->update($request->add());
		return redirect()->to(Url('/').'/admin/pages/');;
	}

	public function sort() {
		unset($_POST['_token']);
		foreach ($_POST as $k => $v) {
			Pages::where('id', $k)
				->update(['sort' => $v]);
		}
		return Redirect::back();
	}
	public function delete($id)
	{
		$sub = Pages::where('ct_id',$id)->delete();
		$pages = Pages::find($id);
		$pages->delete();
		return Redirect::back();
	}

	public function frontpage($id)
	{
		$page = Pages::findorfail($id);
		return View('front.pages.index',compact('page'));
	}
	public function frontsubpage($id,$subid)
	{
		$page = Pages::findorfail($subid);
		return View('front.pages.index',compact('page'));
	}

}