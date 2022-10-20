<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">

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
            <a class="btn btn-primary"><i class="fa-solid fa-plus"></i>Transaksi Baru</a></br>  
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
                        {{-- @foreach ($data as $item)
                            <tr>
                                <td scope="row">check</td>
                                <td>check</td>
                                <td>check</td>
                            </tr>
                        @endforeach --}}
                        <tr>
                            <td scope="row">check</td>
                            <td>check</td>
                            <td>check</td>
                        </tr>
                    </tbody>
            </table>
        </div>
        <div class="container" style="margin-top:20px">
            <a class="btn btn-primary">
                <span>
                    Export Tabungan
                </span> 
            </a>
            <a class="btn btn-primary">Export Riwayat</a>
            <table class="table table-hover table-inverse table-responsive">
                <thead class="thead-inverse">
                    <h1>Riwayat Transaksi</h1>
                    <tr>
                        <th>Jenis Transaksi</th>
                        <th>Jumlah Masuk</th>
                        <th>Jumlah Keluar</th>
                    </tr>
                    </thead>
                    <tbody>
                        {{-- @foreach ($data as $item)
                            <tr>
                                <td scope="row">check</td>
                                <td>check</td>
                                <td>check</td>
                            </tr> --}}
                        {{-- @endforeach --}}
                        <tr>
                                <td scope="row">check</td>
                                <td>check</td>
                                <td>check</td>
                            </tr>
                    </tbody>
            </table>
        </div>
</body>
</html>


