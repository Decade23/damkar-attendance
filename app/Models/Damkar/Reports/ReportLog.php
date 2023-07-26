<?php

namespace App\Models\PalembangKito\Reports;

use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Illuminate\Database\Eloquent\Model;

class ReportLog extends Model
{
    protected $table = 'report_log';

    protected $primaryKey = 'report_log_id';

    protected $fillable = [
        'report_log_id', 'report_id', 'status', 'desc', 'created_by', 'created_at', 'updated_at'
    ];

    public function report()
    {
        return $this->belongsTo(Report::class, 'report_id', 'report_id');
    }

    public function updateReportStatus($id,$request)
    {
        # update status to DB
        $insert = $this->create(
            [
                'report_id' => $id,
                'status' => $request->report_status,
                'desc' => $request->report_desc,
                'created_by' => Sentinel::getUser()->email,
            ]
        );

        $insert->save();
        return $insert;
    }
}
