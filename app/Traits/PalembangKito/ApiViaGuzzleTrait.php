<?php
/**
 * Created By Dedi Fardiyanto
 * Copyright (c) 2020, Inc - All Rights Reserved
 * @Filename ApiViaGuzzleTrait.php
 * @LastModified 04/05/2020, 15:07
 */

namespace App\Traits\PalembangKito;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use GuzzleHttp\Client;

trait ApiViaGuzzleTrait
{
    protected function getBaseUri() {
        return config('api.dev');
    }

    public function updateReport(int $id, $request) {
        $endpoint = 'report/';
        $desc = '';
        switch ($request->report_status) {
            case 'Accepted':
                $endpoint .= $id.'/accept';
                $desc = 'Report Accepted By';
                break;
            case 'Process':
                $endpoint .= $id.'/process';
                $desc = 'Report Processed By';
                break;
            case 'Rejected':
                $endpoint .= $id.'/reject';
                $desc = 'Report Rejected By';
                break;
            case 'Done':
                $endpoint .= $id.'/done';
                $desc = 'Report Done By';
                break;
        }

        $requestBody = array(
            'desc' => $request->report_desc,
            'created_by' => Sentinel::getUser()->name
        );

        #$payload = json_encode($requestBody);

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $this->getBaseUri().$endpoint,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => $requestBody,
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);

        if ($err) {
            //dd($err);
            //return response()->json(['error' => $err]);
            // echo "cURL Error #:" . $err;
            return false;
        } else {
            //dd(json_decode($response)->message);
            if (json_decode($response)->code == 200) {
                //return response()->json(['success' => $response]);
                return true;
            }
            return false;
        }

    }

    public function subscribeFcmAPI($request) {
        $endpoint = $this->getBaseUri().'fcm/subscribe';
        $requestBody = array(
            'topic' => $request->topic,
            'token' => $request->token
        );

        #$payload = json_encode($requestBody);

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $endpoint,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => $requestBody,
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);

        if ($err) {
            //dd($err);
            //return response()->json(['error' => $err]);
            // echo "cURL Error #:" . $err;
            return response()->json(['error' => $err, 'param' => $request->all(), 'endpoint' => $endpoint]);
        } else if ($response) {
//            dd(json_decode($response)->message);
            if (json_decode($response)->code == 200) {
                return response()->json(['success' => '200']);
            }
            return response()->json(['error' => '500']);
        }
        // error other if response and error not catching
        return response()->json(['error' => '500']);
    }

    public function InsertInfoApi($request) {

        #endpoint url
        $endpoint = $this->getBaseUri().'info/submit/dashboard';
        #$endpoint = 'http://127.0.0.1:8001/api/v1/info/submit/dashboard';

        #param
        $requestBody = array(
            'title' => $request->title,
            'slug' => str_slug($request->title),
            'desc' => $request->desc,
            'created_by' => Sentinel::getUser()->name
        );

        if ( $request->has('file') ) {

            $file = $request->file('file')[0];
            #$upload = base64_encode( file_get_contents( $file->path() ) );
            $file_extension = $file->getClientMimeType();
            #$file_path = $file->path();
            $file_name = $file->getClientOriginalName();
            #$curlFile = new \CURLFile('/Users/macos/Desktop/Screenshot 2020-05-16 at 14.38.03.png');
            #$requestBody = array_add($requestBody,'img',$curlFile);
            $requestBody = array_add($requestBody,'img', new \CURLFile($file->getPathName(),$file_extension,$file_name));

        }
        #dd($requestBody);

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $endpoint,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => $requestBody,
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);

        if ($err) {
            //dd($err);
            //return response()->json(['error' => $err]);
            // echo "cURL Error #:" . $err;
            return false;
        } else {
            #dd(json_decode($response));
            if (json_decode($response) != null) {
                if (json_decode($response)->code == 200) {
                    //return response()->json(['success' => $response]);
                    return true;
                }
            }
            return false;
        }
    }

}
