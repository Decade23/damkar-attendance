<?php

namespace App\Models\PalembangKito\Reports;

use Illuminate\Database\Eloquent\Model;

class ReportStatus extends Model
{
    CONST MENUNGGU  = 1;
    CONST DITERIMA  = 2;
    CONST DITANGANI = 3;
    CONST DITOLAK   = 4;
    CONST SELESAI   = 5;

    CONST REPORT_STATUS = [
        1 => 'MENUNGGU',
        2 => 'DITERIMA',
        3 => 'DITANGANI',
        4 => 'DITOLAK',
        5 => 'SELESAI'
    ];


    protected $table = 'report_status';

    protected $primaryKey = 'report_status_id';

    protected $fillable = [
        'report_status_id', 'status', 'slug', 'created_at', 'updated_at'
    ];

    public static function getLabelReportStatus($status) {
        $string = strtoupper($status);
        switch ($status) {
            case 'Waiting':
                $result = sprintf('<a href="#" id="tooltip" ><span class="label label-default label-sm">%s</span></a>', $string);
                break;
            case 'Accepted':
                $result = sprintf('<a href="#" id="tooltip" ><span class="label label-primary label-sm">%s</span></a>', $string);
                break;
            case 'Process':
                $result = sprintf('<a href="#" id="tooltip" ><span class="label label-info label-sm">%s</span></a>', $string);
                break;
            case 'Rejected':
                $result = sprintf('<a href="#" id="tooltip" ><span class="label label-danger label-sm">%s</span></a>', $string);
                break;
            case 'Done':
                $result = sprintf('<a href="#" id="tooltip" ><span class="label label-success label-sm">%s</span></a>', $string);
                break;
            default:
                $result = $string;
        }

        return $result;
    }

    public static function getLabelReportStatusById($status) {

        switch ($status) {
            case static::MENUNGGU:
                $result = sprintf('<a href="#" id="tooltip" ><span class="label label-default label-sm">' . static::REPORT_STATUS[1] . '</span></a>');
                break;
            case static::DITERIMA:
                $result = sprintf('<a href="#" id="tooltip" ><span class="label label-primary label-sm">' . static::REPORT_STATUS[2] . '</span></a>');
                break;
            case static::DITANGANI:
                $result = sprintf('<a href="#" id="tooltip" ><span class="label label-info label-sm">' . static::REPORT_STATUS[3] . '</span></a>');
                break;
            case static::DITOLAK:
                $result = sprintf('<a href="#" id="tooltip" ><span class="label label-danger label-sm">' . static::REPORT_STATUS[4] . '</span></a>');
                break;
            case static::SELESAI:
                $result = sprintf('<a href="#" id="tooltip" ><span class="label label-success label-sm">' . static::REPORT_STATUS[5] . '</span></a>');
                break;
            default:
                $result = $status;
        }

        return $result;
    }

}
