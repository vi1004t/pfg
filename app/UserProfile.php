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
			if(!is_null($result)){
				return $result->toArray()[0]['poblacio'];
			}
		}
		static public function perfilId($id){
			$result = UserProfile::select('id')->where('user_id', '=', $id)->first();
			if(!is_null($result)){
				return $result->id;
			}
		}

		static public function userId($id){
			$result = UserProfile::select('user_id')->where('id', '=', $id)->get();
			if(!is_null($result)){
				return $result->toArray()[0]['user_id'];
			}
		}

		static public function informacioPersonal($id){
			$result = UserProfile::select('nom', 'cognoms', 'naiximent', 'poblacio')->where('user_id', '=', $id)->first();
			$nick = User::nickUser($id);

			if(!is_null($result)){
				$info = ['nom' => $result->nom,
									'cognoms' => $result->cognoms,
									'naiximent' => $result->naiximent,
									'poblacio' => $result->poblacio,
									'nick' => $nick
									];
				return $info;
			}
		}

}
