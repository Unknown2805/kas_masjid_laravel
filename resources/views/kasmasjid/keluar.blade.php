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
        <form action={{url('kas-masjid/pengeluaran/tambah')}} method="POST" enctype="multipart/form-data">
            @csrf
        <div class="modal-body">
            <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label">Uraian</label>
                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Uraian" name="uraian">
              </div>
              <div class="mb-3">
                <label for="formGroupExampleInput2" class="form-label">Pengeluaran</label>
                <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Pengeluaran" name="keluar">
              </div>
              <div class="mb-3">
                <label for="formGroupExampleInput2" class="form-label">Tanggal</label>
                <input type="date" class="form-control" id="formGroupExampleInput2" placeholder="tanggal" name="tanggal">
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
                        <td>{{$loop->iteration}}</td>
                        <td>{{$d->tanggal}}</td>
                        <td>{{$d->uraian}}</td>
                        <td>{{$d->keluar}}</td>
                        <td>
                            <a class="btn shadow btn-outline-success btn-sm" data-bs-toggle="modal" data-bs-target="#editKeluar{{ $d->id}}">Edit</i></a>
                            <a class="btn shadow btn-outline-danger btn-sm" href={{url('/kas-masjid/delete/'. $d->id)}}>delete</i></a>
                        </td>
                    </tr>
                    @endforeach
                    
                </tbody>
            </table>
        </div>
    </div>
    @include('kasmasjid/formEditKeluar')
</section>

@endsection
