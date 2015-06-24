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
        	$id = DB::table('marketing_leads')->insertGetId(
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
          return $this->response->errorNotFound("Error: Record not updated - DataValidationException");   
        }

        try {
            DB::table('marketing_leads')
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
            $id = DB::table('marketing_leads')->insertGetId(
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

    public function addExpaLead()
    {
        $keywords = urldecode(Input::get("keywords"));
        $lc_id = urldecode(Input::get("lc_id"));
        var_dump($keywords);
        var_dump($lc_id);
        try {
            $id = DB::table('expa_leads')->insertGetId(
                    array('keywords' => $keywords, 
                          'lc_id' => $lc_id
                    )
            );
            $message = 'New record created';
            return $this->response->withItem($message, new LeadTransformer($message));
        } catch (\Illuminate\Database\QueryException $e) {
            //var_dump($e);
            return $this->response->errorNotFound("Error: Record not created - QueryException");
        }
    }

    public function getExpaLeads()
    {
      
      $dataArray = array();
      try {
        $resArray = DB::select("
        SELECT expa_leads.keywords, lcs.expa_name, lcs.expa_id AS lc 
          FROM expa_leads INNER JOIN lcs 
          ON lcs.expa_id = expa_leads.lc_id 
          ORDER BY lcs.name, expa_leads.keywords");

        foreach ($resArray as $res) {
          
          array_push($dataArray, array(
              'keywords'=>$res->keywords,
              'lc_id'=>$res->lc,
              'expa_name'=>$res->expa_name
              ));
        }  

        return $dataArray;
      } catch (\Illuminate\Database\QueryException $e) {
            //var_dump($e);
          return $this->response->errorNotFound("Error: Data not received - QueryException");
      }
      return $dataArray;
    }

    public function getLCs()
    {
      
      $dataArray = array();
      try {
        $resArray = DB::select("
        SELECT id, expa_id, expa_name, url_name, full_name FROM lcs ORDER BY expa_name");

        foreach ($resArray as $res) {
          array_push($dataArray, array(
              'id'=>$res->id, 
              'expa_id'=>$res->expa_id,
              'expa_name'=>$res->expa_name,
              'url_name'=>$res->url_name,
              'full_name'=>$res->full_name
              ));
        }

        return $dataArray;
      } catch (\Illuminate\Database\QueryException $e) {
            //var_dump($e);
          return $this->response->errorNotFound("Error: Data not received - QueryException");
      }
      return $dataArray;
    }

    public function getRegisteredLeads()
    {
      $id = urldecode(Input::get("id"));
      $lc = urldecode(Input::get("lc"));
      $program = urldecode(Input::get("program"));
      $dataArray = array();
      try {
        $resArray = DB::select("
        SELECT id, timestamp::date, bucket, name, surname, email, phone_number 
        FROM marketing_leads 
        WHERE registered = 1 
          AND id > ".$id." 
          AND lc_form ='".$lc."' 
          AND program = '".$program."'");

        foreach ($resArray as $res) {
          array_push($dataArray, array(
              'id'=>$res->id, 
              'timestamp'=>$res->timestamp,
              'bucket'=>$res->bucket,
              'name'=>$res->name,
              'surname'=>$res->surname,
              'email'=>$res->email,
              'phone_number'=>$res->phone_number
              ));
        }

        return $dataArray;
      } catch (\Illuminate\Database\QueryException $e) {
            //var_dump($e);
          return $this->response->errorNotFound("Error: Data not received - QueryException");
      }
      return $dataArray;
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