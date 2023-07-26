<?php

namespace App\Http\Controllers\Backend\PalembangKito;

use App\Services\PalembangKito\Info\InfoServiceContract;
use App\Traits\redirectTo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InfoController extends Controller
{
    use redirectTo;

    protected $service, $titlePage;

    /**
     * InfoController constructor.
     * @param $service
     * @param string $titlePage
     */
    public function __construct(InfoServiceContract $infoServiceContract)
    {
        $this->service = $infoServiceContract;
        $this->titlePage = 'Info';
    }

    public function index() {
        $data['titlePage'] = $this->titlePage;
        return view('backend.palembang_kito.info.index', $data);
    }

    public function create() {
        $data['titlePage'] = $this->titlePage;
        return view('backend.palembang_kito.info.create', $data);
    }

    public function store(Request $request)
    {
        #dd($this->service->storeViaApi($request));
        if ($this->service->storeViaApi($request) === true) {
            #Bump....
            return $this->redirectSuccessUpdate(route('info.index'), $request->title);
        } else {
            #Bump....
            return $this->redirectFailed(route('info.index'), 'Failed To Insert The '. $this->titlePage . ' Check Your Forms!');
        }
    }

    public function edit(int $id)
    {
        $data['titlePage'] = $this->titlePage;
        $data['dataDb'] = $this->service->getById($id);

        return view('backend.palembang_kito.info.update', $data);
    }

    public function datatable(Request $request)
    {
        if ($request->ajax())
        {
            return $this->service->datatable($request);
        }

        abort('404', 'Uups');
    }
}
