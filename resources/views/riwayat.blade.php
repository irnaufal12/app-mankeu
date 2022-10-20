@extends('dashboard')
@section('content_2')
<table class="table table-hover table-inverse table-responsive">
                <thead class="thead-inverse">
                    <h1>Riwayat Transaksi</h1>
                    <tr>
                        <th>Tanggal Transaksi</th>
                        <th>Jenis Transaksi</th>
                        <th>Jumlah Masuk</th>
                        <th>Jumlah Keluar</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($riwayat as $item)
                        <tr>
                                <td scope="row">{{$item->tgl_transaksi}}</td>
                                <td>{{$item->jenis_transaksi}}</td>
                                <td>{{$item->jumlah_masuk}}</td>
                                <td>{{$item->jumlah_keluar}}</td>
                            </tr>
                        @endforeach
                        {{-- <tr>
                                <td scope="row">check</td>
                                <td>check</td>
                                <td>check</td>
                        </tr> --}}
                    </tbody>
            </table>
@endsection