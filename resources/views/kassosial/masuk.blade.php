@extends('layouts.master')
@section('main')

{{-- modal add --}}

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action={{url('kas-sosial/pemasukan/tambah')}} method="POST" enctype="multipart/form-data">
            @csrf
        <div class="modal-body">
            <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label">Uraian</label>
                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Uraian" name="uraian">
              </div>
              <div class="mb-3">
                <label for="formGroupExampleInput2" class="form-label">Pemasukan</label>
                <input type="text" class="form-control" id="input" placeholder="Pemasukan" name="masuk">
              </div>
              <div class="mb-3">
                <label for="formGroupExampleInput2" class="form-label">Tanggal</label>
                <input type="date" class="form-control" id="formGroupExampleInput2" placeholder="Tanggal" name="tanggal">
              </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
    </form>
      </div>
    </div>
  </div>

  @foreach ($data as $d)
  <div class="modal fade" id="delete{{ $d->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
              {{-- <div class="modal-header">
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div> --}}
              <form action={{ url('/kas-sosial/delete/' . $d->id) }} method="POST" enctype="multipart/form-data">
                  @csrf
                  @method('DELETE')
                  <div class="modal-body">
                      <center class="mt-3">
                          <h5>
                              apakah anda yakin ingin menghapus data ini?
                          </h5>
                      </center>
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                      <button type="submit" class="btn btn-danger">Hapus!</button>
                  </div>
              </form>
          </div>
      </div>
  </div>
  @endforeach

<section class="section">
    <h1>Pemasukan</h1>
    <div class="card card-info ">
       
        <div class="card-body">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Tambah Data
              </button>            <table class="table table-striped" id="table1">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Uraian</th>
                        <th>Pemasukan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $d)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$d->tanggal}}</td>
                        <td>{{$d->uraian}}</td>
                        <td>{{$d->masuk}}</td>
                        <td>
                            <a class="btn shadow btn-outline-success btn-sm" data-bs-toggle="modal" data-bs-target="#editMasuk{{ $d->id}}">Edit</i></a>
                            <a class="btn shadow btn-outline-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delete{{ $d->id }}">delete</i></a>
                          </td>
                    </tr>
                    @endforeach
                    
                </tbody>
            </table>
        </div>
    </div>
    @include('kassosial/formEditMasuk')
</section>

<script type="text/javascript">
	var masuk = document.getElementById('input');
	masuk.addEventListener('keyup', function (e) {
		// tambahkan 'Rp.' pada saat form di ketik
		// gunakan fungsi formatmasuk() untuk mengubah angka yang di ketik menjadi format angka
		masuk.value = formatmasuk(this.value, 'Rp ');
	});

	/* Fungsi formatmasuk */
	function formatmasuk(angka, prefix) {
		var number_string = angka.replace(/[^,\d]/g, '').toString(),
			split = number_string.split(','),
			sisa = split[0].length % 3,
			masuk = split[0].substr(0, sisa),
			ribuan = split[0].substr(sisa).match(/\d{3}/gi);

		// tambahkan titik jika yang di input sudah menjadi angka ribuan
		if (ribuan) {
			separator = sisa ? '.' : '';
			masuk += separator + ribuan.join('.');
		}

		masuk = split[1] != undefined ? masuk + ',' + split[1] : masuk;
		return prefix == undefined ? masuk : (masuk ? 'Rp ' + masuk : '');
	}
</script>
@endsection
