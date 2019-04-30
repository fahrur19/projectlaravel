<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EngineController extends Controller
{
    public function engine(){
        


        $curl = curl_init();
        
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'http://192.168.70.20:8080/monitoring-cyberpatrol/get-list-engine',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                // Set Here Your Requesred Headers
                'Content-Type: application/json',
            ),
        ));
        $response = curl_exec($curl);
        $datax = json_decode($response, true);
        $err = curl_error($curl);
        $data = array("faks"=>$datax);
        // return $datax[0];
        return view ('pages.engine',$data);
    }
}
