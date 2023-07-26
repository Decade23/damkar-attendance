<?php

namespace App\Http\Controllers\Backend\PalembangKito\Reports;

use App\Http\Requests\PalembangKito\Reports\reportCategoryRequest;
use App\Services\PalembangKito\ReportCategory\ReportCategoryServicesContract;
use App\Traits\redirectTo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReportCategoryController extends Controller
{
    use redirectTo;

    protected $service;
    protected $titlePage = 'Report Category';
    /**
     * ReportCategoryController constructor.
     */
    public function __construct(ReportCategoryServicesContract $reportCategoryServicesContract)
    {
        $this->service = $reportCategoryServicesContract;
    }

    public function index()
    {
        $data['titlePage'] = $this->titlePage;

        return view('backend.palembang_kito.report.category.index', $data);
    }

    public function create()
    {
        $data['titlePage'] = $this->titlePage;
        return view('backend.palembang_kito.report.category.create', $data);
    }

    public function store(reportCategoryRequest $request)
    {
        #Save Report Category Data
        if(is_object($this->service->store($request))){

            #Bump....
            return $this->redirectSuccessCreate(route('report_category.index'), $request->name);

        } else {

            #Bump....
            return $this->redirectFailed(route('report_category.index'), 'Failed To Save The '. $this->titlePage);
        }
    }

    public function edit($id) {

        $dataDb['titlePage'] = $this->titlePage;
        $dataDb['dataDb'] = $this->service->get($id);

        return view('backend.palembang_kito.report.category.update', $dataDb);
    }

    public function update($id, reportCategoryRequest $request)
    {
        #Update Product Data
        if (is_object($this->service->update($id, $request))) {

            #Bump....
            return $this->redirectSuccessUpdate(route('report_category.index'), $request->name);

        } else {

            #Bump....
            return $this->redirectFailed(route('report_category.index'), 'Failed To Update The '. $this->titlePage);
        }
    }

    public function destroy($id)
    {
        #Get services for bulk delete
        $this->service->destroy($id);

        #Bump....
        return $this->redirectSuccessDelete(route('report_category.index'), $this->titlePage);
    }

    public function datatable(Request $request)
    {
        if ($request->ajax() === true) {
            # Return The JSON datatables Data
            return $this->service->datatable($request);
        }

        abort('404', 'uups');
    }
}
