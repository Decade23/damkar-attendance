<?php

namespace App\Http\Controllers\Backend\PalembangKito;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TncController extends Controller
{
    public function tnc() {
        return view('backend.tnc.index');
    }
}
