<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class CrearCultiuRequest extends Request {

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
		if (Request::isMethod('post'))
		{
			return [
				'headline' => 'required|max:255',
				'text' => 'required|max:255',
				'startDate' => 'required|date',
			];
		}
		if (Request::isMethod('put'))
		{
			return [
				'headline' => 'required|max:255',
				'text' => 'required|max:255',
			];
		}
	}

}
