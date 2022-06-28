@extends('layouts.master')

@section('main')

    {{-- editpp --}}
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action={{ url('dashboard/tambah') }} method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="formGroupExampleInput" class="form-label">Uraian</label>
                            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Uraian" name="masjid">
                          </div>
                          <div class="mb-3">
                            <label for="formGroupExampleInput2" class="form-label">Pemasukan</label>
                            <input type="file" class="form-control" id="formGroupExampleInput2" placeholder="Pemasukan" name="image">
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
    
    <div class="page-heading">
        <h3>Dashboard</h3>
    </div>

    {{-- <div class="page-contesnt">
        <div class="row">
            <div class="col-6 col-lg-3 col-md-6">
                <div class="card shadow">
                    <div class="card-body px-3 py-4-5">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="stats-icon purple">
                                    <i class="iconly-boldShow"></i>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <h6 class="text-muted font-semibold">Profile Views</h6>
                                <h6 class="font-extrabold mb-0">112.000</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-lg-3 col-md-6">
                <div class="card shadow">
                    <div class="card-body px-3 py-4-5">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="stats-icon blue">
                                    <i class="iconly-boldProfile"></i>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <h6 class="text-muted font-semibold">Followers</h6>
                                <h6 class="font-extrabold mb-0">183.000</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-lg-3 col-md-6">
                <div class="card shadow">
                    <div class="card-body px-3 py-4-5">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="stats-icon green">
                                    <i class="iconly-boldAdd-User"></i>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <h6 class="text-muted font-semibold">Following</h6>
                                <h6 class="font-extrabold mb-0">80.000</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-lg-3 col-md-6">
                <div class="card shadow">
                    <div class="card-body px-3 py-4-5">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="stats-icon red">
                                    <i class="iconly-boldBookmark"></i>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <h6 class="text-muted font-semibold">Saved Post</h6>
                                <h6 class="font-extrabold mb-0">112</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    <div class="page-content">
        <section>
            <div class="col-12 col-md-12">
                <div class="row">
                    <div class="col-12 col-md-4">
                        <div class="card shadow" style="height:260px;">
                        


                            @if (!isset($data[0]->masjid))
                                
                            <div class="card-body" >

                                <div class="text-center">
                                    <div class="avatar avatar-xl mt-2">  
                                        <img src="assets/images/faces/masjidsamping.jpg"/>
                                    </div>  
                                </div>
                        
                                <div class="text-center">
                                    <div class="mt-4">                              
                                        <h5 class="font-bold">Nama Masjid</h5>                                
                                    </div>
                                </div>

                                @hasrole('admin')

                                    <div class="text-center" >
                                        <a class="btn btn-primary btn-sm mt-2" data-bs-toggle="modal" data-bs-target="#exampleModal">tambah</a>
                                    </div>

                                @endhasrole  
                            
                            </div>
                            

                            @else
                   
                   
                            @foreach ($data as $d)
                            
                            
                            
                            <div class="card-body" >

                                <div class="text-center">
                                    <div class="avatar avatar-xl mt-2">  
                                        <img src="{{ asset('/storage/masjid/'.$d->image) }}">
                                    </div>  
                                </div>
                        
                                <div class="text-center">
                                    <div class="mt-4">                              
                                        <h5 class="font-bold">{{ $d->masjid }}</h5>                                
                                    </div>
                                </div>
                                @hasrole('admin')

                                <div class="text-center">
                                    <a class="btn btn-outline-success btn-sm mt-2" data-bs-toggle="modal" data-bs-target="#editMasjid{{ $d->id }}">Edit</a>
                                </div>
                                
                                @endhasrole

                            </div>

                           
                            @endforeach

                            @endif       
                        </div>
                    </div>

                   

                    

                    <div class="col-6 col-md-4" >
                        <div class="card shadow" style="height:260px;">
                            <div class="card-header">
                                <h4>Saldo Kas Masjid saat ini</h4>
                                <h5>Saldo: Rp.@money((float)"$rek_m")<h5>
                            </div>
                                
                            
                            <div class="card-body">
                                <div class="row">
                                    
                                    
                                    <div class="col-6 col-md-6">
                                        <div class="text-center" style="height: 125px;width:125px;">
                                            <canvas id="d_masjid"></canvas>
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-6">
                                        <i class="bi bi-circle" style="color:#1fb553;"></i> Pemasukan
                                        <br>
                                        <i class="bi bi-circle" style="color:#d13f26;"></i> Pengeluaran 

                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>

                    <div class="col-6 col-md-4" >
                        <div class="card shadow" style="height:260px;">
                            <div class="card-header">
                                <h4>Saldo Kas Sosial saat ini</h4>
                                <h5>Saldo: Rp.@money((float)"$rek_s")<h5>
                                </div>
                                
                            
                            <div class="card-body">
                                <div class="row">
                                    
                                    
                                    <div class="col-6 col-md-6">
                                        <div class="text-center" style="height: 125px;width:125px;">
                                            <canvas id="d_sosial"></canvas>
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-6">
                                        <i class="bi bi-circle" style="color:#1fb553;"></i> Pemasukan
                                        <br>
                                        <i class="bi bi-circle" style="color:#d13f26;"></i> Pengeluaran 

                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-12 col-md-12">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="card shadow" style="height:260px">
                            <div class="card-header">
                                <h4>Rekap kas Masjid saat ini</h4>
                            </div>
                            <div class="card-body shadow">
                                {{-- <canvas id="myChart" width="400" height="400"></canvas> --}}
                            </div>
                        </div>
                    </div>
                
                    <div class="col-12 col-md-6">
                        <div class="card shadow " style="height:260px">
                            <div class="card-header ">
                                <h4>Rekap kas Sosial saat ini</h4>
                            </div>
                            {{-- <div class="card-body text-center" style="height: 200px;width:200px;">
                                <canvas id="myChart"></canvas>
                            </div> --}}
                        </div>
                    </div>
                </div>

            </div>
        
            
                
            
            
        </section>
        @include('formEditMasjid')
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    {{-- CHART Masjid --}}
    <script>
        const masjid = {
            // labels: [
            //     'Laki-Laki',
            //     'Perempuan'
            // ],
            datasets: [{
                label: 'Gender',
                data: ["{{ $tot_in_m }}","{{ $tot_out_m }}" ],
                backgroundColor: [
                    '#1fb553' ,
                    '#d13524'
                ],
                hoverOffset: 4
            }]
        };

        const masjidd = {
            type: 'doughnut',
            data: masjid,
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                }
            },
        };

        const chartmasjid = new Chart(
            document.getElementById('d_masjid'),
            masjidd
        );
    </script>

    <script>
        const sosial = {
            // labels: [
            //     'Laki-Laki',
            //     'Perempuan'
            // ],
            datasets: [{
                label: 'Gender1',
                data: ["{{ $tot_in_s }}","{{ $tot_out_s }}"],
                backgroundColor: [
                    '#1fb553' ,
                    '#d13524'
                ],
                hoverOffset: 4
            }]
        };

        const sosiall = {
            type: 'doughnut',
            data: sosial,
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                }
            },
        };

        const chartsosial = new Chart(
            document.getElementById('d_sosial'),
            sosiall
        );
    </script>
    {{-- CHART GENDER --}}

@endsection

