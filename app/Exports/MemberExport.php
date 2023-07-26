<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use App\Models\Auth\User;

class MemberExport implements FromView
{
	private $data;

    public function __construct($data, $column)
    {
        $this->data   = $data;
        $this->column = $column;
    }

    public function view(): View
    {
        return view('backend.member.excel.export_excel', [
            'data'   => $this->data,
            'column' => $this->column
        ]);
    }
}
