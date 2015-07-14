<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class CrearEventRequest extends Request {

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
			'headline' => 'required|max:255',
			'text' => 'required|max:255',
			'startDate' => 'required|date',
			'endDate' => 'required|date',
			'assetmedia' => 'string|max:255',
			'assetcredit' => 'string|max:255',
			'assetcaption' => 'string|max:255',
			'cultiu_id' => 'integer|max:255',
			'accio_id' => 'integer|max:255',
			'tevent_id' => 'integer|max:255',
		];
	}

}
