<!DOCTYPE html>
<html>
<head>
	<title>Laporan Rekapan Kas Sosial</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
	<center>
		<h5>Rekap Kas Sosial </h4>
		<h6>{{ \Carbon\Carbon::now()->format('d-m-Y') }}</h6>
	</center>
 
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
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$d->tanggal}}</td>
                <td>{{$d->uraian}}</td>
                <td>{{$d->masuk ? $d->masuk : 0}}</td>
                <td>{{$d->keluar ? $d->keluar : 0}}</td>
               
            </tr>
            @endforeach
		</tbody>
	</table>
 
</body>
</html>