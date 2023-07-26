<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use App\Models\StocksDiary;

class StocksDiaryExport implements FromView
{
	private $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function view(): View
    {
        return view('backend.stocks_diary.export_excel', [
            'data' => $this->data
        ]);
    }
}
