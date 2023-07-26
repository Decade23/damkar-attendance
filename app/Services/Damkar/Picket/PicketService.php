<?php

namespace App\Services\Damkar\Picket;

use App\Models\Auth\User;
use App\Models\Damkar\Picket;
use App\Traits\fileUploadTrait;
use App\Traits\Medsos\MedsosTrait;
use App\Traits\MsidnTrait;
use Carbon\Carbon;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;


/**
 * Class AdvertisementService
 * @package App\Services\PalembangKito\Advertisement
 */
class PicketService implements PicketServiceContract
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

    /**
     * @param int $id
     * @return mixed
     */
    public function get(int $id)
    {
        // TODO: Implement get() method.
        $dataDb = Piket::where('picket_id', $id)->with(['categories', 'price', 'customer', 'payment', 'medsos'])->first();

        return $dataDb;
    }

    /**
     * @param $request
     * @return AdvertisementPayment|int|mixed
     * @throws \Exception
     */
    public function store($request)
    {
        // TODO: Implement store() method.
        $userDb = Sentinel::getUser();

        DB::beginTransaction();
        try {
            // mapping into data for table schedule picket
            $payloadIntoDb = array();

            // status_picket conversion
            for ($i = 0; $i < count($request->status_picket); $i++) {
                $payloadIntoDb['status_picket'][$i] = array(
                    'id_group_picket' => explode(',', $request->status_picket[$i])[0],
                    'group_picket' => explode(',', $request->status_picket[$i])[1]
                );
            }

            // member conversion
            for ($i = 0; $i < count($request->member); $i++) {
                $payloadIntoDb['member'][$i] = array(
                    'id_user' => explode(',', $request->member[$i])[0],
                    'name_user' => explode(',', $request->member[$i])[1]
                );
            }

            // desc picket conversion
            $payloadIntoDb['desc_picket'] = $request->desc_picket;


            $payloadIntoDb['date_picket'] = $request->date_picket;
            $payloadIntoDb['created_by'] = $userDb->name;

            #picket payload
            $picketPayload = array();
            for ($i=0; $i < count($payloadIntoDb['member']); $i++) {
                $picketPayload[] = array_merge(
                    $payloadIntoDb['member'][$i],
                    $payloadIntoDb['status_picket'][$i],
                    [
                        'desc_picket' => $payloadIntoDb['desc_picket'][$i],
                        'date_picket' => $payloadIntoDb['date_picket'],
                        'created_by' => $payloadIntoDb['created_by'],
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now()
                    ]
                );
            }

            # save to table schedule picket
            $schedulerPickerStore = new Picket();
            $save = $schedulerPickerStore->insertToDb($picketPayload);


            DB::commit();

            return $save;
        } catch (\Exception $exception) {
            DB::rollBack();

            dd($exception->getMessage() . ' ' . $exception->getLine() . ' ' . $exception->getCode());
            return $exception->getCode();
        }
    }

    /**
     * @param int $id
     * @param $request
     * @return AdvertisementPayment|int|mixed
     * @throws \Exception
     */
    public function update(int $id, $request)
    {
        // TODO: Implement update() method.
        DB::beginTransaction();
        try {
            # retrieve data from ID
            $dataDb = $this->get($id);

            # save to table ads customer
            $advertiseCustomerToDb = new AdvertisementCustomer();
            $advertiseCustomerToDb->updateToDb($dataDb, $request);

            # save to table ads price
            $advertisePriceToDb = new AdvertisementPrice();
            $advertisePriceToDb->updateToDb($dataDb, $request);

            # save to table picket
            $saveToDb = new Piket();

            $saveToDb->updateToDb($dataDb, $request);

            #save to table picket paid
            $advertisePaidToDb = new AdvertisementPayment();
            $advertisePaidToDb->updateToDb($dataDb, $request);

            # update medsos
            #$this->updateAdsMedsos($dataDb, $request);
            $this->updateAdsMedsosV2($dataDb, $request);
//            dd($request->all());

            DB::commit();

            return $advertisePaidToDb;
        } catch (\Exception $exception) {
            DB::rollBack();
            //dd($exception);
            dd($exception->getMessage() . ' ' . $exception->getLine() . ' ' . $exception->getCode());
            return $exception->getCode();
        }
    }

    /**
     * @param $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function datatable($request)
    {
        // TODO: Implement datatable() method.
        $dataDb = $this->query($request);

        return DataTables::eloquent($dataDb)
            ->addColumn(
                'action',
                function ($dataDb) {
                    $btnShow = '<a href="' . route('picket.show', $dataDb->id) . '" id="tooltip" title="' . trans('global.show') . '"><span class="label label-primary label-sm"><i class="fa fa-arrows-alt"></i></span></a>';
                    $btnEdit = '<a href="' . route('picket.edit', [$dataDb->id]) . '" id="tooltip" title="' . trans('global.update') . '"><span class="label label-warning label-sm"><i class="fa fa-edit"></i></span></a>';
                    $btnDelete = '<a href="#" data-message="' . trans('auth.delete_confirmation', ['name' => $dataDb->title]) . '" data-href="' . route('picket.destroy', [$dataDb->id]) . '" id="tooltip" data-method="DELETE" data-title="' . trans('global.delete') . '" data-toggle="modal" data-target="#delete"><span class="label label-danger label-sm"><i class="fa fa-trash-o"></i></span></a>';
                    return $btnEdit;
                }
            )
            ->rawColumns(['action'])
            ->make(true);
    }

    /**
     * @param int $id
     * @return bool
     */
    public function destroy(int $id)
    {
        // TODO: Implement destroy() method.
        # get data advertise
        $dataDb = $this->get($id);

        # assign id to field table
        $ID = array(
            'adsID' => $dataDb->id,
            'adsPriceID' => $dataDb->picket_price_id,
            'adsCustID' => $dataDb->picket_customer_id
        );

        # destroy table advertise
        $advertise = new Piket();
        $advertise->destroyDb($ID['adsID']);

        # destroy table advertise price

        $advertisePrice = new AdvertisementPrice();
        $advertisePrice->destroyDb($ID['adsPriceID']);

        # destroy table customer
        $advertiseCustomer = new AdvertisementCustomer();
        $advertiseCustomer->destroyDb($ID['adsCustID']);

        return true;
    }

    /**
     * @param array $id
     * @return bool
     */
    public function destroyBulk(array $id)
    {
        // TODO: Implement destroyBulk() method.
        $d = $id;

        foreach ($d as $key) {
            # get data advertise

            $ID_ = (int)$key;

            $dataDb = $this->get($ID_);

            # assign id to field table
            $ID = array();
            $ID = [
                'adsID' => $dataDb->picket_id,
                'adsPriceID' => $dataDb->picket_price_id,
                'adsCustID' => $dataDb->picket_customer_id
            ];

            # destroy table advertise
            $advertise = new Piket();
            $advertise->destroyDb($ID['adsID']);

            # destroy table advertise price

            $advertisePrice = new AdvertisementPrice();
            $advertisePrice->destroyDb($ID['adsPriceID']);

            # destroy table customer
            $advertiseCustomer = new AdvertisementCustomer();
            $advertiseCustomer->destroyDb($ID['adsCustID']);
        }

        return true;
    }

    /**
     * @param $request
     * @return mixed
     */
    public function query($request)
    {
        // TODO: Implement query() method.
        $select = [
            'id', 'name_user', DB::raw("CONCAT(upper(id_group_picket), ' - ', upper(group_picket)) as group_picket"), 'id_group_picket', 'desc_picket', 'date_picket', 'created_at'
        ];

        $dataDb = $this->model->select($select);

        return $dataDb;
    }

    public function getMember()
    {
        $dataDb = User::whereHas('user_role.role', function ($role) {
            $role->where('slug', 'member');
        })
            ->get();
        return $dataDb;
    }

    public function checkDateSchedulePicket()
    {
        $dataDb = Picket::where('date_picket', date('Y-m-d'))->first();
        return $dataDb;
    }

}
