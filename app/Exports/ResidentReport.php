<?php

namespace App\Exports;

use App\Resident;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ResidentReport implements FromView
{
    public function view(): View
    {
        return view('excel.residents', [
            'nomor' => 1,
            'residents' => Resident::with('patriarches')->get()
        ]);
    }
}
