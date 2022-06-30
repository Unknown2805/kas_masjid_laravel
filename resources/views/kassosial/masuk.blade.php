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
                <input type="number" class="form-control" placeholder="Pemasukan" name="masuk" autocomplete="off">
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


@endsection
