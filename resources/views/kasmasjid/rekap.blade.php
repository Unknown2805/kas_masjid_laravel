@extends('layouts.master')


@section('main')
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h1>Rekap Kas Masjid</h1>
            </div>
            <div class="card-body">
                <a href="/rekap/masjid" class="btn btn-danger">CETAK PDF</a>
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
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $d->tanggal }}</td>
                                <td>{{ $d->uraian }}</td>
                                <td>{{ $d->masuk ? $d->masuk : 0 }}</td>
                                <td>{{ $d->keluar ? $d->keluar : 0 }}</td>

                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>

    </section>
@endsection
