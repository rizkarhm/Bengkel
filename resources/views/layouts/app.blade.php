<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Bengkel Kalil Auto Service</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
    <!-- Icon web tab -->
    <link rel="icon" href="{{ asset('img/logo_only.svg') }}">

    <!-- jQuery UI libra>

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        @include('layouts.sidebar')
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                @include('layouts.navbar')
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-2">
                        <h1 class="h3 mb-0 text-gray-800 font-weight-bolder">@yield('title')</h1>
                    </div>

                    @yield('contents')

                    <!-- Content Row -->


                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            @include('layouts.footer')
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

    <!-- Page level plugins -->
    <script src="{{ asset('vendor/chart.js/Chart.min.js') }}"></script>

    {{-- Search --}}
    <script>
        $(document).ready(function() {
            $("#cari").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#dataTable tbody tr")
                    .filter(function() {
                        // Exclude table head row
                        return !$(this).hasClass("thead-row");
                    })
                    .each(function() {
                        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
                    });
            });
        });
    </script>

    {{-- Input berdasarkan status --}}
    <script>
        $(document).ready(function() {
            $('#status').change(function() {
                var selectedStatus = $(this).val();
                if (selectedStatus === 'Proccessed') {
                    $('#pic_id').show();
                    $('#penanganan').hide();
                    $('#ket_pembatalan').hide();
                } else if (selectedStatus === 'Canceled') {
                    $('#pic_id').show();
                    $('#penanganan').hide();
                    $('#ket_pembatalan').show();
                } else if (selectedStatus === 'Done') {
                    $('#pic_id').show();
                    $('#penanganan').show();
                    $('#ket_pembatalan').hide();
                } else {
                    $('#pic_id').hide();
                    $('#pic_id').val('');
                    $('#penanganan').hide();
                    $('#penanganan').val('');
                    $('#ket_pembatalan').hide();
                    $('#ket_pembatalan').val('');
                }
            })
        });
    </script>

    {{-- On Change form data customer in booking --}}
    <script>
        $(document).ready(function() {
            $('#cust_id').change(function() {
                var selectedStatus = $(this).val();
                if (selectedStatus === 'new_customer') {
                    $('#nama').prop("disabled", false);
                    $('#telepon').prop("disabled", false);
                    $('#alamat').prop("disabled", false);
                } else {
                    $('#nama').prop("disabled", true);
                    $('#telepon').prop("disabled", true);
                    $('#alamat').prop("disabled", true);
                    // $('#nama').val('-');
                    // $('#telepon').val('0');
                    // $('#alamat').val('-');
                }
            })
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#cust_id').on('change', function() {
                var selectedId = $(this).val();

                if (selectedId !== '') {
                    $.ajax({
                        url: "{{ route('getData', ['id' => '__id__']) }}".replace('__id__',
                            selectedId),
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('#nama').val(data.nama);
                            $('#telepon').val(data.telepon);
                            $('#alamat').val(data.alamat);
                        },
                        error: function() {
                            console.log('Error occurred while fetching data.');
                        }
                    });
                } else {
                    $('#nama').val('');
                    $('#telepon').val('');
                    $('#alamat').val('');
                }
            });
        });
    </script>

    {{-- Add default value for tgl masuk as today --}}
    <script>
        $('#tgl_masuk').val(new Date().toJSON().slice(0, 10));
    </script>

    </body>

</html>
