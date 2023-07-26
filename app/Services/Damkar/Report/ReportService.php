<?php

namespace App\Services\Damkar\Report;

use App\Models\Damkar\Picket;
use App\Traits\fileUploadTrait;
use App\Traits\Medsos\MedsosTrait;
use App\Traits\MsidnTrait;
use Illuminate\Support\Facades\DB;


/**
 * Class AdvertisementService
 * @package App\Services\PalembangKito\Advertisement
 */
class ReportService implements ReportServiceContract
{
    use MsidnTrait, fileUploadTrait, MedsosTrait;

    /**
     * @var Piket
     */
    protected $model;

    /**
     * AdvertisementService constructor.
     * @param Piket $picket
     */
    public function __construct(
        Picket $picket
    )
    {
        $this->model = $picket;
    }

    public function getReportPicketByDate($request)
    {
        $date = $request->date ?? date('Y-m-d');
        $id_group_picket = $request->id_group_picket ?? 'all';

        $dataDb = Picket::select('*')->where('date_picket', $date)
            ->where(function ($groupPicket) use ($id_group_picket) {
                    if ($id_group_picket != 'all') {
                        $groupPicket->where('id_group_picket', $id_group_picket);
                    }
            })->get();

        return $dataDb;
    }

    public function getAggregateReportPicketByDate($request)
    {
        $date = $request->date ?? date('Y-m-d');
        $id_group_picket = $request->id_group_picket ?? 'all';

        $dataDb = Picket::select([DB::raw("CONCAT(upper(id_group_picket), ' - ', upper(group_picket)) as group_picket"), DB::raw('count(id_group_picket) as total')])->where('date_picket', $date)
            ->where(function ($groupPicket) use ($id_group_picket) {
                if ($id_group_picket != 'all') {
                    $groupPicket->where('id_group_picket', $id_group_picket);
                }
            })
            ->groupBy('id_group_picket')
            ->get();

        return $dataDb;
    }

    public function getAttendance($request)
    {
        $date = $request->date ?? date('Y-m-d');
        $id_group_picket = explode("-", $request->group_picket)[0];

        $dataDb = Picket::select('*')->where('date_picket', $date)
            ->where(function ($groupPicket) use ($id_group_picket) {
                if ($id_group_picket != 'all') {
                    $groupPicket->where(DB::raw('lower(id_group_picket)'), $id_group_picket);
                }
            })->get();

        return $dataDb;
    }

}
