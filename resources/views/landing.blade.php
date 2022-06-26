<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Landing Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  </head>
  <body class="bg-success">      

    <nav class="navbar navbar-expand-md">
      <div class="container">
          <b style="color: white;font-size:22px">Kas Masjid</b>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item me-4">
                <a class="nav-link active" aria-current="page" href="#berita" style="color: white;font-size:20px;">Berita</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/login" style="color: white;font-size:20px">Login</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>

    
      
      {{-- getwaves.io --}}
      {{-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="#2fac68" fill-opacity="1" d="M0,256L0,96L288,96L288,128L576,128L576,288L864,288L864,224L1152,224L1152,288L1440,288L1440,0L1152,0L1152,0L864,0L864,0L576,0L576,0L288,0L288,0L0,0L0,0Z"></path>
      </svg> --}}
      
  <section id="berita" class="row mt-4" style="margin:20px;">
    
            <div class="row">
              <div class="col-12 col-md-4">

                @if (!isset($data2[0]->masjid))

                  <div class="card-group" style="height:250px;">
                        
                    <div class="card mb-4 shadow" style="background-color:#eeeee4">
                      <div class="row">

                        <div class="col-12 col-md-12">
                          <img src="assets/images/faces/masjidsamping.jpg" class="card-img" style="height:180px;"/>
                        </div>

                        <div class="col-12 col-md-12 mt-2">
                          <div class="judul" style="font-size:20rem ;">
                            <div class="text-center">
                              <h5 class="card-title">Nama Masjid</h5>
                            </div>
                          </div>
                        </div>
                      
                      </div>
                    </div>

                  </div>
                    
                @else

                  @foreach($data2 as $e)
                    <div class="card-group" style="height:250px;">
                      
                      <div class="card mb-4 shadow" style="background-color:#eeeee4">
                        <div class="row">

                          <div class="col-12 col-md-12">
                            <img src={{ asset('/storage/masjid/' .$e->image) }} class="card-img" style="height:180px;"/>
                          </div>

                          <div class="col-12 col-md-12 mt-2">
                            <div class="judul" style="font-size:20rem ;">
                              <div class="text-center">
                                <h5 class="card-title">{{ $e->masjid }}</h5>
                              </div>
                            </div>
                          </div>
                        
                        </div>
                      </div>

                    </div>
                  @endforeach
                    
                @endif

                  
              </div>

              <div class="col-6 col-md-4">

                <div class="card-group" style="height:250px;">
                  <div class="card mb-4 shadow" style="background-color:#eeeee4" > </div>
                </div>

              </div>

              <div class="col-6 col-md-4">

                <div class="card-group" style="height:250px;">
                  <div class="card mb-4 shadow" style="background-color:#eeeee4"> </div>
                </div>

              </div>

            </div>
            
            <div class="row">

                  <div class="text-center text-light mb-3">
                    <h5>Event Masjid</h5>
                  </div>

                  @if(!isset($data[0]->gambar))

                    <div class="col-12 col-md-12">
                      <div class="card-group">
                        <div class="card mb-4 shadow" style="background-color:#eeeee4">
                            <div class="row">
                              <div class="col-12 col-md-4">
                                <img src="assets/images/faces/masjidsamping.jpg" class="card-img" style="height:250px;"/>
                              </div>
                                    
                              <div class="col-12 col-md-8">

                                <div class="card-body">

                                  <div class="judul text-dark" style="font-size:15%;">
                                    <h5 class="card-title text-center mt-1">Acara</h5>
                                  </div>
                                        
                                  <p class="card-text mt-3 ">Keterangan Acara ditampilkan pada kolom ini</p>
                                
                                </div> 
                                        
                              </div>
                            </div>
                        </div>
                      </div>
                    </div>

                  @else

                    @foreach ($data->slice(0,3) as $d)
                      <div class="col-12 col-md-12">
                        <div class="card-group">
                          <div class="card mb-4 shadow" style="background-color:#eeeee4">
                              <div class="row">
                                <div class="col-12 col-md-4">
                                  <img src={{ asset('/storage/event/' .$d->gambar) }} class="card-img" style="height:250px;"/>
                                </div>
                                      
                                <div class="col-12 col-md-8">

                                  <div class="card-body">

                                    <div class="judul text-dark" style="font-size:15%;">
                                      <h5 class="card-title text-center mt-1">{{ $d->judul }}</h5>
                                    </div>
                                          
                                    <p class="card-text mt-3 ">{{ $d->konten }}</p>
                                  
                                  </div> 
                                          
                                </div>
                              </div>
                          </div>
                        </div>
                      </div>
                    @endforeach
                    
                  @endif
                  
  
            </div>

          
            

              
            

  </section>



        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>
