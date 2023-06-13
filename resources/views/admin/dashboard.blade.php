@extends('layouts.app')

@section('title', 'Dashboard')

@section('contents')
    <div class="row">
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1"><a class="text-success" href="{{ route('customer.index') }}">Customer</a></div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $customer->count() }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"><a class="text-primary" href="{{ route('akun.index') }}">Pegawai</a></div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $pegawai->count() }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1"><a class="text-info" href="{{ route('booking.index') }}">Transaksi</a>
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                        {{ round(($historys->count() / $all_booking->count()) * 100, 0) }}%</div>
                                </div>
                                <div class="col">
                                    <div class="progress progress-sm mr-2">
                                        <div class="progress-bar bg-info" role="progressbar"
                                            style="width: {{ round(($historys->count() / $all_booking->count()) * 100, 0) }}%"
                                            aria-valuenow="{{ $historys->count() }}" aria-valuemin="0"
                                            aria-valuemax="{{ $all_booking->count() }}"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold  text-uppercase mb-1"><a class="text-warning" href="{{ route('feedback.index') }}">Feedbacks</a></div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $feedback->count() }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-12">
            <div class="card card-header-actions shadow h-100">
                <div id="grafik"></div>
            </div>
            <h5 class="text-danger">*Urutan bulan belum sesuai</h5>
        </div>
    </div>


    {{-- Grafik dashboard --}}
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script type="text/javascript">
        var chart = {{ Js::from($chart) }};
        var bulan = {{ Js::from($bulan) }};

        Highcharts.chart('grafik', {
            title: {
                text: 'Grafik Transaksi, 2023'
            },
            subtitle: {
                text: 'Bengkel Kalil Auto Service'
            },
            xAxis: {
                categories: bulan
            },
            yAxis: {
                title: {
                    text: 'Jumlah'
                }
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'middle'
            },
            plotOptions: {
                series: {
                    allowPointSelect: true
                }
            },
            series: [{
                name: 'Transaksi',
                data: chart
            }],
            responsive: {
                rules: [{
                    condition: {
                        maxWidth: 500
                    },
                    chartOptions: {
                        legend: {
                            layout: 'horizontal',
                            align: 'center',
                            verticalAlign: 'bottom'
                        }
                    }
                }]
            }
        });
    </script>

@endsection
