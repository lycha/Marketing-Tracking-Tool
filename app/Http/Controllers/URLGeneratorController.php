<?php namespace App\Http\Controllers;

use DB;
use Input;
use App\Http\Controllers\Statistics;

class URLGeneratorController extends Controller {

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
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		//var_dump($lc);
		//var_dump($program);

		

		return view('urlgenerator', $this->populateForm());
	}

	public function populateForm()
	{
		$url = '';
		$programs = [''=>'- choose program -','gt'=>'Global Talents', 'gc'=>'Global Citizen', 'gh'=>'Global Host', 'fl'=>'Future Leaders', 'au'=>'AIESEC University'];
		$buckets = [''=>''];
		$sources = [''=>'- choose source -','facebook'=>'Facebook', 'twitter'=>'Twitter', 'offline'=>'Offline', 'press'=>'Press', 'lc-website'=>'LC website'];//array('Facebook', 'Twitter', 'Offline', 'Press', 'LC website');
		$mediums = [''=>''];
		$campaigns = [''=>'- choose campaign -','gt-summer'=>'GT Summer','gc-summer'=>'GC Summer'];
		//$lcs = array('Białystok', 'Gdańsk', );
		$lcs = [''=>'- choose LC -',
				'bialystok'=>'Białystok',
				'gdansk' => 'Gdańsk', 
				'katowice' => 'Katowice', 
				'kielce' => 'Kielce', 
				'krakow' => 'Kraków', 
				'lublin' => 'Lublin', 
				'lodz' => 'Łódź', 
				'olsztyn' => 'Olsztyn', 
				'poznan' => 'Poznań', 
				'rzeszow' => 'Rzeszów', 
				'szczecin' => 'Szczecin', 
				'torun' => 'Toruń', 
				'warszawasgh' => 'Warszawa SGH', 
				'warszawauw' => 'Warszawa UW', 
				'wroclawue' => 'Wrocław UE', 
				'wroclawut' => 'Wrocław UT', 
			];
		$response = compact('programs',
							'buckets',
							'sources',
							'mediums',
							'campaigns',
							'lcs',
							'url'
						);
		return $response;
	}

	public function generate()
	{
		$program = Input::get('program');
		$bucket = Input::get('bucket');
		$source = Input::get('source');
		$medium = Input::get('medium');
		$campaign = Input::get('campaign');
		$lc = Input::get('lc');
		$website = '';

		switch ($program) {
			case 'gt':
				$website = 'http://aiesec.pl/globaltalents?';  
				break;
			case 'gc':
				$website = 'http://aiesec.pl/globalcitizen?';  
				break;
			case 'gh':
				$website = 'http://aiesec.pl/globalhost?';  
				break;
			case 'fl':
				$website = 'http://aiesec.pl/futureleaders?';  
				break;
			case 'au':
				$website = Input::get('uni-website').'?';
				break;
			default:
				$website = 'http://aiesec.pl?';  
				break;
		}

		$url = $website.'utm_source='.$source.'&utm_medium='.$medium.'&utm_campaign='.$campaign.'&bucket='.$bucket.'&lc='.$lc;

		$form = $this->populateForm();
		$form['url'] = $url;
		
		return view('urlgenerator', $form);

	}

}
