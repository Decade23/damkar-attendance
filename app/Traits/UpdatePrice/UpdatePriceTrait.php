<?php
/**
 * Created By Fachruzi Ramadhan
 *
 * @Filename     UpdatePriceTrait.php
 * @LastModified 4/11/19 10:56 AM.
 *
 * Copyright (c) 2019. All rights reserved.
 */

namespace App\Traits\UpdatePrice;

trait UpdatePriceTrait
{
    public function update_price($stocks)
    {
        $link = 'https://www.idx.co.id/umbraco/Surface/ListedCompany/GetTradingInfoSS?code='.$stocks.'&length=1';
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL             => $link,
            CURLOPT_RETURNTRANSFER  => true,
            CURLOPT_ENCODING        => '',
            CURLOPT_MAXREDIRS       => 10,
            CURLOPT_TIMEOUT         => 60,
            CURLOPT_HTTP_VERSION    => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST   => 'GET'
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if($err){
            // echo $err;
            return 'error';
        }
        else{
            return $response;
        }
    }
}
