<?php namespace App\Http\Controllers;

use DB;
use Input;
use App\Http\Controllers\Statistics;
use Excel;
use PHPExcel_CachedObjectStorageFactory;
use PHPExcel_Settings;
use App;

class DashboardController extends Controller {

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
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

	public function GenerateXls($lc, $program)
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
		//$stats = new Statistics($lc, 0, $program);
		$data = $stats->getAllData();

        /*print "<pre>";
        print_r($data);
        print "</pre>";*/
        $excel = App::make('excel');
        ini_set('memory_limit', '256M');
        $cacheMethod = PHPExcel_CachedObjectStorageFactory:: cache_to_phpTemp;
		$cacheSettings = array( 'memoryCacheSize' => '128M');
		PHPExcel_Settings::setCacheStorageMethod($cacheMethod, $cacheSettings);
		Excel::create('marketing-data-'.$lc.'-'.$program, function($excel) use($data){
		    // Set the title
		    $excel->setTitle('marketing-data');

		    // Chain the setters
		    $excel->setCreator('Marketing Tool')
		          ->setCompany('AIESEC');

		    //$keys = array_keys((array)$data[0]);
		    $excel->sheet('Data', function($sheet) use($data) {
		        $sheet->fromArray($data);
		    });

		})->download('csv');

		/*foreach (array_keys((array)$data[0]) as $key) {
	        $objPHPExcel->getActiveSheet()->setCellValue($column.$rowCount,$key);
	        $column++;
    	}*/

    	//var_dump($data);
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
