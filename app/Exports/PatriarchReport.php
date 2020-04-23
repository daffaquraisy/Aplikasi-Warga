<?php

namespace App\Exports;

use App\Patriarch;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class PatriarchReport implements FromView
{
    public function view(): View
    {
        return view('excel.patriarches', [
            'nomor' => 1,
            'patriarches' => Patriarch::all()
        ]);
    }
}
