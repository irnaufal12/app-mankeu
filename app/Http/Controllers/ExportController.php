<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Exports\TabunganExport;
use App\Exports\RiwayatExport;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    //
    public function exportTabungan()
    {
        $id = Auth::guard('user')->user()->id;
        // return dd($id);
        return Excel::download(new TabunganExport($id), 'Tabungan.xlsx');
    
    }

    public function exportRiwayat()
    {
        $id = Auth::guard('user')->user()->id;
        // return dd($id);
        return Excel::download(new RiwayatExport($id), 'Riwayat.xlsx');
    }
}
