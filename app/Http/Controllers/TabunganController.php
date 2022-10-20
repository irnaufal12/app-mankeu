<?php

namespace App\Http\Controllers;

use App\Models\RiwayatTransaksi;
use App\Models\Tabungan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class TabunganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $id = Auth::guard('user')->user()->id;
        $data = Tabungan::where('user_id', '=', $id)->get();
        $riwayat = RiwayatTransaksi::where('user_id', '=', $id)->get();

        return view('dashboard')->with('data', $data)->with('riwayat', $riwayat);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $id = Auth::guard('user')->user()->id;

        $data_awal = Tabungan::where('user_id', '=', $id)->first();

        // return dd($data_awal);

        if($request->jenis_transaksi == 1) {
            if($data_awal->saldo >= $request->jumlah) {
                Tabungan::find($data_awal->id)->update([
                    'saldo' => ($data_awal->saldo - $request->jumlah),
                    'difference' => ($data_awal->difference - $request->jumlah)
                ]);

                RiwayatTransaksi::create([
                    'user_id' => $id,
                    'jenis_transaksi' => 'Tarik',
                    'jumlah_keluar' => $request->jumlah,
                    'tgl_transaksi' => Carbon::now()
                ]);

                
                return redirect()->route('home')->with('success', 'Transaksi Berhasil');
            }

            return redirect()->route('home')->with('fail', 'Saldo Tidak Cukup');
        }

        
        Tabungan::find($data_awal->id)->update([
            'saldo' => ($data_awal->saldo + $request->jumlah),
            'difference' => ($data_awal->difference + $request->jumlah)
        ]);
        
        RiwayatTransaksi::create([
            'user_id' => $id,
            'jenis_transaksi' => 'Setor',
            'jumlah_masuk' => $request->jumlah,
            'tgl_transaksi' => Carbon::now()
        ]);
        return redirect()->route('home')->with('success', 'Transaksi Berhasil');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
