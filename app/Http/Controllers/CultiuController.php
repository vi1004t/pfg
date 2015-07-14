<?php namespace App\Http\Controllers;
use App\Http\Requests;
use App\Http\Requests\CrearCultiuRequest;
use App\Http\Controllers\Controller;
use App\Cultiu;
use App\Event;
use Illuminate\Http\Request;

class CultiuController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create($user, $camp)
	{
		$array = ['user' => $user, 'camp' => $camp ];
		return view('crear.cultiu')->with('array', $array);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(CrearCultiuRequest $request)
	{
	//	dd($request->all());
/*		if(strlen($request->headline)){
			if(strlen($request->text)){
				if(strlen($request->startDate)){*/
					$cultiu = new Cultiu($request->all());
					//$cultiu->planta_id = 1;
					$cultiu->save();
					$event = new Event();
					$event->headline = "Inici";
					$event->text = "Benvingut";
					$event->startDate = $cultiu->startDate;
					$event->tevent_id = 1;
					$cultiu->save();
					$event->cultiu_id = $cultiu->id;
					$event->save();
					return redirect('perfil/'.$request->user_id.'/camp/'.$cultiu->camp_id.'/cultiu/'.$cultiu->id);
/*					}
				else{
					dd("LA data d'inici no pot estar buit");
				}
			}
			else{
				dd("La descripcio no pot estar buit");
			}
		}
		else{
			dd("El nom no pot estar buit");
		}
*/
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($user, $camp, $cultiu)
	{
		$dades = ['json' => $cultiu.'/timeline', 'cultiu' => $cultiu, 'user' => $user, 'camp' => $camp];
		return view('privat.cultiu')->with('array', $dades);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

	public function timeline($user, $camp, $cultiu)
	{
		//dd($id);
		$result = Cultiu::find($cultiu)->With('events')->get();
		$dades = $result->toArray();
		//dd($dades[0]['headline']);
		$c['timeline']['headline']= $dades[0]['headline'];
		$c['timeline']['type'] = $dades[0]['type'];
		$c['timeline']['text'] = $dades[0]['text'];
		$c['timeline']['startDate'] = strtr($dades[0]['startDate'], array ('-' => ','));
		//definir el background del timeline
		//$c['timeline']['date'][] = array(
		//		"startDate"=>strtr($dades[0]['erastartDate'], array ('-' => ',')),
		//		"endDate"=>strtr($dades[0]['eraendDate'], array ('-' => ',')),
		//		"headline"=>$dades[0]['eraheadline'],
		//		"text"=> $dades[0]['eratext']
		//);
		//for per a cridar a tots els events relacionats en el cultiu
		for($i=0;$i<count($dades[0]['events']);$i++){
					$c['timeline']['date'][] = array(
					"startDate"=>strtr($dades[0]['events'][$i]['startDate'], array ('-' => ',')),
					"endDate"=>strtr($dades[0]['events'][$i]['endDate'], array ('-' => ',')),
			    "headline"=>$dades[0]['events'][$i]['headline'],
			    "text"=> $dades[0]['events'][$i]['text'],
			    "asset" => array(
			                "media"=> $dades[0]['events'][$i]['assetmedia'],
			                "credit"=> $dades[0]['events'][$i]['assetcredit'],
			                "caption"=> $dades[0]['events'][$i]['assetcaption']
			    				),
					//"era_nb"=> $dades[0]['events'][$i]['era_nb'], <- per a agarrar el format de la era X
					//més info en https://groups.google.com/forum/#!topic/verite-timeline/CXqMigfHxFM
					);
		}


echo json_encode($c);

//$json='{"timeline":{"headline":"Ara rtjhsrtysfky","type":"default","text":"People say stuff","startDate":"2012,1,26","endDate":"2012,3,12","date": [{"startDate":"2011,12,12","endDate":"2012,1,27","headline":"Vine","text":"<p>Vine Test</p>","asset":{"media":"","credit":"ddd","caption":""}},{"startDate":"2012,1,26","endDate":"2012,1,27","headline":"Sh*t Politicians Say","text":"<p>In true political fashion, his character rattles off common jargon heard from people running for office.</p>","asset":{"media":"http://youtu.be/u4XpeU9erbg","credit":"","caption":""}},{"startDate":"2012,1,10","headline":"Sh*t Nobody Says","text":"<p>Have you ever heard someone say “can I burn a copy of your Nickelback CD?” or “my Bazooka gum still has flavor!” Nobody says that.</p>","asset":{"media":"http://youtu.be/f-x8t0JOnVw","credit":"","caption":""}},{"startDate":"2012,1,26","headline":"Sh*t Chicagoans Say","text":"","asset":{"media":"http://youtu.be/Ofy5gNkKGOo","credit":"","caption":""}},{"startDate":"2011,12,12","headline":"Sh*t Girls Say","text":"","asset":{"media":"http://youtu.be/u-yLGIH7W9Y","credit":"","caption":"Writers & Creators: Kyle Humphrey & Graydon Sheppard"}},{"startDate":"2012,1,4","headline":"Sh*t Broke People Say","text":"","asset":{"media":"http://youtu.be/zyyalkHjSjo","credit":"","caption":""}},{"startDate":"2012,1,4","headline":"Sh*t Silicon Valley Says","text":"","asset":{"media":"http://youtu.be/BR8zFANeBGQ","credit":"","caption":"written, filmed, and edited by Kate Imbach & Tom Conrad"}},{"startDate":"2011,12,25","headline":"Sh*t Vegans Say","text":"","asset":{"media":"http://youtu.be/OmWFnd-p0Lw","credit":"","caption":""}},{"startDate":"2012,1,23","headline":"Sh*t Graphic Designers Say","text":"","asset":{"media":"http://youtu.be/KsT3QTmsN5Q","credit":"","caption":""}},{"startDate":"2011,12,30","headline":"Sh*t Wookiees Say","text":"","asset":{"media":"http://youtu.be/vJpBCzzcSgA","credit":"","caption":""}},{"startDate":"2012,1,17","headline":"Sh*t People Say About Sh*t People Say Videos","text":"","asset":{"media":"http://youtu.be/c9ehQ7vO7c0","credit":"","caption":""}},{"startDate":"2012,1,20","headline":"Sh*t Social Media Pros Say","text":"","asset":{"media":"http://youtu.be/eRQe-BT9g_U","credit":"","caption":""}},{"startDate":"2012,1,11","headline":"Sh*t Old People Say About Computers","text":"","asset":{"media":"http://youtu.be/HRmc5uuoUzA","credit":"","caption":""}},{"startDate":"2012,1,11","headline":"Sh*t College Freshmen Say","text":"","asset":{"media":"http://youtu.be/rwozXzo0MZk","credit":"","caption":""}},{"startDate":"2011,12,16","headline":"Sh*t Girls Say - Episode 2","text":"","asset":{"media":"http://youtu.be/kbovd-e-hRg","credit":"","caption":"Writers & Creators: Kyle Humphrey & Graydon Sheppard"}},{"startDate":"2011,12,24","headline":"Sh*t Girls Say - Episode 3 Featuring Juliette Lewis","text":"","asset":{"media":"http://youtu.be/bDHUhT71JN8","credit":"","caption":"Writers & Creators: Kyle Humphrey & Graydon Sheppard"}},{"startDate":"2012,1,27","headline":"Sh*t Web Designers Say","text":"","asset":{"media":"http://youtu.be/MEOb_meSHhQ","credit":"","caption":""}},{"startDate":"2012,1,12","headline":"Sh*t Hipsters Say","text":"No meme is complete without a bit of hipster-bashing.","asset":{"media":"http://youtu.be/FUhrSVyu0Kw","credit":"","caption":"Written, Directed, Conceptualized and Performed by Carrie Valentine and Jessica Katz"}},{"startDate":"2012,1,6","headline":"Sh*t Cats Say","text":"No meme is complete without cats. This had to happen, obviously.","asset":{"media":"http://youtu.be/MUX58Vi-YLg","credit":"","caption":""}},{"startDate":"2012,1,21","headline":"Sh*t Cyclists Say","text":"","asset":{"media":"http://youtu.be/GMCkuqL9IcM","credit":"","caption":"Video script, production, and editing by Allen Krughoff of Hardcastle Photography"}},{"startDate":"2011,12,30","headline":"Sh*t Yogis Say","text":"","asset":{"media":"http://youtu.be/IMC1_RH_b3k","credit":"","caption":""}},{"startDate":"2012,1,18","headline":"Sh*t New Yorkers Say","text":"","asset":{"media":"http://youtu.be/yRvJylbSg7o","credit":"","caption":"Directed and Edited by Matt Mayer, Produced by Seth Keim, Written by Eliot Glazer. Featuring Eliot and Ilana Glazer, who are siblings, not married."}}]}}';
//echo $json;

	}

}
