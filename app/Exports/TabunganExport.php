<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use App\Models\Tabungan;
use Maatwebsite\Excel\Concerns\Exportable;

class TabunganExport implements FromView
{
    use Exportable;
    private $id;

    public function __construct(int $id)
    {
        $this->id = $id;
    }
    
    /**
     * @return \Illuminate\Support\Collection
     */
    // public function collection()
    // {
        // return Tabungan::where('user_id', $this->id)->get();
    // }

    public function view(): View
    {
        return view('tabungan', [
            'tabungan' => Tabungan::where('user_id', $this->id)->get()
        ]);
    }
        
}
