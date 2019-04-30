<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use App\Cyber;
use App\User;
use Session;

class BackendController extends Controller
{
    public function view()
    {
        return view ('pages/backend');
    }

    public function backend(){
        
        if (input::get('s_time')){
            $s_time = input::get('s_time');
            $e_time = input::get('e_time');

           $url= 'http://192.168.70.70:8080/monitoring-cyberpatrol/get-by-time?s_time='.$s_time.'&e_time='.$e_time;
           

        }else{        
            $url ='http://192.168.70.70:8080/monitoring-cyberpatrol/get-all';
        }

        // return $url;

        $curl = curl_init();
        
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
              
                'Content-Type: application/json',
            ),
        ));
        $response = curl_exec($curl);
        $datax = json_decode($response, true);
        $err = curl_error($curl);
        $data = array("jmlhs"=>$datax);
        // return $datax;
        return view ('pages.backend',$data);
    
    }
}
