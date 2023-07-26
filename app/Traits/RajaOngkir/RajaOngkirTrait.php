<?php
/**
 * Created By Dedi Fardiyanto
 *
 * @Filename     RajaOngkirTrait.php
 * @LastModified 4/11/19 10:56 AM.
 *
 * Copyright (c) 2019. All rights reserved.
 */

namespace App\Traits\RajaOngkir;

use App\Models\Subdistricts;
use Illuminate\Support\Facades\DB;
use App\Models\Shipping;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;

trait RajaOngkirTrait
{

    public function getKeyRajaOngkir() {
    	return config("raja_ongkir.api_key_raja_ongkir");
    }

    public function getOngkirApi($request)
    {
        return $this->setupGetApiCost($request);
    }

    public function storeShippingBySales($request, $orderDb, $userDb)
    {
    	if (is_array($request->products)) {
    		# code...
	    	foreach ($request->products as $product) {
	    		# code...
	    		// dd($request->all());
	    		if ($product['product_type'] == 'Book' || $product['product_type'] == 'book') {
	    			# code...
			    	$shippingDb = new Shipping();
			    	// $save->tracking_code = ;
			    	$shippingDb->user_id = $userDb->id;
			    	$shippingDb->product_id = $product['product_id'];
			    	$shippingDb->order_id = $orderDb->id;
			    	$shippingDb->charge = $request->ongkirHidden;
			    	$shippingDb->provider = $request->codeExpedisi;
			    	
			    	$shippingDb->save();
	    		}
	    	}
    	}
    	return $shippingDb;
    }

    public function storeShippingByCustomerItSelf($request, $orderDb, $userDb)
    {
    	// dd($request->all());
    	if (is_array($request->products)) {
    		# code...
	    	foreach ($request->products as $product) {
	    		# code...
	    		if ($product['product_type'] == 'book') {
	    			# code...
			    	$shippingDb = new Shipping();
			    	// $save->tracking_code = ;
			    	$shippingDb->user_id = $userDb->id;
			    	$shippingDb->product_id = $product['product_id'];
			    	$shippingDb->order_id = $orderDb->id;
			    	$shippingDb->charge = $request->ongkirHidden;
			    	$shippingDb->provider = $request->codeExpedisi;
			    	
			    	$shippingDb->save();
	    		}
	    	}
    	}
    	return $shippingDb;
    }

    public function getIdSubdistrictAndCity($request)
    {
    	// $this->getCity($request);
    	dd('disabled');
    }

    protected function setupGetApiCost($request)
    {
		$curl = curl_init();
		
		$weightBuku = 400 * $request->jumlahBuku; //1 buku = 400 gram melihat dari tokopedia
		$queryString = '';

		$queryString .= 'origin=445&';
		$queryString .= 'originType=city&';
		$queryString .= 'destination='.$request->destination.'&';
		$queryString .= 'destinationType=city&'; // subdistrict
		$queryString .= 'weight='.$weightBuku.'&'; //gram 
		$queryString .= 'courier='.$request->courier;
		
		// return response()->json(['success' => $queryString]);

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "https://pro.rajaongkir.com/api/cost",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "POST",
		  CURLOPT_POSTFIELDS => $queryString,
		   // 'origin=501&originType=city&destination=574&destinationType=subdistrict&weight=1700&courier=jne',
		  CURLOPT_HTTPHEADER => array(
		    "content-type: application/x-www-form-urlencoded",
		    "key:". $this->getKeyRajaOngkir()
		  ),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
		  	#return "cURL Error #:" . $err;
			return $err;
			// return response()->json(['error' => $err]);
		} else {
			return $response;
		    // return response()->json(['success' => $response]);
		}	
    }

    public function getProvince()
    {
    	$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "https://pro.rajaongkir.com/api/province", # dapat memasukkan param ?id=12 // kode province
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "GET",
		  CURLOPT_HTTPHEADER => array(
		    "key:". $this->getKeyRajaOngkir()
		  ),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
		  	// echo "cURL Error #:" . $err;
		  	return response()->json(['error' => $err]);
		} else {
		  	// echo $response;
			return response()->json(['success' => $response]);
		}
    }

    public function getCity($request)
    {
    	$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "https://pro.rajaongkir.com/api/city", # dapat memasukkan param ?id=39&province=5 // kode city dan province
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "GET",
		  CURLOPT_HTTPHEADER => array(
		    "key:". $this->getKeyRajaOngkir()
		  ),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
		
		  // echo "cURL Error #:" . $err;
		  return response()->json(['error' => $err]);
		
		} else {
		  
		  return $response;
		
		  //json_encode($response);
		  // return response()->json($response);
		
		}
    }

    public function getIdSubdistrict()
    {
    	$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "https://pro.rajaongkir.com/api/subdistrict",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "GET",
		  CURLOPT_HTTPHEADER => array(
		    "key:". $this->getKeyRajaOngkir()
		  ),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
		  // echo "cURL Error #:" . $err;
		  return response()->json(['error' => $err]);
		} else {
		  // return $response; //json_encode($response);
  		  return response()->json(['success' => $response]);
		}
    }

    public function UpdateSubdisrictIdOnBase($dataAPI) // once running
    {
    	DB::beginTransaction();
    	try {
	        foreach ($dataAPI->rajaongkir->results as $rajaOngkirID) {
	            # code...
	            $upd = Subdistricts::where('city', $rajaOngkirID->city_name);

	            $obj = [
	            	'rajaongkir_city_id' => $rajaOngkirID->city_id, //'rajaongkir_subdistric_id' => $rajaOngkirID->city_id
	            ];

	            $upd->update($obj);
	        }
	        DB::commit();
	        // return $upd;

	        dd('success updated!');

    	} catch (Exception $exception) {
    		DB::rollBack();

            dd($exception->getMessage() . ' ' . $exception->getLine());
            // return $exception->getCode();
    	}    	
    }
}
