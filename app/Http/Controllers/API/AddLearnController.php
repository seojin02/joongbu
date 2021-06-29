<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// model
use App\Model\ClassAddLearn;

use DB;

// resource
use App\Http\Resources\commonResource;
use App\Http\Resources\commonCollection;

class AddLearnController extends Controller
{

  public function store(Request $req){
    //$url = $url.'/'.http_build_query($params, '', '/');
    //$url = 'http://192.168.0.124/api/list/20190805';
    // $url = 'http://192.168.0.124/api/list';
    // $day =  20190805;
    //
    // $urls = $url.'/'.$day;
    //
    // $ch = curl_init();
    //
    // curl_setopt($ch, CURLOPT_URL, $urls);
    //
    // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    //
    // curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
    //
    // curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    //
    // $response = curl_exec($ch);
    //
    // curl_close($ch);
    //
    // // return $response;
    // print_r($response);
    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => "http://192.168.0.124/api/list/20190805",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_TIMEOUT => 30000,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
        	// Set Here Your Requesred Headers
            'Content-Type: application/json',
        ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);
    curl_close($curl);

    if ($err) {
        echo "cURL Error #:" . $err;
    } else {
        print_r(json_decode($response));
        //echo $response;
    }
  }

}
