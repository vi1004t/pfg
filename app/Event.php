<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'events';

	protected $fillable = ['headline', 'text', 'startDate', 'endDate', 'cultiu_id', 'accio_id', 'tevent_id'];


	public function cultius()
  {
			return $this->belongsTo('App\Cultiu', 'cultiu_id', 'id');
  }

	static public function eventsCultiu($id)
	{
		//$llistat = null;
		$results = Event::select('id', 'headline', 'text', 'startDate')->where('cultiu_id', '=', $id)->orderBy('startDate', 'desc')->get();
		if(!is_null($results)){
			/*foreach ($results as $item) {
				$llistat[] = ['id' => $item->id,
											'nom' => $item->headline,
											'descripcio' => $item->text,
											'startDate' => $item->startDate,
										];
			}*/
			return $results;
		}
	}

	static public function cultiuEvent($id)
	{
		$llistat = null;
		$results = Event::select('id','cultiu_id')->where('id', '=', $id)->get();
		if(!is_null($results)){
			return $results->toArray()[0]['cultiu_id'];
		}
	}

	static public function eventsUsuari($cultius)
	{

		if(!is_null($cultius)){
			foreach ($cultius as $cultiu){
				if(!is_null($cultiu)){
					$results = Event::select('id', 'headline', 'text', 'startDate','cultiu_id')->where(
						function ($query) use ($cultiu)
							{
								foreach ($cultiu as $key=>$value)
								{
									if(!is_null($value)){
										//you can use orWhere the first time, dosn't need to be ->where
										$query->orWhere('cultiu_id',$value);
									}
								}
							}
					)->orderBy('startDate', 'desc')->get()->toArray();
					foreach ($results as $passa){
						$dades[] = $passa;
						}
					}
				}
			}
			dd($cultius);
			if(!is_null($dades)){
				return $dades;
		}


	}

}
