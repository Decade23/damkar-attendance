<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Services\Dashboard\DashboardServiceContract;
use App\Traits\redirectTo;
use Illuminate\Http\Request;
use App\Models\Orders;
use App\Models\UserRole;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use App\Models\Auth\UserProduct;
use DB;

class DashboardController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Sentinel::getUser()->user_role->role->slug != 'member'){
            return view('backend.dashboard.index');
        }
        else{
            return redirect()->route('login.form');
        }
    }

    public function getchartdaily(Request $request, DashboardServiceContract $dashboardServiceContract)
    {

        if ($request->ajax()) {
            # Return The JSON datatables Data
            return $dashboardServiceContract->daily($request);
        }

        abort('404', 'uups');
    }

    public function getchartweekly(Request $request, DashboardServiceContract $dashboardServiceContract)
    {

        if ($request->ajax()) {
            # Return The JSON datatables Data
            return $dashboardServiceContract->weekly($request);
        }

        abort('404', 'uups');
    }

    public function getchartmonthly(Request $request, DashboardServiceContract $dashboardServiceContract)
    {

        if ($request->ajax()) {
            # Return The JSON datatables Data
            return $dashboardServiceContract->monthly($request);
        }

        abort('404', 'uups');
    }
}
