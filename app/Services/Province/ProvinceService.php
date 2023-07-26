<?php
/**
 * Created By Fachruzi Ramadhan
 *
 * @Filename     ProvinceService.php
 * @LastModified 1/23/19 10:28 AM.
 *
 * Copyright (c) 2019. All rights reserved.
 */

namespace App\Services\Province;

use App\Models\Province;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class ProvinceService implements ProvinceServiceContract
{

    /**
     * Get Province By Code
     *
     * @param $code
     *
     * @return Province
     */
    public function getByCode($code) {
        return Province::find($code);
    }

    /**
     * Get Province For Select2
     *
     * @param Request $request
     *
     * @return mixed
     */
    public function select2($request)
    {
        try {
            $perPage = 10;
            $page    = $request->page ?? 1;

            Paginator::currentPageResolver(
                function () use ($page) {
                    return $page;
                }
            );

            $dataDb = Province::select(['code as id', 'name as text'])->where('name', 'LIKE', '%'.$request->term.'%')->orderBy('name')->paginate($perPage);

            return $dataDb;

        } catch (\Exception $exception) {

            return $exception->getCode();
        }
    }
}
