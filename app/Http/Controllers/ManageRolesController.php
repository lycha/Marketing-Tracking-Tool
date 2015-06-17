<?php namespace App\Http\Controllers;
use DB;
use Input;
use App\Http\Controllers\Statistics;
use Excel;
use PHPExcel_CachedObjectStorageFactory;
use PHPExcel_Settings;
use App\User;
use Kodeine\Acl\Models\Eloquent\Permission;
use Kodeine\Acl\Models\Eloquent\Role;
class ManageRolesController extends Controller {

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
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{

		return view('manageroles');
	}	

}
