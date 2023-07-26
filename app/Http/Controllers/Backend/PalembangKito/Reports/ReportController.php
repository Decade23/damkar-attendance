<?php

namespace App\Http\Controllers\Backend\PalembangKito\Reports;

use App\Http\Requests\PalembangKito\Reports\reportStatusRequest;
use App\Services\PalembangKito\Report\ReportServicesContract;
use App\Traits\redirectTo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * Class ReportController
 * @package App\Http\Controllers\Backend\PalembangKito\Reports
 */
class ReportController extends Controller
{
    use redirectTo;
    /**
     * @var ReportServicesContract
     */
    protected $service;
    /**
     * @var string
     */
    protected $titlePage = 'Report Lists';
    /**
     * ReportController constructor.
     */
    public function __construct(ReportServicesContract $reportServicesContract)
    {
        $this->service = $reportServicesContract;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $data['titlePage'] = $this->titlePage;
        $data['reportStatus'] = $this->service->getReportStatus();
        return view('backend.palembang_kito.report.lists.index', $data);
    }

    public function edit($id)
    {
        $data['titlePage'] = $this->titlePage;
        $data['dataDb'] = $this->service->get($id);
        $data['reportStatus'] = $this->service->getReportStatusById($id);

        return view('backend.palembang_kito.report.lists.update', $data);
    }

    public function update($id, reportStatusRequest $request)
    {
        #Update Product Data
         if ($this->service->updateViaApi($id, $request) === true) {
             #Bump....
            return $this->redirectSuccessUpdate(route('report.index'), $request->name);
         } else {
             #Bump....
             #keep status if fail access to api
             #$this->service->keepStatus($id, $request);
            return $this->redirectFailed(route('report.index'), 'Failed To Update The Report Or Fail to insert status log, status already exists');
         }
//        if (is_object($this->service->update($id, $request))) {
//
//            #Bump....
//            return $this->redirectSuccessUpdate(route('report.index'), $request->name);
//
//        } else {
//
//            #Bump....
//            return $this->redirectFailed(route('report.index'), 'Failed To Update The Category Sub Detail');
//        }
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function datatable(Request $request)
    {
        if ($request->ajax())
        {
            return $this->service->datatable($request);
        }

        abort('404', 'Uups');
    }

    public function subscribeFcm(Request $request) {

        if ($request->ajax()) {
            return $this->service->subscribeFcm($request);
        }
        abort('404', 'Uups');
    }
}
