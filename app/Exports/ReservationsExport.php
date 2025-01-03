<?php

namespace App\Exports;

use App\Models\Reserve;
use Maatwebsite\Excel\Concerns\FromCollection;

class ReservationsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Reserve::all();
    }
}
