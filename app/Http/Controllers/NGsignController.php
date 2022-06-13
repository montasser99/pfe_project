<?php

namespace App\Http\Controllers;
use App\Models\DemandeConge;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class NGsignController extends Controller
{

    public function Get_transaction()
    {
                /**partie test**/

                $token = 'eyJhbGciOiJIUzUxMiJ9.eyJzdWIiOiJtb2hhbWVkLmtzaWJpQGV0YXAuY29tLnRuIiwiaWF0IjoxNjUzODk5MTA3fQ.P6l8oAu8OyUr_jFpOoFplJ-vtdlEmrc_2Qxd4jfw4WLOrQnklPPpuTBNSs9-BcBFEflpjjlXDy3i6N5M3ebFeQ';
                $client = new \GuzzleHttp\Client();
                $response = $client->request('GET', 'https://app.ng-sign.com.tn/server/any/transaction/57154aa9-43c3-4c0c-9ab0-e3eeecc92bc4/', [
                    'headers' => [
                        'Authorization' => 'Bearer '.$token,
                        'Accept' => 'application/json',
                     ]
                ]);
                $data = json_decode($response->getBody());
                foreach($data as $d) {
                    foreach($d as $k=>$v) {
                        Log::info("$k - $v\n");
                     }
                }
                dd($data->object->status);


        $token = 'eyJhbGciOiJIUzUxMiJ9.eyJzdWIiOiJtb2hhbWVkLmtzaWJpQGV0YXAuY29tLnRuIiwiaWF0IjoxNjUzODk5MTA3fQ.P6l8oAu8OyUr_jFpOoFplJ-vtdlEmrc_2Qxd4jfw4WLOrQnklPPpuTBNSs9-BcBFEflpjjlXDy3i6N5M3ebFeQ';


        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', 'https://app.ng-sign.com.tn/server/any/transaction/57154aa9-43c3-4c0c-9ab0-e3eeecc92bc4/', [
            'headers' => [
                'Authorization' => 'Bearer '.$token,
                'Accept' => 'application/json',
             ]
        ]);
        $data = json_decode($response->getBody());
        // dd($response);
        return($data);
    }


public function Get_pdf($uuid,$pdfs)
{





    /*
    $token = 'eyJhbGciOiJIUzUxMiJ9.eyJzdWIiOiJtb2hhbWVkLmtzaWJpQGV0YXAuY29tLnRuIiwiaWF0IjoxNjUzODk5MTA3fQ.P6l8oAu8OyUr_jFpOoFplJ-vtdlEmrc_2Qxd4jfw4WLOrQnklPPpuTBNSs9-BcBFEflpjjlXDy3i6N5M3ebFeQ';



    $client = new \GuzzleHttp\Client();
    $response = $client->request('GET', 'https://app.ng-sign.com.tn/server/any/transaction/5914fb69-ee9c-406d-ab33-5bab15fb67dd/pdfs/24d89cd6-d003-42b0-a369-eba33b619c42', [
        'headers' => [
            'Authorization' => 'Bearer '.$token,
           // 'Accept' => 'application/json',
         ]
    ]);
    $data = $response->getBody();
    //dd($data);
    Storage::put('public/storage/test.pdf',$data);
    return ($data);
    */

    return response()->streamDownload(function () use ($uuid, $pdfs)  {
        $token = 'eyJhbGciOiJIUzUxMiJ9.eyJzdWIiOiJtb2hhbWVkLmtzaWJpQGV0YXAuY29tLnRuIiwiaWF0IjoxNjUzODk5MTA3fQ.P6l8oAu8OyUr_jFpOoFplJ-vtdlEmrc_2Qxd4jfw4WLOrQnklPPpuTBNSs9-BcBFEflpjjlXDy3i6N5M3ebFeQ';


        $client = new \GuzzleHttp\Client();
        echo $response = $client->request('GET', 'https://app.ng-sign.com.tn/server/any/transaction/'.$uuid.'/pdfs/'.$pdfs, [
            'headers' => [
                'Authorization' => 'Bearer '.$token,
                //'Accept' => 'application/pdf',
             ]
        ])->getBody();
        // $data = $response;
        }, 'laravel.pdf');

    /*return response()->file(
        public_path('public\storage\demandes/'.$data.'pdf')

    );*/
}

}




