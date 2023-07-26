<?php
/**
 * Created By Dedi Fardiyanto
 * Copyright (c) 2020, Inc - All Rights Reserved
 * @Filename CategorySubDetailController.php
 * @LastModified 28/03/2020, 13:55
 */

namespace App\Http\Controllers\Backend\PalembangKito\Categories;

use App\Http\Requests\PalembangKito\Category\subDetailRequest;
use App\Models\PalembangKito\Categories\CategorySub;
use App\Models\PalembangKito\Category;
use App\Services\PalembangKito\Category\SubDetail\CategorySubDetailServiceContract;
use App\Traits\redirectTo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * Class CategorySubDetailController
 * @package App\Http\Controllers\Backend\PalembangKito\Categories
 */
class CategorySubDetailController extends Controller
{
    use redirectTo;

    /**
     * @var CategorySubDetailServiceContract
     */
    private $service;

    /**
     * @var Category
     */
    private $categories;

    /**
     * @var CategorySub
     */
    private $categories_sub;


    /**
     * CategorySubController constructor.
     */
    public function __construct(
        CategorySubDetailServiceContract $categorySubDetailServiceContract,
        Category $category,
        CategorySub $categorySub
    )
    {
        $this->service = $categorySubDetailServiceContract;
        $this->categories = $category;
        $this->categories_sub = $categorySub;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index() {

        return view('backend.palembang_kito.categories.sub_detail.index');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create() {
        $dataDb['categoryDB'] = $this->categories->whereNotIn('category_id', ['12'])->get();
        $dataDb['categoriesSub'] = $this->categories_sub->whereNotIn('category_id', ['12'])->get();


        return view('backend.palembang_kito.categories.sub_detail.create', $dataDb);
    }

    /**
     * @param subDetailRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(subDetailRequest $request) {
        #Save Category Sub Data
        // dd($request->all());
        if(is_object($this->service->store($request))){

            #Bump....
            return $this->redirectSuccessCreate(route('category_sub_detail.index'), __('category_sub.name'));

        } else {

            #Bump....
            return $this->redirectFailed(route('category_sub_detail.index'), 'Failed To Save The Category Sub');
        }
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id) {

        $dataDb['dataDb'] = $this->service->get($id);
        $dataDb['categoryDB'] = $this->categories->whereNotIn('category_id', ['12'])->get();
        $dataDb['categorySubDB'] = $this->categories_sub->where('category_id', $dataDb['dataDb']->category_id)->get();
        $dataDb['medsos'] = $this->service->getMedsos($dataDb['dataDb']);
        //dd($dataDb['medsos']);
        return view('backend.palembang_kito.categories.sub_detail.update', $dataDb);
    }

    /**
     * @param $id
     * @param subDetailRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update($id, subDetailRequest $request)
    {
        #Update Product Data
        if (is_object($this->service->update($id, $request))) {

            #Bump....
            return $this->redirectSuccessUpdate(route('category_sub_detail.index'), $request->name);

        } else {

            #Bump....
            return $this->redirectFailed(route('category_sub_detail.index'), 'Failed To Update The Category Sub Detail');
        }
    }

    /**
     * @param Request $request
     * @return mixed
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
     * @param Request $request
     * @return mixed
     */
    public function select2(Request $request)
    {
        if ($request->ajax() === true) {
            # Return The JSON datatables Data
            return $this->service->select2($request);
        }

        abort('404', 'uups');
    }

    /**
     * @param $id
     * @return mixed
     */
    public function destroy($id){

        # delete it
        if($this->service->destroy($id)){

            #Bump....
            return $this->redirectSuccessRemove(route('category_sub_detail.index'), __('Success Delete It'));

        } else {

            #Bump....
            return $this->redirectFailed(route('category_sub_detail.index'), 'Failed To Delete The Category Sub Detail');
        }
    }

    /**
     * @param $id
     * @return mixed
     */
    public function destroyBulk($id){
        #boom
        return $this->service->destroyBulk($id);
    }
}
