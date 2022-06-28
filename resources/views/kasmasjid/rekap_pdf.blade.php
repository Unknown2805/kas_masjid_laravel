<!DOCTYPE html>
<html>

<head>
    <title>Laporan Rekapan Kas Masjid</title>
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


    <center>
        @foreach ($data2 as $e)
            <h5>{{ $e->masjid }}</h4>
        @endforeach
        <h6>{{ \Carbon\Carbon::now()->format('d-m-Y') }}</h6>
    </center>

	<table class='table table-bordered'>
        <thead>
            <tr>

                <th>Total Pemasukan</th>
                <th>Total Pengeluaran</th>
            </tr>
        </thead>
        <tbody>

            @php $i=1 @endphp
            <tr>


                <td>Rp. @money((float)$data[0]->sum('masuk'))</td>
                <td>Rp. @money((float)$data[0]->sum('keluar'))</td>



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
                    <td>Rp. @money((float)"$d->masuk ? $d->masuk : 0") </td>
                    <td>Rp. @money((float)"$d->keluar ? $d->keluar : 0")</td>
                </tr>
            @endforeach
        </tbody>
    </table>


    



</body>

</html>
