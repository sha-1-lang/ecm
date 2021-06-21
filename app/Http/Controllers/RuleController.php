<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Rule;
use App\Models\EmailLogs;
use App\Models\InvalidEmail;
use DataTables;

class RuleController extends Controller
{
    public function index()
    {
       
        return view('rules.index');
    }

    public function create()
    {
        return view('rules.create');
    }

    public function show(Rule $rule)
    {
        return view('rules.show', compact('rule'));
    }

    public function mauticStages(){
        $curl = curl_init();
        curl_setopt_array($curl, array(
          CURLOPT_URL => 'https://chassetonboss.com/api/stages',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'GET',
          CURLOPT_POSTFIELDS => 'email=postmantest%40gmail.com',
          CURLOPT_HTTPHEADER => array(
            'Cache-Control: no-cache',
            'Content-Type: application/x-www-form-urlencoded',
            'Authorization: Basic YWRtaW46cEFUMUVMb08wSg==',
            'Cookie: 7f1f4efd8300716cc1857d0a8ab6c63d=i5elk2qer5dci1srp9thvoiok5'
          ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        $allstages = json_decode($response);
        $results = $allstages->stages;
        $final_array = '';
        $selectedVal = $_GET['data'];
        $final_array .=  '<option value=""></option>';
        $final_array .=  '<input type="hidden" id="selectedVal" value="'.$selectedVal.'"/>';
        foreach ($results as $key => $result) {
           $final_array .= '<option value="'.$result->id.'">'.$result->name.'</option>';
        }
        return $final_array;
    }

    public function emailSyncedList(Request $request){
       if ($request->ajax())
        {
           $rule_id = $request->rule_id;
            $emails = EmailLogs::
            where('rule_number',$rule_id)
            ->select('email')->get()->toArray();

            $emails2 = InvalidEmail::
            where('rule_number',$rule_id)
            ->select('email')->get()->toArray();
            $final = array_merge($emails,$emails2);

           // echo '<pre>';print_r($final); die;
            return Datatables::of($final)
                ->addColumn('id', function ($row) {
                    return $row['email'];
                })
                ->addColumn('email', function ($row) {
                    return $row['email'];
                })
               
               ->make(true);
        }
    }
}
