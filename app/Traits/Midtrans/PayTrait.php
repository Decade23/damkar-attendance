<?php
/**
 * Created By Fachruzi Ramadhan
 *
 * @Filename     payTrait.php
 * @LastModified 4/11/19 10:56 AM.
 *
 * Copyright (c) 2019. All rights reserved.
 */

namespace App\Traits\Midtrans;

use Veritrans_Config;
use Veritrans_Snap;

trait PayTrait
{
    public function midtransPay($order_code, $totalPrice, $member)
    {
        $customer_details = array(
            'first_name' => $member["name"],
            'email'      => $member["email"],
            'phone'      => $member["phone"],
        );

        $transaction_details = array(
            'order_id'     => $order_code,
            'gross_amount' => $totalPrice,
        );

        $expiry = array(
            "unit"     => "minute",
            "duration" => config("midtrans.expiry"),
        );

        $transaction = array(
            // 'enable_payments'	  => $enable_payments,
            // 'payment_type'        => 'bank_transfer',
            'transaction_details' => $transaction_details,
            'customer_details'    => $customer_details,
            'expiry'              => $expiry,
        );

        Veritrans_Config::$serverKey    = config("midtrans.server_key");
        Veritrans_Config::$isProduction = config("midtrans.is_production");
        Veritrans_Config::$isSanitized  = true;
        Veritrans_Config::$is3ds        = true;

        $snapToken = Veritrans_Snap::getSnapToken($transaction);

        return $snapToken;
    }
}
