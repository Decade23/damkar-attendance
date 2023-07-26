<?php
/**
 * Created By Fachruzi Ramadhan
 *
 * @Filename     ProvinceController.php
 * @LastModified 1/22/19 2:55 PM.
 *
 * Copyright (c) 2019. All rights reserved.
 */

namespace App\Http\Controllers\Backend;

use App\Services\Province\ProvinceServiceContract;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProvinceController extends Controller
{
    /**
     * Get User Select2
     *
     * @param Request                 $request
     * @param ProvinceServiceContract $provinceServiceContract
     *
     */
    public function select2(Request $request, ProvinceServiceContract $provinceServiceContract){

        if ($request->ajax()) {

            return $provinceServiceContract->select2($request);
        }

        return abort('404', 'uups');
    }
}
