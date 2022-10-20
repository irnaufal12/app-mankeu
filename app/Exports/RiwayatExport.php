<?php

namespace App\Exports;

use App\Models\RiwayatTransaksi;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use App\Models\Tabungan;
use Maatwebsite\Excel\Concerns\Exportable;

class RiwayatExport implements FromView
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
        return view('riwayat', [
            'riwayat' => RiwayatTransaksi::where('user_id', $this->id)->get()
        ]);
    }
}
