@foreach ($data as $d)

<div class="modal fade" id="editMasuk{{ $d->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Pemasukan Kas Sosial</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action={{url('kas-sosial-pemasukan/edit/' . $d->id)}} method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
        <div class="modal-body">
            <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label">Uraian</label>
                <input type="text" class="form-control" value="{{ $d->uraian }}" id="formGroupExampleInput" placeholder="Example input placeholder" name="uraian">
              </div>
              <div class="mb-3">
                <label for="formGroupExampleInput2" class="form-label">Pemasukan</label>
                <input type="text"  class="form-control" value="{{$d->masuk}}"  id="editis" placeholder="Another input placeholder" name="masuk" autocomplete="off" onkeyup="formatbaru(event)">
              </div>
              <div class="mb-3">
                <label for="formGroupExampleInput2" class="form-label">Tanggal</label>
                <input type="date" class="form-control" value="{{ $d->tanggal }}" id="formGroupExampleInput2" placeholder="Another input placeholder" name="tanggal">
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

  
    
@endforeach
