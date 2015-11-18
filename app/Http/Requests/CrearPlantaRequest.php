<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class CrearPlantaRequest extends Request {

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
			'descripcio' => 'required|max:255',
			'fruta_inici' => 'required|date_format:d/m',
			'fruta_fi' => 'required|date_format:d/m',
			'nom_del_cultiu' => 'string|max:255',
		];
	}

}
