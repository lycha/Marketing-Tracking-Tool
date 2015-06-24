<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use DB;
use Input;
use Illuminate\Http\Request;

class ManageLCsController extends Controller {


	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//$leads = $this->getLeads();
		$lcs = $this->getLCs();
		// /var_dump($lcs);
		$response = compact('lcs');

		//var_dump($leads);
		return view('managelcs', $response);
	}	

	public function getLCs()
	{
		$dataArray = array();
		$resArray = DB::select("
			SELECT id, expa_id, expa_name, url_name, full_name FROM lcs ORDER BY expa_name");
		//var_dump($resArray);
		foreach ($resArray as $res) {
			array_push($dataArray, array(
            	'id'=>$res->id, 
                'expa_id'=>$res->expa_id,
                'expa_name'=>$res->expa_name,
                'url_name'=>$res->url_name,
                'full_name'=>$res->full_name
                ));
		}
		//var_dump($dataArray);
		return $dataArray;
	}

	public function updateLc()
	{
		$id = Input::get('id');
		$expa_id = Input::get('expa-id');
		$expa_name = Input::get('expa-name');
		$url_name = Input::get('url-name');
		$full_name = Input::get('full-name');
		

		//var_dump($lc_id);
		DB::table('lcs')
                ->where('id', $id)
                ->update(
                    array('expa_id' => $expa_id, 
                          'expa_name' => $expa_name,
                          'url_name' => $url_name,
                          'full_name' => $full_name
                    )
            );
	}

	public function addLc()
	{
		$expa_id = Input::get('expa-id');
		$expa_name = Input::get('expa-name');
		$url_name = Input::get('url-name');
		$full_name = Input::get('full-name');

		$id = DB::table('lcs')->insertGetId(
                    array('expa_id' => $expa_id, 
                          'expa_name' => $expa_name,
                          'url_name' => $url_name,
                          'full_name' => $full_name
                    )
            );
	}

	public function deleteLc()
	{
		$id = Input::get('id');
		if ($id!="") {
			DB::delete('delete from lcs where id='.$id);
		}
	}

}
