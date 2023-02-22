@extends('layouts.master')

@section('main')

    {{-- editpp --}}
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Profile</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action={{ url('dashboard/tambah') }} method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="formGroupExampleInput" class="form-label">Nama Masjid</label>
                            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Nama Masjid"
                                name="masjid">
                        </div>
                        <div class="mb-3">
                            <label for="formGroupExampleInput2" class="form-label">Foto Profile</label>
                            <input type="file" class="form-control" id="formGroupExampleInput2" placeholder="Foto Profil"
                                name="image">
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

    <div class="page-heading" style="cursor:pointer">
        @if (!isset($data[0]->masjid))
            @hasrole('admin')
                <a data-bs-toggle="modal" data-bs-target="#exampleModal">


                    <div class="text-start">
                        <div class="avatar avatar-lg">
                            <img src="assets/images/faces/masjidsamping.jpg" />
                        </div>
                        <span class="font-bold ms-1" style="font-size: 24px">
                            Nama Masjid
                        </span>

                    </div>
                </a>
            @endhasrole
            @hasrole('bendahara')
                <a data-bs-toggle="modal" data-bs-target="#">

                    <div class="text-start">
                        <div class="avatar avatar-lg">
                            <img src="assets/images/faces/masjidsamping.jpg" />
                        </div>
                        <span class="font-bold ms-1" style="font-size: 24px">
                            Nama Masjid
                        </span>
                    </div>

                </a>
            @endhasrole
        @else
            @foreach ($data as $d)
                @hasrole('admin')
                    <a data-bs-toggle="modal" data-bs-target="#editMasjid{{ $d->id }}">

                        <div class="text-start">
                            <div class="avatar avatar-lg">
                                <img src="{{ asset('/storage/masjid/' . $d->image) }}">
                            </div>
                            <span class="font-bold ms-1" style="font-size: 24px">
                                {{ $d->masjid }}
                            </span>
                        </div>

                    </a>
                @endhasrole
                @hasrole('bendahara')
                    <a data-bs-toggle="modal" data-bs-target="#">

                        <div class="text-start">
                            <div class="avatar avatar-lg">
                                <img src="{{ asset('/storage/masjid/' . $d->image) }}">
                            </div>
                            <span class="font-bold ms-1" style="font-size: 24px">
                                {{ $d->masjid }}
                            </span>
                        </div>

                    </a>
                @endhasrole
            @endforeach
        @endif
    </div>

    <div class="page-content">
        <section>
            <div class="col-12 col-md-12">
                <div class="row">

                    <div class="col-12 col-md-6">
                        <div class="card shadow" style="height:260px;">
                            <div class="card-header">
                                <h4>Saldo Kas Masjid saat ini</h4>

                                @if ($rek_m == 0)
                                    <h6>Saldo: kosong<h6>
                                        @elseif ($rek_m <= -1)
                                            <h6>Kurang: Rp.@money((float) "$rek_m")<h6>
                                                @else
                                                    <h6>Saldo: Rp.@money((float) "$rek_m")<h6>
                                @endif
                            </div>


                            <div class="card-body">
                                <div class="row">


                                    <div class="col-6 col-md-6">
                                        <div class="text-center" style="height: 125px;width:125px;">
                                            <canvas id="d_masjid"></canvas>
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-6">
                                        <h5 style="font-size:15px"><i class="bi bi-circle-fill" style="color:#435EBE;"></i>
                                            Pemasukan</h5>
                                        <br>
                                        <h5 style="font-size:15px"> <i class="bi bi-circle-fill" style="color:#43beaf;"></i>
                                            Pengeluaran</h5>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-6">
                        <div class="card shadow" style="height:260px;">
                            <div class="card-header">
                                <h4>Saldo Kas Sosial saat ini</h4>
                                @if ($rek_s == 0)
                                    <h6>Saldo: kosong<h6>
                                        @elseif ($rek_s <= -1)
                                            <h6>Kurang: Rp.@money((float) "$rek_s")<h6>
                                                @else
                                                    <h6>Saldo: Rp.@money((float) "$rek_s")<h6>
                                @endif

                            </div>


                            <div class="card-body">
                                <div class="row">


                                    <div class="col-6 col-md-6">
                                        <div class="text-center" style="height: 125px;width:125px;">
                                            <canvas id="d_sosial"></canvas>
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-6">
                                        <h5 style="font-size:15px"><i class="bi bi-circle-fill"
                                                style="color:#435EBE;"></i> Pemasukan</h5>
                                        <br>
                                        <h5 style="font-size:15px"> <i class="bi bi-circle-fill"
                                                style="color:#43beaf;"></i> Pengeluaran</h5>

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
                        <div class="card shadow">
                            <div class="card-header">
                                <h4>Rekap kas Masjid tahun ini</h4>
                            </div>

                            <div class="text-center  mb-3 px-5">
                                <canvas id="masjid_b"></canvas>
                            </div>

                        </div>
                    </div>

                    <div class="col-12 col-md-6">
                        <div class="card shadow ">
                            <div class="card-header ">
                                <h4>Rekap kas Sosial tahun ini</h4>
                            </div>

                            <div class="text-center mb-3 px-5">
                                <canvas id="sosial_b"></canvas>
                            </div>

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
            labels: [
                'Jumlah',
                'Jumlah'
            ],
            datasets: [{
                label: '',
                data: ["{{ $tot_in_m }}", "{{ $tot_out_m }}"],
                backgroundColor: [
                    '#435EBE',
                    '#43beaf'
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
                        position: 'end',
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
            labels: [
                'Jumlah',
                'Jumlah'
            ],
            datasets: [{
                label: '',
                data: ["{{ $tot_in_s }}", "{{ $tot_out_s }}"],
                backgroundColor: [
                    '#435EBE',
                    '#43beaf'
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
                        position: 'end',
                    },
                }
            },
        };

        const chartsosial = new Chart(
            document.getElementById('d_sosial'),
            sosiall
        );
    </script>

    <script>
        const b_masjid = [
            'January',
            'February',
            'March',
            'April',
            'May',
            'June',
            'July',
            'Aug',
            'Sep',
            'Oct',
            'Nov',
            'Dec'
        ];

        const b_masjidd = {
            labels: b_masjid,
            datasets: [{
                label: 'Pemasukan',
                backgroundColor: '#435EBE',
                borderRadius: 4,
                barThickness: 10,

                data: [
                    @foreach ($data_month_in_m as $ikm)
                        {{ $ikm }},
                    @endforeach
                ]
            }, {
                label: 'Pengeluaran',
                backgroundColor: '#43beaf',
                borderRadius: 4,
                barThickness: 10,
                data: [
                    @foreach ($data_month_out_m as $okm)
                        {{ $okm }},
                    @endforeach
                ],
            }]
        };

        const bar_masjid = {
            type: 'bar',
            data: b_masjidd,
            options: {
                responsive: true,
                indexAxis: 'x',
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: {
                            usePointStyle: true,
                        },
                    },
                },
            }
        };
    </script>

    <script>
        const bulanan_masjid = new Chart(
            document.getElementById('masjid_b'),
            bar_masjid
        );
    </script>

    <script>
        const b_sosial = [
            'January',
            'February',
            'March',
            'April',
            'May',
            'June',
            'July',
            'Aug',
            'Sep',
            'Oct',
            'Nov',
            'Dec'
        ];

        const b_sosiall = {
            labels: b_sosial,
            datasets: [{
                label: 'Pemasukan',
                backgroundColor: '#345EBE',
                borderRadius: 4,
                barThickness: 10,
                data: [
                    @foreach ($data_month_in_s as $iks)
                        {{ $iks }},
                    @endforeach
                ]
            }, {
                label: 'Pengeluaran',
                backgroundColor: '#43beaf',
                borderRadius: 4,
                // borderSkipped: false,
                barThickness: 10,
                data: [
                    @foreach ($data_month_out_s as $oks)
                        {{ $oks }},
                    @endforeach
                ],
            }]
        };

        const bar_sosial = {
            type: 'bar',
            data: b_sosiall,
            options: {
                responsive: true,
                indexAxis: 'x',
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: {
                            usePointStyle: true,
                        },
                    },
                },

            }
        };
    </script>

    <script>
        const bulanan_sosial = new Chart(
            document.getElementById('sosial_b'),
            bar_sosial
        );
    </script>

@endsection
