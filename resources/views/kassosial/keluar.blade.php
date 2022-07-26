@extends('layouts.master')
@section('main')
    {{-- modal add --}}

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Pengeluaran Kas Sosial</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action={{ url('kas-sosial/pengeluaran/tambah') }} method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="formGroupExampleInput" class="form-label">Uraian</label>
                            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Uraian"
                                name="uraian">
                        </div>
                        <div class="mb-3">
                            <label for="formGroupExampleInput2" class="form-label">Pengeluaran</label>
                            <input type="text"  class="form-control"  placeholder="Another input placeholder"id="tambahos" name="keluar" autocomplete="off">
                        </div>
                        <div class="mb-3">
                            <label for="formGroupExampleInput2" class="form-label">Tanggal</label>
                            <input type="date" class="form-control" id="formGroupExampleInput2" placeholder="Tanggal"
                                name="tanggal">
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
        <div class="modal fade" id="delete{{ $d->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
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
        <h1>Pengeluaran</h1>
        <div class="card card-info ">

            <div class="card-body">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Tambah Data
                </button>
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Uraian</th>
                            <th>Pengeluaran</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $d)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $d->tanggal }}</td>
                                <td>{{ $d->uraian }}</td>
                                <td>Rp. @money((float)"$d->keluar")</td>
                                <td>
                                    <a class="btn shadow btn-outline-success btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#editKeluar{{ $d->id }}">Edit</i></a>
                                    <a class="btn shadow btn-outline-danger btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#delete{{ $d->id }}">delete</i></a>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
        @include('kassosial/formEditKeluar')
    </section>
    
    <script type="text/javascript">
        var editos = document.getElementById('editos');
        editos.addEventListener('keyup', function (e) {
          // tambahkan 'Rp.' pada saat form di ketik
          // gunakan fungsi formateditos() untuk mengubah angka yang di ketik menjadi format angka
          editos.value = formateditos(this.value, 'Rp ');
        });
      
        /* Fungsi formateditos */
        function formateditos(angka, prefix) {
          var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split = number_string.split(','),
            sisa = split[0].length % 3,
            editos = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);
      
          // tambahkan titik jika yang di input sudah menjadi angka ribuan
          if (ribuan) {
            separator = sisa ? '.' : '';
            editos += separator + ribuan.join('.');
          }
      
          editos = split[1] != undefined ? editos + ',' + split[1] : editos;
          return prefix == undefined ? editos : (editos ? 'Rp ' + editos : '');
        }
      </script>
    <script type="text/javascript">
        var tambahos = document.getElementById('tambahos');
        tambahos.addEventListener('keyup', function (e) {
            // tambahoskan 'Rp.' pada saat form di ketik
          // gunakan fungsi formattambahos() untuk mengubah angka yang di ketik menjadi format angka
          tambahos.value = formattambahos(this.value, 'Rp ');
        });
        
        /* Fungsi formattambahos */
        function formattambahos(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split = number_string.split(','),
            sisa = split[0].length % 3,
            tambahos = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);
            
            // tambahoskan titik jika yang di input sudah menjadi angka ribuan
            if (ribuan) {
                separator = sisa ? '.' : '';
                tambahos += separator + ribuan.join('.');
            }
            
            tambahos = split[1] != undefined ? tambahos + ',' + split[1] : tambahos;
            return prefix == undefined ? tambahos : (tambahos ? 'Rp ' + tambahos : '');
        }
        </script>
@endsection
