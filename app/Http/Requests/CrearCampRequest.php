<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class CrearCampRequest extends Request {

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
			'nom' => 'required|max:255',
			'descripcio' => 'required|max:255',
			'poble' => 'required|max:255',
		];
	}

}
