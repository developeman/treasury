<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class PagesRequest extends Request {

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
			//
		];
	}

	public function add()
	{
		
		if($this->pagetype == 0){
			$this->merge(['ct_id'=>0]);
		}else{
			$this->merge(['ct_id'=>$this->main]);
		}
		return $this->all();
       

	}

}
