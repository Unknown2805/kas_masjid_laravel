@extends('layouts.master')


@section('main')




<section class="section">
    <div class="card">
        <div class="card-header">
            <h1>Rekap Kas Sosial</h1>   
        </div>
        <div class="card-body">
            <button type="button" class="btn btn-danger mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Export PDF
              </button>
            <table class="table table-striped" id="table1">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tanggal</th>
                        <th>Uraian</th>
                        <th>Pemasukan</th>
                        <th>Pengeluaran</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $d)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$d->tanggal}}</td>
                        <td>{{$d->uraian}}</td>
                        <td>{{$d->masuk}}</td>
                        <td>{{$d->keluar}}</td>
                       
                    </tr>
                    @endforeach
                    
                </tbody>
            </table>
        </div>
    </div>

</section>
@endsection