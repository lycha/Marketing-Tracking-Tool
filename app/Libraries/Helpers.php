<?php namespace App\Libraries;

use DB;
class Helpers {

	public static function getLCs()
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

}
