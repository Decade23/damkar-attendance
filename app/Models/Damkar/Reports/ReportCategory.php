<?php

namespace App\Models\PalembangKito\Reports;

use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Illuminate\Database\Eloquent\Model;

class ReportCategory extends Model
{
    protected $table = 'report_category';

    protected $primaryKey = 'report_category_id';

    protected $fillable = [
        'report_category_id', 'name', 'slug', 'created_by', 'created_at', 'updated_at'
    ];

    public function report()
    {
        return $this->hasMany(Report::class,'report_category_name','name');
    }

    public function insertToDb($request) {
        # save to DB
        $insert = $this->create(
            [
                'name' => $request->name,
                'slug' => str_slug($request->name,'-'),
                'created_by' => Sentinel::getUser()->email,
            ]
        );

        $insert->save();
        return $insert;
    }

    public function updateToDb($id, $request) {
        #update to DB
        $dataUpdate = [
            'name' => $request->name,
            'slug' => str_slug($request->name,'-'),
        ];

        #find category_sub_id
        $update = $this->find($id);

        #then update it
        $update->update($dataUpdate);

        return $update;
    }
}
