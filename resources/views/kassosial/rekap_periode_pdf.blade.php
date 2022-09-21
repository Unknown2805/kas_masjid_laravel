<!DOCTYPE html>
<html>

<head>
    <title>Data Rekap Barang</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <style type="text/css">
        table tr td,
        table tr th {
            font-size: 9pt;
        }
    </style>

    {{-- @foreach ($profile as $p)
        <div class="text-center mb-3 mt-3">

            <h5>{{ $p->gudang }}</h5>
            <p style="font-size:12px">{{ $p->alamat }}, {{ $p->telepon }}</p>
            <br>
            <p>{{ \Carbon\Carbon::parse($tgl1)->format('d/m/Y') }} - {{ \Carbon\Carbon::parse($tgl2)->format('d/m/Y') }}
            </p>
            <hr>

        </div>
    @endforeach --}}

    <center>
        @foreach ($data2 as $e)
            <h5>{{ $e->masjid }}</h4>
        @endforeach
        <p>{{ \Carbon\Carbon::parse($tgl1)->format('d/m/Y') }} - {{ \Carbon\Carbon::parse($tgl2)->format('d/m/Y') }}
    </center>
    <hr>

    <table class='table table-bordered'>
        <thead>
            <tr>

                <th>Total Pemasukan</th>
                <th>Total Pengeluaran</th>
                <th>Total Saldo</th>
            </tr>
        </thead>
        <tbody>

            @php
                $i = 1;
                $tot_rek_s = $data[0]->sum('masuk') - $data[0]->sum('keluar');
                
            @endphp
            <tr>


                <td>Rp. @money((float) $data[0]->sum('masuk'))</td>
                <td>Rp. @money((float) $data[0]->sum('keluar'))</td>
                @if ($tot_rek_s == 0)
                    <td>Saldo: kosong
                    <td>
                    @elseif ($tot_rek_s <= -1)
                    <td>Kurang: Rp.@money((float) "$tot_rek_s")</td>
                @else
                    <td>Saldo: Rp.@money((float) "$tot_rek_s")</td>
                @endif



            </tr>

        </tbody>
    </table>

    <table class='table table-bordered'>
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
                @php $i=1 @endphp
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $d->tanggal }}</td>
                    <td>{{ $d->uraian }}</td>
                    <td>Rp. @money((float) "$d->masuk ? $d->masuk : 0") </td>
                    <td>Rp. @money((float) "$d->keluar ? $d->keluar : 0")</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>