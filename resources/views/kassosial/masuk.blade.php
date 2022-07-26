@extends('layouts.master')
@section('main')

{{-- modal add --}}

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Pemasukan Kas Sosial</h5>
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
                <input type="text" class="form-control" placeholder="Pemasukan" id="tambahis" name="masuk" autocomplete="off">
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
                        <td>Rp. @money((float)"$d->masuk")</td>
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
    var editis = document.getElementById('editis');
    editis.addEventListener('keyup', function (e) {
      // tambahkan 'Rp.' pada saat form di ketik
      // gunakan fungsi formateditis() untuk mengubah angka yang di ketik menjadi format angka
      editis.value = formateditis(this.value, 'Rp ');
    });
  
    /* Fungsi formateditis */
    function formateditis(angka, prefix) {
      var number_string = angka.replace(/[^,\d]/g, '').toString(),
        split = number_string.split(','),
        sisa = split[0].length % 3,
        editis = split[0].substr(0, sisa),
        ribuan = split[0].substr(sisa).match(/\d{3}/gi);
  
      // tambahkan titik jika yang di input sudah menjadi angka ribuan
      if (ribuan) {
        separator = sisa ? '.' : '';
        editis += separator + ribuan.join('.');
      }
  
      editis = split[1] != undefined ? editis + ',' + split[1] : editis;
      return prefix == undefined ? editis : (editis ? 'Rp ' + editis : '');
    }
  </script>
<script type="text/javascript">
    var tambahis = document.getElementById('tambahis');
    tambahis.addEventListener('keyup', function (e) {
        // tambahiskan 'Rp.' pada saat form di ketik
      // gunakan fungsi formattambahis() untuk mengubah angka yang di ketik menjadi format angka
      tambahis.value = formattambahis(this.value, 'Rp ');
    });
    
    /* Fungsi formattambahis */
    function formattambahis(angka, prefix) {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
        split = number_string.split(','),
        sisa = split[0].length % 3,
        tambahis = split[0].substr(0, sisa),
        ribuan = split[0].substr(sisa).match(/\d{3}/gi);
        
        // tambahiskan titik jika yang di input sudah menjadi angka ribuan
        if (ribuan) {
            separator = sisa ? '.' : '';
            tambahis += separator + ribuan.join('.');
        }
        
        tambahis = split[1] != undefined ? tambahis + ',' + split[1] : tambahis;
        return prefix == undefined ? tambahis : (tambahis ? 'Rp ' + tambahis : '');
    }
    </script>
@endsection
