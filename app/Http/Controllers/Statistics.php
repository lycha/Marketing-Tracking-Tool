<?php namespace App\Http\Controllers;

use DB;

class Statistics {

	private $lc;
	private $campaign;
	private $program;
	private $date_from;
	private $date_to;

	public function __construct($lc, $campaign='', $program, $date_from='', $date_to='')
	{
		$this->lc = $lc;
		$this->campaign = $campaign;
		$this->program = $program;
		$this->date_from = $date_from;
		$this->date_to = $date_to;
	}

	public function getNumberOfLeads(){
		$result = '';
		$where = "timestamp >= '".$this->date_from."' and timestamp <= '".$this->date_to."' and program = '".$this->program."'";
		if ($this->lc != 'total') {
			$where = $where." and lc = '".$this->lc."'";
		}
		if ($this->campaign != 'all') {
			$where = $where." and utm_campaign = '".$this->campaign."'";
		}
		$result = DB::select('select count(id) AS res from marketing_leads where '.$where);
		$result = $result[0]->res;	

		//$this->numberOfLeads = $result;
		return $result;
	}

	public function getNumberOfOpen(){
		$result = '';
		$where = "timestamp >= '".$this->date_from."' and timestamp <= '".$this->date_to."' and program = '".$this->program."'";
		if ($this->lc != 'total') {
			$where = $where." and lc = '".$this->lc."'";
		}
		if ($this->campaign != 'all') {
			$where = $where." and utm_campaign = '".$this->campaign."'";
		}
		$result = DB::select('select count(id) AS res from marketing_leads where registered = 1 and '.$where);
		$result = $result[0]->res;	

		//$this->numberOfOpen = $result;
		return $result;
	}

	public function getConversionLeadToOpen($noLead, $noOpen){
		$result = 0;

		if($noOpen!=0){
		    $result = round((float)$noOpen/$noLead*100);
		}else{
		    $result = 0;
		}
		//$result = round((float)$this->getNumberOfOpen()/$this->getNumberOfLeads();
		return $result;
	}

	public function getCampaigns()
	{
		$currentCampaigns = array('all' => '-- All --' );
		if ($this->lc == 'total') {
			$currentCampaign = DB::select("select distinct utm_campaign FROM marketing_leads where program='".$this->program."'order by utm_campaign");	
		} else {
			$currentCampaign = DB::select("select distinct utm_campaign FROM marketing_leads where lc='".$this->lc."' and program='".$this->program."' order by utm_campaign");
		}
		foreach ($currentCampaign as $key => $value) {
		  $currentCampaigns[$value->utm_campaign] = $value->utm_campaign;
		}

		return $currentCampaigns;
	}

	public function getChartLeads(){
		$dataArray = array();

		$whereClause = " WHERE timestamp BETWEEN '".$this->date_from."'::timestamp AND '".$this->date_to."'::timestamp 
				AND program = '".$this->program."'";

		if ($this->lc != 'total') {
			$whereClause = $whereClause." and lc = '".$this->lc."' ";
		}
		if ($this->campaign != 'all') {
			$whereClause = $whereClause." and utm_campaign = '".$this->campaign."'";
		}

		$resArray = DB::select("
			SELECT
			  date::date,
			  coalesce(generic,0) AS generic,
			  coalesce(facebook,0) AS facebook,
			  coalesce(offline,0) AS offline,
			  coalesce(press,0) AS press,
			  coalesce(twitter,0) AS twitter,
			  coalesce(website,0) AS website
			FROM
			 generate_series(
			   '".$this->date_from."'::timestamp,
			   '".$this->date_to."'::timestamp,
			   '1 day') AS date
			LEFT OUTER JOIN
			  (SELECT
			     date_trunc('day', timestamp) as day,
			     sum(case when utm_source  = 'generic' then 1 else 0 end) as generic,
			     sum(case when utm_source  = 'facebook' then 1 else 0 end) as facebook,
			     sum(case when utm_source  = 'offline' then 1 else 0 end) as offline,
			     sum(case when utm_source  = 'press' then 1 else 0 end) as press,
			     sum(case when utm_source  = 'twitter' then 1 else 0 end) as twitter,
			     sum(case when utm_source  = 'website' then 1 else 0 end) as website
			   FROM marketing_leads".$whereClause."
			
			     GROUP BY day) results
			ON (date = results.day)
			");

		foreach ($resArray as $res) {
			
            array_push($dataArray, array(
            	'y'=>$res->date, 
                'generic'=>(int)$res->generic,
                'facebook'=>(int)$res->facebook,
                'offline'=>(int)$res->offline,
                'press'=>(int)$res->press,
                'twitter'=>(int)$res->twitter,
                'website'=>(int)$res->website
                ));
        }
        $dataArray = str_replace("NULL", "0", $dataArray);
		
		return json_encode($dataArray);
	}

	public function getChartOpen(){
		$dataArray = array();

		$whereClause = " WHERE registered = 1 AND timestamp BETWEEN '".$this->date_from."'::timestamp AND '".$this->date_to."'::timestamp 
				AND program = '".$this->program."'";

		if ($this->lc != 'total') {
			$whereClause = $whereClause." and lc = '".$this->lc."' ";
		}
		if ($this->campaign != 'all') {
			$whereClause = $whereClause." and utm_campaign = '".$this->campaign."'";
		}

		$resArray = DB::select("
			SELECT
			  date::date,
			  coalesce(generic,0) AS generic,
			  coalesce(facebook,0) AS facebook,
			  coalesce(offline,0) AS offline,
			  coalesce(press,0) AS press,
			  coalesce(twitter,0) AS twitter,
			  coalesce(website,0) AS website
			FROM
			 generate_series(
			   '".$this->date_from."'::timestamp,
			   '".$this->date_to."'::timestamp,
			   '1 day') AS date
			LEFT OUTER JOIN
			  (SELECT
			     date_trunc('day', timestamp) as day,
			     sum(case when utm_source  = 'generic' then 1 else 0 end) as generic,
			     sum(case when utm_source  = 'facebook' then 1 else 0 end) as facebook,
			     sum(case when utm_source  = 'offline' then 1 else 0 end) as offline,
			     sum(case when utm_source  = 'press' then 1 else 0 end) as press,
			     sum(case when utm_source  = 'twitter' then 1 else 0 end) as twitter,
			     sum(case when utm_source  = 'website' then 1 else 0 end) as website
			   FROM marketing_leads".$whereClause."
			
			     GROUP BY day) results
			ON (date = results.day)
			");

		foreach ($resArray as $res) {
			
            array_push($dataArray, array(
            	'y'=>$res->date, 
                'generic'=>(int)$res->generic,
                'facebook'=>(int)$res->facebook,
                'offline'=>(int)$res->offline,
                'press'=>(int)$res->press,
                'twitter'=>(int)$res->twitter,
                'website'=>(int)$res->website
                ));
        }
        $dataArray = str_replace("NULL", "0", $dataArray);
		
		return json_encode($dataArray);
	}

	public function getChartConversion(){
		return $this->chartConversion;
	}

	public function getAllData()
	{
		$result = '';
		$where = "";

		$where = " WHERE 
			timestamp BETWEEN '".$this->date_from."'::timestamp AND '".$this->date_to."'::timestamp AND 
			 program = '".$this->program."'";

		if ($this->lc != 'total') {
			$where = $where." and lc = '".$this->lc."' ";
		}
		if ($this->campaign != 'all') {
			$where = $where." and utm_campaign = '".$this->campaign."'";
		}

		$result = DB::select('Select timestamp, 
			utm_source, 
			utm_medium, 
			utm_campaign, 
			program, 
			bucket, 
			lc, 
			lc_form, 
			name, 
			surname, 
			email, 
			phone_number, 
			registered from marketing_leads '.$where);

		//var_dump($where);
		
		$result = json_decode(json_encode((array) $result), true);
		//var_dump($result);
		return $result;
	}
}
