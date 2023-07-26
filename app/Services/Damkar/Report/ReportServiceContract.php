<?php


namespace App\Services\Damkar\Report;


interface ReportServiceContract
{
    public function getReportPicketByDate($request);
    public function getAggregateReportPicketByDate($request);
    public function getAttendance($request);


}
