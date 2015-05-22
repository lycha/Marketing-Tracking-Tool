<?php namespace App\Http\Controllers;

use DB;
use Input;
use App\Http\Controllers\Statistics;

class DashboardController extends Controller {

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('guest');
	}

	public function updateAnalysis($lc, $program)
	{
		$campaign = Input::get('campaign');

		if (!$campaign) {
			$campaign = 'all';
		}
		if (Input::get('datepicker_from') != "") {
			$date_from = Input::get('datepicker_from');
		}else{
			$date_from = date('Y-m-d', strtotime("now -30 days") );
		}
		if (Input::get('datepicker_to') != "") {
			$date_to = Input::get('datepicker_to');
		}else{
			$date_to = date('Y-m-d');
		}

		$stats = new Statistics($lc, $campaign, $program, $date_from, $date_to);
		
        $lcName = '';
        $programName = '';
		$numberOfLeads = $stats->getNumberOfLeads();
		$numberOfOpen = $stats->getNumberOfOpen();
		$conversionLeadToOpen = $stats->getConversionLeadToOpen($numberOfLeads, $numberOfOpen);
		$chartDataLead = $stats->getChartLeads();
		//echo $chartDataLead;
		$chartDataOpen = $stats->getChartOpen();
	
		$currentCampaigns = $stats->getCampaigns();
		
		$response = compact('lcName', 
						'numberOfLeads',
						'numberOfOpen', 
						'conversionLeadToOpen' ,
						'chartDataLead',
						'chartDataOpen',
						'currentCampaigns',
						'currentCampaign',
						'lc',
						'program'
						);

        return $response;
	}

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function index($lc='total', $program='gt')
	{
		//var_dump($lc);
		//var_dump($program);


		$response = $this->updateAnalysis($lc, $program);

		return view('dashboard', $response);
	}

}
