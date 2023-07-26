<?php
/**
 * Created By Fachruzi Ramadhan
 *
 * @Filename     ProvinceServiceContract.php
 * @LastModified 1/23/19 9:24 AM.
 *
 * Copyright (c) 2019. All rights reserved.
 */

namespace App\Services\Province;

interface ProvinceServiceContract
{
    public function getByCode($code);

    public function select2($request);
}
