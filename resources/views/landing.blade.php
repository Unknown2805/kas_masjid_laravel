<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Landing Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  </head>
  <body>
      
    <nav class="navbar navbar-expand-lg shadow fixed-top" style="background-color:  blue">
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

      <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="{{ asset('assets/images/faces/1.jpg') }}" class="mx-auto w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="{{ asset('assets/images/faces/1.jpg') }}" class="mx-auto w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="{{ asset('assets/images/faces/1.jpg') }}" class="mx-auto w-100" alt="...">
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
      
      {{-- getwaves.io --}}
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#0000ff" fill-opacity="1" d="M0,96L48,117.3C96,139,192,181,288,181.3C384,181,480,139,576,149.3C672,160,768,224,864,218.7C960,213,1056,139,1152,112C1248,85,1344,107,1392,117.3L1440,128L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z"></path></svg>

      <section id="berita">
      <div class="container">
          <h3>Berita Terbaru</h3>
          
          @foreach ($data->slice(0,5) as $d)
          <div class="card-group">
              <div class="card mb-4 shadow">
                  <div class="row">
                      <div class="col-md-4">
                          <img src={{ asset('/storage/event/' .$d->gambar) }} class="card-img" alt="...">
                        </div>
                        
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">{{ $d->judul }}</h5>
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
