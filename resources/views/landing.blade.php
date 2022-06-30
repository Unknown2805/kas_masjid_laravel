<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Landing Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href={{ asset('assets/css/main/app.css') }}>
    <link rel="stylesheet" href={{ asset('assets/css/main/app-dark.css') }}>
    <link rel="stylesheet" href={{ asset('assets/css/shared/iconly.css') }}>
  </head>
  <body style="background-color:#ecf9f7;">      

    <nav class="navbar navbar-expand-md">
      <div class="container">
          <b class="text-dark" style="font-size:22px">Kas Masjid</b>

          <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link text-dark" href="/login" style="font-size:20px"><b>Login</b></a>
              </li>
            </ul>
          </div>
        </div>
      </nav>

    
      
      {{-- getwaves.io --}}
      {{-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="#2fac68" fill-opacity="1" d="M0,256L0,96L288,96L288,128L576,128L576,288L864,288L864,224L1152,224L1152,288L1440,288L1440,0L1152,0L1152,0L864,0L864,0L576,0L576,0L288,0L288,0L0,0L0,0Z"></path>
      </svg> --}}
      
  <section class="row ms-1 ml-1 mb-2 mt-0">
    
            <div class="row">
              <div class="col-12 col-md-4">

                @if (!isset($data2[0]->masjid))

                  <div class="card-group" style="height:284px;">
                        
                    <div class="card mb-4 shadow bg-light">
                      <div class="row">

                        <div class="col-12 col-md-12">
                          <img src="assets/images/faces/masjidsamping.jpg" class="card-img" style="height:215px;"/>
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
                    <div class="card-group" style="height:284px;">
                      
                      <div class="card mb-4 bg-light shadow">
                        <div class="row">

                          <div class="col-12 col-md-12">
                            <img src={{ asset('/storage/masjid/' .$e->image) }} class="card-img" style="height:215px;"/>
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

              <div class="col-12 col-md-4">
                <div class="card-group" style="height:250px;">
                  <div class="card shadow" style="height:260px;">

                      <div class="card-header">
                        <h4>Saldo Kas Masjid saat ini</h4>
                        <h5>Saldo: Rp.@money((float)"$rek_m")<h5>
                      </div>
                        
                    
                    <div class="card-body">
                        <div class="row">
                            
                            
                            <div class="col-6 col-md-7">
                              <div class="text-center ms-2 mb-3" style="height: 125px;width:140px;">
                                <canvas id="d_land_masjid"></canvas>
                              </div>
                            </div>

                            <div class="col-6 col-md-5">
                                <i class="bi bi-circle-fill" style="color:#435EBE;"></i> Pemasukan
                                <br>
                                <i class="bi bi-circle-fill" style="color:#43beaf;"></i> Pengeluaran 

                            </div>
                        </div>
                        
                    </div>

                  </div>
                </div>

              </div>

              <div class="col-12 col-md-4">

                
                <div class="card-group" style="height:250px;">
                  <div class="card shadow" style="height:260px;">

                      <div class="card-header">
                        <h4>Saldo Kas Sosial saat ini</h4>
                        <h5>Saldo: Rp.@money((float)"$rek_s")<h5>
                      </div>
                        
                    
                    <div class="card-body">
                        <div class="row">
                            
                            
                            <div class="col-6 col-md-7">
                                <div class="text-center ms-2 mb-3" style="height: 125px;width:140px;">
                                    <canvas id="d_land_sosial"></canvas>
                                </div>
                            </div>
                            <div class="col-6 col-md-5">
                                <i class="bi bi-circle-fill" style="color:#435EBE;"></i> Pemasukan
                                <br>
                                <i class="bi bi-circle-fill" style="color:#43beaf;"></i> Pengeluaran 

                            </div>
                        </div>
                        
                    </div>

                 </div>
                </div>

              </div>

              

            </div>
            
            <div class="row">

                  <div class="text-center text-dark mb-3 mt-2">
                    <h5><b>Event Masjid</b></h5>
                  </div>

                  @if(!isset($data[0]->gambar))

                    <div class="col-12 col-md-12">
                      <div class="card-group">
                        <div class="card mb-4 shadow bg-light">
                            <div class="row">
                              <div class="col-12 col-md-4">
                                <img src="assets/images/faces/masjidsamping.jpg" class="card-img" style="height:190px;margin:8px;border: 2px solid gray"/>
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

        <script src="assets/js/extensions/ui-chartjs.js"></script>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        {{-- CHART Masjid --}}
        <script>
            const land_masjid = {
               labels: [
                'Jumlah',
                'Jumlah'
            ],
                datasets: [{
                    label: '',
                    data: ["{{ $tot_in_m }}","{{ $tot_out_m }}" ],
                    backgroundColor: [
                        '#435EBE' ,
                        '#43beaf'
                    ],
                    hoverOffset: 4
                }]
            };
    
            const land_masjidd = {
                type: 'doughnut',
                data: land_masjid,
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'end',
                        },
                    }
                },
            };
    
            const chartland_masjid = new Chart(
                document.getElementById('d_land_masjid'),
                land_masjidd
            );
        </script>
    
        <script>
            const land_sosial = {
              labels: [
                'Jumlah',
                'Jumlah'
              ],
                datasets: [{
                    label: '',
                    data: ["{{$tot_in_m }}","{{ $tot_out_s }}"],
                    backgroundColor: [
                        '#435EBE' ,
                        '#43beaf'
                    ],
                    hoverOffset: 4
                }]
            };
    
            const land_sosiall = {
                type: 'doughnut',
                data: land_sosial,
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'end',
                        },
                    }
                },
            };
    
            const chartland_sosial = new Chart(
                document.getElementById('d_land_sosial'),
                land_sosiall
            );
        </script>
  </body>
</html>
