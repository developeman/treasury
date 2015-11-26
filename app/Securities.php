<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Securities extends Model {

	protected $table = 'securities';
	protected $fillable = ['name', 'price', 'disc'];
		

}
