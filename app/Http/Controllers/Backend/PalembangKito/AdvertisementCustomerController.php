<?php


namespace App\Http\Controllers\Backend\PalembangKito;


use App\Http\Controllers\Controller;
use App\Models\PalembangKito\Category;
use App\Services\PalembangKito\AdvertisementCustomer\AdvertisementCustomerServiceContract;
use App\Traits\redirectTo;
use Illuminate\Http\Request;

class AdvertisementCustomerController extends Controller
{
    use redirectTo;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $service;
    public $categories;

    public function __construct(
        AdvertisementCustomerServiceContract $advertisementCustomerServiceContract,
        Category $category
    )
    {
        $this->service = $advertisementCustomerServiceContract;
        $this->categories = $category;
    }

    public function index()
    {
        return view('backend.piket.ads_customer.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dataDb = $this->categories->getCategory();

        return view('backend.piket.ads.create', compact('dataDb'));
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
    public function store(advertiseRequest $request)
    {
        #Save Product Data
//        dd($request->all());
        if(is_object($this->service->store($request))){

            #Bump....
            return $this->redirectSuccessCreate(route('advertisement.index'), __('advertisement.title'));

        } else {

            #Bump....
            return $this->redirectFailed(route('advertisement.index'), 'Failed To Save The Ads');
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
    public function show($id, ProductServiceContract $productServiceContract)
    {
        #Bump..
        return view('backend.fulfillments.detail', ['product' => $productServiceContract->get($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int                   $id
     * @param ProductServiceContract $productServiceContract
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id, ProductServiceContract $productServiceContract)
    {
        return view('backend.fulfillments.update', ['product' => $productServiceContract->get($id)]);
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
    public function update(productRequest $request, $id, ProductServiceContract $productServiceContract)
    {
        #Save Product Data
        if (is_object($productServiceContract->update($id, $request))) {

            #Bump....
            return $this->redirectSuccessUpdate(route('fulfillments.index'), __('fulfillments.title'));

        } else {

            #Bump....
            return $this->redirectFailed(route('fulfillments.index'), 'Failed To Save The Ads');
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
    public function destroy($id, ProductServiceContract $productServiceContract)
    {
        #Get services for bulk delete
        $productServiceContract->destroy([$id]);

        #Bump....
        return $this->redirectSuccessDelete(route('fulfillments.index'), 'Product');
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
    public function bulkDestroy(Request $request, ProductServiceContract $productServiceContract)
    {
        #Get services for bulk delete
        $productServiceContract->destroy($request->id);

        #Bump....
        return $this->redirectSuccessDelete(route('fulfillments.index'), 'Product');
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
        return $imageServiceContract->store($request, 'products/', route('fulfillments.upload.image.destroy'));
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
