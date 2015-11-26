<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class Clients extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'clients';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
				'account_type',
				'firstname',
				'midname',
				'lastname',
				'suffix',
				'account_name',
				'taxpayer_num',
				'date_of_birth',
				'driver_license',
				'issuing_state',
				'expiration_date',
				'email',
				'password',
				'address1',
				'address2',
				'address3',
				'state',
				'zipcode',
				'phone',
				'bank_name',
				'routing_number',
				'account_number',
				'name_on_account',
				'bank_account_type',
		 	];
	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];

	

}
