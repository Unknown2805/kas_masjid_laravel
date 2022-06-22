@extends('layouts.master')


@section('main')

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ url('/events/tambah') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">Judul</label>
                        <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Uraian" name="judul">
                      </div>
                      <div class="mb-3">
                        <label for="formGroupExampleInput2" class="form-label">Konten</label>
                        <textarea name="konten" id="" class= "form-control" cols="30" rows="5"></textarea>
                      </div>
                      <div class="mb-3">
                        <label for="formGroupExampleInput2" class="form-label">Gambar</label>
                        <input type="file" class="form-control" id="formGroupExampleInput2" placeholder="tanggal" name="gambar">
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
    <h1>Event</h1>
    <div class="card card-info ">

        <div class="card-body">
            <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Tambah Data
            </button>
            <table class="table table-striped" id="table1">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Image</th>
                        <th>Judul</th>
                        <th>Konten</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $d)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td><img src="{{ asset('/storage/event/' . $d->gambar) }}" alt="" width="170" height="170"></td>
                            <td>{{ $d->judul }}</td>
                            <td>{{ $d->konten }}</td>
                            <td>
                                <a class="btn shadow btn-outline-success btn-sm" data-bs-toggle="modal" data-bs-target="#editEvents{{ $d->id }}">Edit</i></a>
                                <a class="btn shadow btn-outline-danger btn-sm" href={{ url('/events/' . $d->id) }}>delete</i></a>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
    @include('events/formEditEvent')
</section>
    
@endsection