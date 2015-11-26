<?php namespace App;
use Auth;

use Illuminate\Database\Eloquent\Model;

class orders extends Model {

	protected $table = 'orders';
	protected $fillable = ['type', 'product_id', 'client_id'];
	
	public function  scopeMySecurities($query)
	{
		$query->where('type',0)->where('client_id',Auth::client()->get()->id);
	}

}