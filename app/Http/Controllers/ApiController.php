<?php namespace App\Http\Controllers;

use DB;
use Input;
use App;
use Chrisbjr\ApiGuard\Http\Controllers\ApiGuardController;
use League\Fractal\TransformerAbstract;
/**
* 
*/
class ApiController extends ApiGuardController
{
	public function saveLead()
    {
      DB::enableQueryLog();
    	$utm_campaign = urldecode(Input::get('utm_campaign'));
    	$utm_source = urldecode(Input::get("utm_source"));
        $utm_medium = urldecode(Input::get("utm_medium"));
        $program = urldecode(Input::get("program")); 
        $bucket = urldecode(Input::get("bucket"));
        $uniqid = urldecode(Input::get("uniqid"));
        $lc = urldecode(Input::get("lc"));
        $registered = 0;

        try {
        	$id = DB::table('marketing_leads_test')->insertGetId(
			    array('uniqid' => $uniqid, 
			    	  'utm_source' => $utm_source,
			    	  'utm_medium' => $utm_medium,
			    	  'utm_campaign' => $utm_campaign,
			    	  'program' => $program,
			    	  'bucket' => $bucket,
			    	  'lc' => $lc,
			    	  'registered' => $registered,
                      'name' => '',
                      'surname' => '',
                      'email' => '',
                      'phone_number' => '',
                      'lc_form' => '',
				)
			);
			return $this->response->withItem($id, new LeadTransformer($id));
        } catch (\Illuminate\Database\QueryException $e) {
        	return $this->response->errorNotFound("Error: lead not saved - QueryException");
        }
    	
		//uniqid, utm_source, utm_medium, utm_campaign, program, bucket, lc, lc_form, name, surname, email, phone_number, registered
        
    }

    public function registerLead()
    {
      DB::enableQueryLog();
        $uniqid = urldecode(Input::get('uniqid'));
        $first_name = urldecode(Input::get("first_name"));
        $last_name = urldecode(Input::get("last_name"));
        $email = urldecode(Input::get("email")); 
        $phone_number = urldecode(Input::get("phone_number"));
        $lc_form = urldecode(Input::get("lc_form"));
        $registered = 1;

        if($uniqid==""){
          return $this->response->errorNotFound("Error: Record not updated - DataValidationException")   
        }

        try {
            DB::table('marketing_leads_test')
                ->where('uniqid', $uniqid)
                ->update(
                    array('uniqid' => "", 
                          'name' => $first_name,
                          'surname' => $last_name,
                          'email' => $email,
                          'phone_number' => $phone_number,
                          'lc_form' => $lc_form,
                          'registered' => $registered
                    )
            );
            $message = 'update of record successful';
            return $this->response->withItem($message, new LeadTransformer($message));
        } catch (\Illuminate\Database\QueryException $e) {
            //var_dump($e);
            return $this->response->errorNotFound("Error: Record not updated - QueryException");
        }
        
        //uniqid, utm_source, utm_medium, utm_campaign, program, bucket, lc, lc_form, name, surname, email, phone_number, registered
        
    }

    public function registerNew()
    {
        DB::enableQueryLog();

        $first_name = urldecode(Input::get("first_name"));
        $last_name = urldecode(Input::get("last_name"));
        $email = urldecode(Input::get("email"));
        $phone_number = urldecode(Input::get("phone_number"));
        $lc_form = urldecode(Input::get("lc_form"));
        $utm_campaign = urldecode(Input::get('utm_campaign'));
        $utm_source = urldecode(Input::get("utm_source"));
        $utm_medium = urldecode(Input::get("utm_medium"));
        $program = urldecode(Input::get("program")); 
        $bucket = urldecode(Input::get("bucket"));
        $lc = urldecode(Input::get("lc"));
        $registered = 1;

        try {
            $id = DB::table('marketing_leads_test')->insertGetId(
                    array('uniqid' => "", 
                          'name' => $first_name,
                          'surname' => $last_name,
                          'email' => $email,
                          'phone_number' => $phone_number,
                          'lc_form' => $lc_form,
                          'utm_source' => $utm_source,
                          'utm_medium' => $utm_medium,
                          'utm_campaign' => $utm_campaign,
                          'program' => $program,
                          'bucket' => $bucket,
                          'lc' => $lc,
                          'registered' => $registered
                    )
            );
            $message = 'New record created';
            return $this->response->withItem($message, new LeadTransformer($message));
        } catch (\Illuminate\Database\QueryException $e) {
            //var_dump($e);
            return $this->response->errorNotFound("Error: Record not created - QueryException");
        }
        
        //uniqid, utm_source, utm_medium, utm_campaign, program, bucket, lc, lc_form, name, surname, email, phone_number, registered
        
    }
}


class LeadTransformer extends TransformerAbstract {

	
    public function transform($value)
    {
        return [
            'data'     => $value
        ];
    }
}

?>