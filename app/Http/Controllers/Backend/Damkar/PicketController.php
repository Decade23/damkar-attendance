<?php
/**
 * Created By Dedi Fardiyanto
 * Copyright (c) 2020, Inc - All Rights Reserved
 * @Filename AdvertisementController.php
 * @LastModified 21/03/2020, 18:05
 */

namespace App\Http\Controllers\Backend\Damkar;

use App\Http\Controllers\Controller;
use App\Http\Requests\Damkar\PicketRequest;
use App\Services\Damkar\Picket\PicketServiceContract;
use App\Traits\redirectTo;
use Illuminate\Http\Request;

/**
 * Class AdvertisementController
 * @package App\Http\Controllers\Backend\PalembangKito
 */
class PicketController extends Controller
{
    use redirectTo;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $service;
    /**
     * @var Category
     */
    public $categories;

    /**
     * AdvertisementController constructor.
     * @param AdvertisementServiceContract $picketServiceContract
     * @param Category $category
     */
    public function __construct(
        PicketServiceContract $picketServiceContract
    )
    {
        $this->service = $picketServiceContract;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {

        return view('backend.picket.ads.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dataDb['members'] = $this->service->getMember();
        $dataDb['checkDateSchedulePicket'] = $this->service->checkDateSchedulePicket();

        return view('backend.picket.ads.create', $dataDb);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param productRequest         $request
     *
     * @param ProductServiceContract $productServiceContract
     *
     * @return \Illuminate\Http\Response
     */
    public function store(PicketRequest $request)
    {
        #Save Picket Data
        if( $this->service->store($request) ){

            #Bump....
            return $this->redirectSuccessCreate(route('picket.index'), __('picket submitted.'));

        } else {

            #Bump....
            return $this->redirectFailed(route('picket.index'), 'Failed To Save The Picket');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int                   $id
     * @param ProductServiceContract $productServiceContract
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        #Bump..
        $dataDb = $this->service->get($id);

        return view('backend.picket.ads.detail', compact('dataDb'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int                   $id
     * @param ProductServiceContract $productServiceContract
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dataDb['dataDb'] = $this->service->get($id);
        $dataDb['category'] = $this->categories->getCategory();
        $dataDb['medsos'] = $this->service->getMedsos($dataDb['dataDb']);
        return view('backend.picket.ads.update', $dataDb);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param productRequest         $request
     * @param  int                   $id
     *
     * @param ProductServiceContract $productServiceContract
     *
     * @return \Illuminate\Http\Response
     */
    public function update($id, advertiseRequest $request)
    {
        #Update Product Data
        if (is_object($this->service->update($id, $request))) {

            #Bump....
            return $this->redirectSuccessUpdate(route('picket.index'), __('picket.title'));

        } else {

            #Bump....
            return $this->redirectFailed(route('picket.index'), 'Failed To Update The Ads');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int                   $id
     * @param ProductServiceContract $productServiceContract
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        #Get services for bulk delete
        $this->service->destroy($id);

        #Bump....
        return $this->redirectSuccessDelete(route('picket.index'), 'Product');
    }

    /**
     * Datatable Class
     *
     * @param Request                $request
     *
     *
     * @param ProductServiceContract $productServiceContract
     *
     * @return \Illuminate\Http\JsonResponse|\Yajra\DataTables\DataTableAbstract
     */
    public function datatable(Request $request)
    {
        if ($request->ajax()) {
            # Return The JSON datatables Data
            return $this->service->datatable($request);
        }

        abort('404', 'uups');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request                $request
     * @param ProductServiceContract $productServiceContract
     *
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function destroyBulk(Request $request)
    {
        #Get services for bulk delete
        $this->service->destroyBulk($request->id);

        #Bump....
        return $this->redirectSuccessDelete(route('picket.index'), 'Advertisements');
    }

    /**
     * For Upload Product Image
     *
     * @param Request              $request
     * @param ImageServiceContract $imageServiceContract
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function uploadImage(Request $request, ImageServiceContract $imageServiceContract)
    {
        return $imageServiceContract->store($request, 'products/', route('picket.upload.image.destroy'));
    }

    /**
     * For Destroy Product Image
     *
     * @param Request              $request
     * @param ImageServiceContract $imageServiceContract
     *
     * @return string
     * @internal param $path
     * @internal param Request $request
     */
    public function destroyImage(Request $request, ImageServiceContract $imageServiceContract)
    {
        //Remote The Images In Tables
        Images::where(['type' => 'product', 'url' => $request->key])->delete();

        #Delete Image
        return $imageServiceContract->delete($request->key, 'product');
    }

    /**
     * Get Product Select2
     *
     * @param Request                $request
     * @param ProductServiceContract $productServiceContract
     *
     */
    public function select2(Request $request, ProductServiceContract $productServiceContract){

        if ($request->ajax() === true) {

            return $productServiceContract->select2($request);
        }

        return abort('404', 'uups');
    }


}
