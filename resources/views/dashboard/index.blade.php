@extends('layouts.main')

@section('wrapper')
    <div class="content-page">
        <div class="container-fluid">
            <div class="row">
                <!-- Card 1: Control Cards Created -->
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="">
                                    <p class="mb-2 text-secondary">Kartu Kendali Kegiatan</p>
                                    <div class="d-flex flex-wrap justify-content-start align-items-center">
                                        <h5 class="mb-0 font-weight-bold">{{ $Kartu }}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Card 2: Tax Documents Created -->
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="">
                                    <p class="mb-2 text-secondary">Pajak</p>
                                    <div class="d-flex flex-wrap justify-content-start align-items-center">
                                        <h5 class="mb-0 font-weight-bold">{{ $Pajak }}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Card 3: Fund Disbursement Notes Created -->
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="">
                                    <p class="mb-2 text-secondary">Nota Pencairan Dana</p>
                                    <div class="d-flex flex-wrap justify-content-start align-items-center">
                                        <h5 class="mb-0 font-weight-bold">{{ $Nota }}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="row">
                <div class="col-md-12">
                    <div class="card bg-primary">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="fit-icon-2 text-info text-center">
                                    <div id="budget-utilization-chart" class="circle-progress-01 circle-progress"></div>
                                </div>
                                <div class="ml-3">
                                    <h5 class="text-white font-weight-bold">{{ number_format($gu) }} <small>/
                                            {{ number_format($total_anggaran) }}</small></h5>
                                    <small class="mb-0">Anggaran Tahun 2024 Terpakai</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Data dari Controller untuk chart anggaran
            let anggaranpersen = {{ $anggaranpersen }};

            // Inisialisasi chart
            var options = {
                chart: {
                    type: 'radialBar',
                    height: 350,
                },
                series: [anggaranpersen],
                labels: ['Anggaran Terpakai']
            };

            var chart = new ApexCharts(document.querySelector("#budget-utilization-chart"), options);
            chart.render();
        });
    </script>
@endsection
