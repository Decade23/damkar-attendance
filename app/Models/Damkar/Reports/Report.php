<?php

namespace App\Models\PalembangKito\Reports;

use App\Models\Auth\User;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $table = 'report';

    protected $primaryKey = 'report_id';

    protected $fillable = [
        'report_id', 'report_category_name', 'user_id', 'img_url', 'desc', 'latitude', 'longitude', 'address',
        'created_by', 'created_at', 'updated_at', 'status'
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function report_log()
    {
        return $this->hasMany(ReportLog::class,'report_id', 'report_id')->orderByDesc('report_log.created_at');
    }

    public function updateToDb($id, $request) {

        #update status to DB
        $dataUpdate = [
            'status' => $request->report_status,
            #'desc' => $request->report_desc,
        ];

        #find report
        $update = $this->find($id);

        #then update it
        $update->update($dataUpdate);

        return $update;
    }

    public function curlSendNotif($request){

        $baseUri = config('api.dev');
        $endpoint = 'report/';
        $desc = '';
        switch ($request->status) {
            case 'Accept':
                $endpoint .= $request->report_id.'/accept';
                $desc = 'Report Accepted By';
                break;
            case 'Process':
                $endpoint .= $request->report_id.'/process';
                $desc = 'Report Processed By';
                break;
            case 'Reject':
                $endpoint .= $request->report_id.'/reject';
                $desc = 'Report Rejected By';
                break;
            case 'Done':
                $endpoint .= $request->report_id.'/done';
                $desc = 'Report Done By';
                break;
        }

        $requestBody = array(
            'desc' => $desc,
            'created_by' => Sentinel::getUser()->name
        );

        $payload = json_encode($requestBody);

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $baseUri.$endpoint,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => $requestBody,
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        dd($response);
    }

}
