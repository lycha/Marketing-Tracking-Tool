<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use DB;
use Input;
use Illuminate\Http\Request;

class ManageExpaLeadsController extends Controller {


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
		$leads = $this->getLeads();
		$lcs = $this->getLCs();
		// /var_dump($lcs);
		$response = compact('leads', 'lcs');

		//var_dump($leads);
		return view('manageleads', $response);
	}	

	public function getLeads()
	{
		$dataArray = array();
		$resArray = DB::select("
			SELECT expa_leads.id, expa_leads.keywords, lcs.name AS lc 
			FROM expa_leads INNER JOIN lcs ON lcs.expa_id = expa_leads.lc_id ORDER BY expa_leads.keywords");

		foreach ($resArray as $res) {
			
            array_push($dataArray, array(
            	'id'=>$res->id, 
                'keywords'=>$res->keywords,
                'lc'=>$res->lc
                ));
        }
		return $dataArray;
	}

	public function getLCs()
	{
		$dataArray = array();
		$resArray = DB::select("
			SELECT expa_id, name FROM lcs ORDER BY name");
		//var_dump($resArray);
		foreach ($resArray as $res) {
			//foreach ($res as $key => $value) {
			  $dataArray[$res->expa_id] = $res->name;
			//}
		}
		//var_dump($dataArray);
		return $dataArray;
	}

	public function updateLead()
	{
		$name = Input::get('name');
		$id = Input::get('id');
		$lc_id = Input::get('lc');

		//var_dump($lc_id);
		DB::table('expa_leads')
                ->where('id', $id)
                ->update(
                    array('keywords' => $name, 
                          'lc_id' => $lc_id
                    )
            );
	}

	public function addLead()
	{
		$name = Input::get('name');
		$lc_id = Input::get('lc');

		$id = DB::table('expa_leads')->insertGetId(
                    array('keywords' => $name, 
                          'lc_id' => $lc_id
                    )
            );
	}

	public function deleteLead()
	{
		$id = Input::get('id');
		if ($id!="") {
			DB::delete('delete from expa_leads where id='.$id);
		}
	}

}
