@extends ('dashboard')
@section ('content_1')
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
@endSection