<?php
/**
 * Created By Dedi Fardiyanto
 * Copyright (c) 2020, Inc - All Rights Reserved
 * @Filename NewsController.php
 * @LastModified 16/04/2020, 23:16
 */

namespace App\Http\Controllers\Backend\PalembangKito\News;

use App\Http\Requests\PalembangKito\News\newsRequest;
use App\Services\PalembangKito\News\NewsServiceContract;
use App\Traits\redirectTo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * Class NewsController
 * @package App\Http\Controllers\Backend\PalembangKito\News
 */
class NewsController extends Controller
{
    use redirectTo;

    /**
     * @var NewsServiceContract
     */
    protected $service;

    /**
     * @var string
     */
    protected $titlePage = 'News';
    /**
     * NewsController constructor.
     */
    public function __construct(NewsServiceContract $newsServiceContract)
    {
        $this->service = $newsServiceContract;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['titlePage'] = $this->titlePage;

        return view('backend.palembang_kito.news.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['titlePage'] = $this->titlePage;

        return view('backend.palembang_kito.news.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(newsRequest $request)
    {
        //dd($request->all());
        #Save Ads Data
        if(is_object($this->service->store($request))){

            #Bump....
            return $this->redirectSuccessCreate(route('news.index'), $request->title);

        } else {

            #Bump....
            return $this->redirectFailed(route('news.index'), 'Failed To Save The '. $this->titlePage);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['titlePage'] = $this->titlePage;
        $data['dataDb']     = $this->service->getById($id);
        //dd($data['dataDb']->newsHeadline[0]);

        return view('backend.palembang_kito.news.update', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(newsRequest $request, $id)
    {
        //dd($request->all());
        #Update Product Data
        if (is_object($this->service->update($id, $request))) {

            #Bump....
            return $this->redirectSuccessUpdate(route('news.index'), $request->title);

        } else {

            #Bump....
            return $this->redirectFailed(route('news.index'), 'Failed To Update The '. $this->titlePage);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        #Get services for delete
        $this->service->destroy($id);

        #Bump....
        return $this->redirectSuccessDelete(route('news.index'), $this->titlePage);
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
}
