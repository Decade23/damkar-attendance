<?php

namespace App\Http\Controllers\Backend\PalembangKito\Categories;

use App\Http\Requests\PalembangKito\Category\subRequest;
use App\Models\PalembangKito\Category;
use App\Services\PalembangKito\Category\Sub\CategorySubServiceContract;
use App\Traits\redirectTo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * Class CategorySubController
 * @package App\Http\Controllers\Backend\PalembangKito\Categories
 */
class CategorySubController extends Controller
{
    use redirectTo;

    /**
     * @var CategorySubServiceContract
     */
    private $service;

    /**
     * @var Category
     */
    private $categories;

    /**
     * CategorySubController constructor.
     */
    public function __construct(
        CategorySubServiceContract $categorySubServiceContract,
        Category $category
    )
    {
        $this->service = $categorySubServiceContract;
        $this->categories = $category;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index() {
        return view('backend.palembang_kito.categories.sub.index');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create() {
        $dataDb = $this->categories->whereNotIn('category_id', ['12'])->get();

        return view('backend.palembang_kito.categories.sub.create', compact('dataDb'));
    }

    /**
     * @param subRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(subRequest $request) {
        #Save Category Sub Data
        if(is_object($this->service->store($request))){

            #Bump....
            return $this->redirectSuccessCreate(route('category_sub.index'), __('category_sub.name'));

        } else {

            #Bump....
            return $this->redirectFailed(route('category_sub.index'), 'Failed To Save The Category Sub');
        }
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id) {

        $dataDb['dataDb'] = $this->service->get($id);
        $dataDb['category'] = $this->categories->getCategory();

        return view('backend.palembang_kito.categories.sub.update', $dataDb);
    }

    /**
     * @param $id
     * @param subRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update($id, subRequest $request)
    {
        #Update Product Data
        if (is_object($this->service->update($id, $request))) {

            #Bump....
            return $this->redirectSuccessUpdate(route('category_sub.index'), __('category_sub.name'));

        } else {

            #Bump....
            return $this->redirectFailed(route('category_sub.index'), 'Failed To Update The Category Sub');
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

    public function ajax(Request $request)
    {
        if ($request->ajax() === true) {
            # Return The JSON datatables Data
            return $this->service->ajax($request);
        }

        abort('404', 'uups');
    }


}
