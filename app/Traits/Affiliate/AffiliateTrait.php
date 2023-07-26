<?php
/**
 * Created By Fachruzi Ramadhan
 *
 * @Filename     EmailTrait.php
 * @LastModified 4/11/19 10:56 AM.
 *
 * Copyright (c) 2019. All rights reserved.
 */

namespace App\Traits\Affiliate;
use App\Models\Affiliate;
use App\Models\Commission;

trait AffiliateTrait
{
    public function storeAffiliateByMemberitSelf($userDb, $orderID, $affiliateID, $commission, $totalPrice)
    {
        $type = number_format(($commission*100)/$totalPrice,2,'.','');
        $saveDB = new Affiliate();
        $saveDB->customer_id = $userDb->id;
        $saveDB->affiliate_id = $affiliateID;
        $saveDB->order_id = $orderID;
        $saveDB->commission_type = $type.' %';
        $saveDB->commission_total = $commission;
        // $saveDB->status = $request; // unpaid
        // $saveDB->note = $request->has('note') ? $request->note : '';

        return $saveDB->save();

    }

    public function sumCommission($productData)
    {
        $com = Commission::with(['products','detail_orders'])->get();
        $sum_percent = 0;
        $sum_fixed = 0;
        $sum_total = 0;
        $productBaru = [];
        // dd($productData);
        foreach ($com as $el) {
            # code...
            foreach ($productData as $product) {
                # code...
                // dd($product);
                $sum_fixed = 0;
                $sum_percent = 0;
                if ($el->product_id == $product->id) {
                    # code...
                    if ($el->commission_type == 'Percent') {
                        # code...
                        // $sum +=  $sum + (($el->commission_numeric/100) * ($el->products->price));
                        $sum_percent = (($el->commission_numeric/100) * ($el->products->price));
                        $sum_total = $sum_total + $sum_percent;
                        // $productBaru[] = $sum_percent;

                    } else {
                        // $sum += $sum + ($el->commission_numeric * $product->qty);
                        $sum_fixed = ($el->commission_numeric * $product->qty);
                        $sum_total = $sum_total + $sum_fixed;
                        // $productBaru[] = $sum_fixed;

                    }
                }
            }
        }
        // dd($productBaru, $sum_total);

        return $sum_total;
    }
}
