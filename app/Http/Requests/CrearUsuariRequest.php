<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class CrearUsuariRequest extends Request {

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
			'nick' => 'required|unique:users,nick|max:255',
			'email' => 'required|email|unique:users,email|max:255',
			'password' => 'required|max:255',
			'password2' => 'same:password|required|max:255',
			'naiximent' => 'date',
			'nom' => 'string|max:255',
			'cognoms' => 'string|max:255',
			'poblacio' => 'string|max:255',
			'provincia' => 'string|max:255',
			'pais' => 'string|max:255',
			'cp' => 'integer|max:10',
			'acces' => 'integer|max:10',
			'visibilitat_id' => 'integer|max:10',
			'genere' => 'boolean',
		];
	}

}
