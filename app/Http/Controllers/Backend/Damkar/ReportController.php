<?php
/**
 * Created By Dedi Fardiyanto
 * Copyright (c) 2020, Inc - All Rights Reserved
 * @Filename AdvertisementController.php
 * @LastModified 21/03/2020, 18:05
 */

namespace App\Http\Controllers\Backend\Damkar;

use App\Http\Controllers\Controller;
use App\Http\Requests\Damkar\PicketRequest;
use App\Services\Damkar\Report\ReportServiceContract;
use App\Traits\redirectTo;
use Illuminate\Http\Request;

/**
 * Class AdvertisementController
 * @package App\Http\Controllers\Backend\PalembangKito
 */
class ReportController extends Controller
{
    use redirectTo;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $service;
    /**
     * @var Category
     */
    public $categories;

    /**
     * AdvertisementController constructor.
     * @param AdvertisementServiceContract $reportServiceContract
     * @param Category $category
     */
    public function __construct(
        ReportServiceContract $reportServiceContract
    )
    {
        $this->service = $reportServiceContract;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $data['attendance'] = $this->service->getReportPicketByDate(date('Y-m-d'));

        $data['attendance_aggrerate'] = $this->service->getAggregateReportPicketByDate(date('Y-m-d'));

        return view('backend.report_damkar.index', $data);

    }

    /**
     * Datatable Class
     *
     * @param Request                $request
     *
     *
     * @param ProductServiceContract $productServiceContract
     *
     * @return \Illuminate\Http\JsonResponse|\Yajra\DataTables\DataTableAbstract
     */
    public function getAttendance(Request $request)
    {

        if ($request->ajax()) {
            # Return The JSON datatables Data
            return $this->service->getAttendance($request);
        }

        abort('404', 'uups');
    }

    public function getAttendanceAndAggregate(Request $request)
    {

        if ($request->ajax()) {
            # Return The JSON datatables Data
            $data['attendance'] = $this->service->getReportPicketByDate($request);

            $data['attendance_aggrerate'] = $this->service->getAggregateReportPicketByDate($request);

            return response()->json($data);
        }

        abort('404', 'uups');
    }


}
