<?php
/**
 * Created By Dedi Fardiyanto
 * @Filename MsidnTrait.php
 * @LastModified 27/01/2020, 16:48
 * @today 27/01/2020, 16:48
 *
 * Copyright (c) 2020. All rights reserved.
 */

namespace App\Traits;


trait MsidnTrait
{
    public function noToMsidn($nohp)
    {
        // kadang ada penulisan no hp 0811 239 345
        $nohp = str_replace(" ","",$nohp);
        // kadang ada penulisan no hp (0274) 778787
        $nohp = str_replace("(","",$nohp);
        // kadang ada penulisan no hp (0274) 778787
        $nohp = str_replace(")","",$nohp);
        // kadang ada penulisan no hp 0811.239.345
        $nohp = str_replace(".","",$nohp);

        // cek apakah no hp mengandung karakter + dan 0-9
        if(!preg_match('/[^+0-9]/',trim($nohp))){
            // cek apakah no hp karakter 1-3 adalah +62
            if(substr(trim($nohp), 0, 3)=='+62'){
                $hp = trim($nohp);
            }
            // cek apakah no hp karakter 1 adalah 0
            elseif(substr(trim($nohp), 0, 1)=='0'){
                $hp = '+62'.substr(trim($nohp), 1);
            } else {
                $hp = '+62'. trim($nohp);
            }
        }
        return $hp;
    }

    public function msidnToNo($phoneNumber)
    {
        $result = substr_replace($phoneNumber,'0',0,3);

        return $result;
    }
}
