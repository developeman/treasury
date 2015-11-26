<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class OpenAccount extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
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
			'email_conf',
			'password',
			'password_confirmation',
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
	}

}
