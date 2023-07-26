<?php
/**
 * Created By Dedi Fardiyanto
 * Copyright (c) 2020, Inc - All Rights Reserved
 * @Filename Advertisement.php
 * @LastModified 21/03/2020, 17:43
 */

namespace App\Models\Damkar;


use Illuminate\Database\Eloquent\Model;

/**
 * Class Advertisement
 * @package App\Models\PalembangKito
 */
class Picket extends Model
{

    /**
     * @var string
     */
    public $table = 'schedule_picket';

    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @var array
     */
    protected $fillable = [
      'id', 'id_user', 'name_user', 'group_picket', 'id_group_picket', 'desc_picket', 'date_picket'
    ];

    /**
     * @param $request
     * @return mixed
     */
    public function insertToDb($request) {

        $insert = $this->insert($request);

        return $insert;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function destroyDb($id) {
        return $this->find($id)->delete();
    }

    /**
     * @param $dataDb
     * @param $request
     * @return mixed
     */
    public function updateToDb($dataDb, $request) {

        #delete pict old on s3 if have file pict new
        $request->file == null ? '' : $this->deleteFiles($request->img_url_old);

        #create folder at s3
        $this->folderName = 'advertisement';

        #update to DB
        $dataUpdate = [
            'category_id' => $request->category_id,
            'title' => $request->title,
            'desc' => $request->desc,
            'start_date' => $request->startDate,
            'end_date' => $request->endDate,
            'is_active' => $request->paid_id == 1 ? 1 : 0, # active
            'is_pending' => $request->paid_id == 1 ? 0 : 1,
            'img_url' => $request->file !== null ? $this->saveFiles($request->file[0]) : $request->img_url_old,
        ];

        #find category_sub_id
        $update = $this->find($dataDb->advertisement_id);

        #then update it
        $update->update($dataUpdate);

        return $update;
    }

}
