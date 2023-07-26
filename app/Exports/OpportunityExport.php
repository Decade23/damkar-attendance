<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use App\Models\Auth\UserProduct;

class OpportunityExport implements FromView
{
	private $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function view(): View
    {
        return view('backend.opportunity.export', [
            'data' => $this->data
        ]);
    }
}
