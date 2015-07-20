<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class GoogleMapsController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	/*NO S'UTILITZA!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	*(obsoleta)
	* Defineix el codi html per a dibuixar un poligon
	* revisar http://stackoverflow.com/questions/15208965/google-map-add-click-listener-to-each-polygon !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	*/
	/*
	static public function dibuixarCamp($dades, $color = '#FF0000'){
		$coordenades = "
		<script>
		function dibuixa() {";

		for ($j=0; $j< count($dades); $j++){
			$coordenades = $coordenades . "var camp" . $j . "coords = [";
			//$temporal = explode(",", $dades[$j]);
			foreach ($dades[$j] as $punt) {
				$coordenades = $coordenades . 'new google.maps.LatLng('. $punt['y'] . ',' . $punt['x'] . '),';
			}
			$coordenades = $coordenades . "];

					camp" . $j . " = new google.maps.Polygon({
						paths: camp" . $j . "coords,
						strokeColor: '".$color."',
						strokeOpacity: 0.8,
						strokeWeight: 3,
						fillColor: '".$color."',
						fillOpacity: 0.35
					});

					camp" . $j . ".setMap(map);";
		}

		$coordenades = $coordenades . "}
		google.maps.event.addDomListener(window, 'load', dibuixa);
		</script>	";
		//dd($coordenades);
		return $coordenades;
	}
	*/

	/*
	*
	* Retorna array per a dibuixar poligon directament en la view
	* (funció anterior obsoleta)
	*/
	static public function formarPoligon($dades){
		$coordenades = "";
		foreach ($dades as $punt) {
			$coordenades = $coordenades.'new google.maps.LatLng('. $punt['y'] . ',' . $punt['x'] . '),';
		}
		return $coordenades;
	}

	static public function eventOnClick($url, $idPoligon){
		$string = "<script>function eventOnClick".$idPoligon."(){
							google.maps.event.addListener(" . $idPoligon . ", 'click', function (event) {
							window.location.href = 'http://pfg.org/home/camp/17';
							});
							}
							google.maps.event.addDomListener(window, 'load', eventOnClick".$idPoligon.");
							</script>	";
		return $string;
	}

	/*
	*
	* Calcula el centre del poligon
	*
	*/
	static public function calcularCentrePoligon($dades){
		$valor = GoogleMapsController::stringToArray($dades);
		for($i = 0; $i < count($valor); $i++){
			switch ($i) {
				case '0':
					$miny = $valor[$i];
					$maxy = $valor[$i];
					break;
				case '1':
					$minx = $valor[$i];
					$maxx = $valor[$i];
					break;
				default:
					if ($i%2==0){
						if($valor[$i] > $maxy) $maxy = $valor[$i];
						if($valor[$i] < $miny) $miny = $valor[$i];
					}
					else{
						if($valor[$i] > $maxx) $maxx = $valor[$i];
						if($valor[$i] < $minx) $minx = $valor[$i];
					}
					break;
			}

		}
		$centre[] = $minx + (($maxx - $minx) / 2);
		$centre[] = $miny + (($maxy - $miny) / 2);
		return $centre;
	}

	/*
	*
	* Torna un 'quadre' on buscar els camps veins
	*
	*/
	static function getBoundaries($lat, $lng, $distance = 1, $earthRadius = 6371)
	{
		$return = array();
		// Los angulos para cada dirección
		$cardinalCoords = array('north' => '0',
		'south' => '180',
		'east' => '90',
		'west' => '270');
		$rLat = deg2rad($lat);
		$rLng = deg2rad($lng);
		$rAngDist = $distance/$earthRadius;
		foreach ($cardinalCoords as $name => $angle)
		{
			$rAngle = deg2rad($angle);
			$rLatB = asin(sin($rLat) * cos($rAngDist) + cos($rLat) * sin($rAngDist) * cos($rAngle));
			$rLonB = $rLng + atan2(sin($rAngle) * sin($rAngDist) * cos($rLat), cos($rAngDist) - sin($rLat) * sin($rLatB));
			$return[$name] = array('lat' => (float) rad2deg($rLatB),
			'lng' => (float) rad2deg($rLonB));
		}
		return array('min_lat' => $return['south']['lat'],
		'max_lat' => $return['north']['lat'],
		'min_lng' => $return['west']['lng'],
		'max_lng' => $return['east']['lng']);
	}




	/** FUNCIO QUE NO UTILITZE
	 *http://stackoverflow.com/questions/14750275/haversine-formula-with-php
	 * Calculates the great-circle distance between two points, with
	 * the Haversine formula.
	 * @param float $latitudeFrom Latitude of start point in [deg decimal]
	 * @param float $longitudeFrom Longitude of start point in [deg decimal]
	 * @param float $latitudeTo Latitude of target point in [deg decimal]
	 * @param float $longitudeTo Longitude of target point in [deg decimal]
	 * @param float $earthRadius Mean earth radius in [m]
	 * @return float Distance between points in [m] (same as earthRadius)
	 */

	function haversineGreatCircleDistance(
	  $latitudeFrom, $longitudeFrom, $latitudeTo, $longitudeTo, $earthRadius = 6371000)
	{
	  // convert from degrees to radians
	  $latFrom = deg2rad($latitudeFrom);
	  $lonFrom = deg2rad($longitudeFrom);
	  $latTo = deg2rad($latitudeTo);
	  $lonTo = deg2rad($longitudeTo);

	  $latDelta = $latTo - $latFrom;
	  $lonDelta = $lonTo - $lonFrom;

	  $angle = 2 * asin(sqrt(pow(sin($latDelta / 2), 2) +
	    cos($latFrom) * cos($latTo) * pow(sin($lonDelta / 2), 2)));
	  return $angle * $earthRadius;
	}

	/*
	*
	* li passes un string amb les coordenades (x, y), (x, y),.... y retorna un
	*array amb els valors separats (x nums pars i y nums impars)
	*/
	static function stringToArray($dades){
		if(!is_null($dades)){
			$temporal = explode(",", $dades);
			for($i = 0; $i < count($temporal); $i++){
				$valor[] = floatval(preg_replace('/[^\d-\.]+/','',$temporal[$i]));
			}
			//dd($valor);
			return $valor;
		}

	}

	/*
	*
	* Reb un linestring i retorna array amb tots els punts
	*
	*/
	static function linestringToArray($str){
		$str = substr( $str, 11, (strlen( $str) - 1) - 11);
		$objective = array();
		foreach( str_getcsv( $str) as $k => $v) {
		    list( $y, $x) = explode( ' ', $v);
		    $objective[$k]['y'] = $y;
		    $objective[$k]['x'] = $x;
		}
		return $objective;
	}
}
