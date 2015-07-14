<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model {

	//
		protected $table = 'user_profiles';

		protected $fillable = ['headline', 'text', 'startDate', 'visibilitat_id', 'camp_id'];

		public function user()
		{
				return $this->belongsTo('App\User', 'user_id', 'id');
		}
		public function visibilitats()
		{
				return $this->belongsTo('App\Visibilitat', 'visibilitat_id', 'id');
		}
		static public function poblacio($id){
			$result = UserProfile::select('poblacio')->where('id', '=', $id)->get();
			return $result->toArray()[0]['poblacio'];

		}
		static public function perfilId($id){
			$result = UserProfile::select('id')->where('user_id', '=', $id)->get();
			return $result->toArray()[0]['id'];

		}

}
