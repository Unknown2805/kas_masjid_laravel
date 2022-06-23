<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Landing Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  </head>
  <body>
      
    <nav class="navbar navbar-expand-lg shadow fixed-top" style="background-color:  #2fac68">
        <div class="container">
          <a class="navbar-brand" href="#" style="color: white;">Kas Masjid</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item me-4">
                <a class="nav-link active" aria-current="page" href="#berita" style="color: white">Berita</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}" style="color: white; background-color : rgb(50, 50, 250); border-radius : 10px;">Login</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>

     {{-- chart 1 --}}

     {{-- tutup chart 1 --}}
      
      {{-- getwaves.io --}}
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="#2fac68" fill-opacity="1" d="M0,256L0,96L288,96L288,128L576,128L576,288L864,288L864,224L1152,224L1152,288L1440,288L1440,0L1152,0L1152,0L864,0L864,0L576,0L576,0L288,0L288,0L0,0L0,0Z"></path>
      </svg>
      
      <section id="berita">
      <div class="container">
        <div class="berita" style="color: #2fac68">
            <h5>Berita Terbaru</h5>
          </div>
          @foreach ($data->slice(0,5) as $d)
          <div class="card-group shadow">
              <div class="card mb-4 ">
                  <div class="row">
                      <div class="col-md-4">
                          <img src={{ asset('/storage/event/' .$d->gambar) }} class="card-img" alt="...">
                        </div>
                        
                        <div class="col-md-8">
                            <div class="card-body">
                              <div class="judul" style="color: #2fac68">
                                <h5 class="card-title">{{ $d->judul }}</h5>
                              </div>
                                <p class="card-text">{{ $d->konten }}</p>
                            </div>    
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
    </div>
</section>



        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>
