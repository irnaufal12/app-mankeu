<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <title>App Manajemen Keuangan</title>
</head>
<body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <div class="container">
                <a class="navbar-brand" href="#">APP BRAND</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
              
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                        </li>
                    </ul>
                    <a class="btn btn-warning" href="{{ route('logout-post') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Keluar
                    </a>
                    <form id="logout-form" action="{{ route('logout-post') }}" method="POST" class="d-none">
                               @csrf
                    </form>
                </div>
            </div>
        </nav>
        
        <div class="container" style="margin-top:20px">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addTransaksi">
                <icon class="bi bi-plus-circle-fill">
                </icon>
                <span>Transaksi Baru</span>
            </button>
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addTransaksi">
                <i class="bi bi-file-earmark-spreadsheet-fill"></i>
                <span>
                    Export Tabungan
                </span> 
            </button>
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addTransaksi">
                <i class="bi bi-file-earmark-spreadsheet-fill"></i>
                Export Riwayat
            </button> 
            <table class="table table-hover table-inverse table-responsive" style="margin-top:20px">
                <thead class="thead-inverse">
                    <h1 style="margin-top:20px">Tabungan</h1>
                    <tr>
                        <th>SALDO</th>
                        <th>HUTANG</th>
                        <th>DIFFERENCE</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr>
                                <td scope="row">{{$item->saldo}}</td>
                                <td>{{$item->hutang}}</td>
                                <td>{{$item->difference}}</td>
                            </tr>
                        @endforeach
                        {{-- <tr>
                            <td scope="row">check</td>
                            <td>check</td>
                            <td>check</td>
                        </tr> --}}
                    </tbody>
            </table>
        </div>
        <div class="container" style="margin-top:20px">
            
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
        </div>

        <div class="modal fade" id="addTransaksi" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('add-transaksi')}}" method="POST">
                            @method('PUT')
                            @csrf
                            <label for="jenis_transaksi"><h5>Jenis Transaksi</h5></label></br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="jenis_transaksi" id="jenis_transaksi" value="1">
                                <label class="form-check-label" for="jenis_transaksi">Penarikan</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="jenis_transaksi" id="jenis_transaski" value="2">
                                <label class="form-check-label" for="jenis_transaski">Penyetoran</label>
                            </div>
                            <label for="jumlah" style="margin-top:20px"><h5>Jumlah Transaksi [MIN: 50K | MAX: 3000K]</h5></label></br>
                            <input type="number" name="jumlah" id="jumlah" placeholder="Jumlah Transaksi" required min="50000" max="3000000" style="width:100%">
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>
</html>


