<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- SEO Meta Tags -->
    <meta name="description" content="Your description">
    <meta name="author" content="Your name">

    <!-- OG Meta Tags to improve the way the post looks when you share the page on Facebook, Twitter, LinkedIn -->
    <meta property="og:site_name" content="" /> <!-- website name -->
    <meta property="og:site" content="" /> <!-- website link -->
    <meta property="og:title" content="" /> <!-- title shown in the actual shared post -->
    <meta property="og:description" content="" /> <!-- description shown in the actual shared post -->
    <meta property="og:image" content="" /> <!-- image link, make sure it's jpg -->
    <meta property="og:url" content="" /> <!-- where do you want your post to link to -->
    <meta name="twitter:card" content="summary_large_image"> <!-- to have large image post format in Twitter -->

    <!-- Webpage Title -->
    <title>Bengkel Kalil Auto Service</title>

    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,600;0,700;1,400&display=swap"
        rel="stylesheet">
    <link href="{{ asset('user/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('user/css/fontawesome-all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('user/css/swiper.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('user/css/style.css') }}">

    <!-- Favicon  -->
    <link rel="icon" href="{{ asset('img/logo_only.svg') }}">
</head>

<body data-bs-spy="scroll" data-bs-target="#navbarExample">

    <!-- Navigation -->
    <nav id="navbarExample" class="navbar navbar-expand-lg fixed-top navbar-light" aria-label="Main navigation">
        <div class="container">

            <!-- Image Logo -->
            <a class="navbar-brand logo-image" href="{{ url('/') }}"><img src="{{ asset('user/images/logo.svg') }}"
                    alt="alternative"></a>

            <!-- Text Logo - Use this if you don't have a graphic logo -->
            <!-- <a class="navbar-brand logo-text" href="index.html">Yavin</a> -->

            <button class="navbar-toggler p-0 border-0" type="button" id="navbarSideCollapse"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
                <ul class="navbar-nav ms-auto navbar-nav-scroll">
                    <li class="nav-item">
                        <a class="nav-link" href="#header">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#details">Tentang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#services">Layanan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">Kontak</a>
                    </li>
                </ul>
                {{-- <span class="nav-item">
                    <a class="btn-outline-sm" href="{{ route('login') }}">Login</a>
                </span> --}}
                <span class="nav-item">
                    <a class="btn-outline-sm" href="{{ route('home.create') }}">Book Now!</a>
                </span>
            </div> <!-- end of navbar-collapse -->
        </div> <!-- end of container -->
    </nav> <!-- end of navbar -->
    <!-- end of navigation -->


    <!-- Header -->
    <header id="header" class="header">
        {{-- <img class="decoration-star" src="{{ asset('user/images/decoration-star.svg') }}" alt="alternative"> --}}
        <img class="decoration-star-2" src="{{ asset('user/images/decoration-star.svg') }}" alt="alternative">
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-7 col-xl-5">
                    <div class="text-container">
                        <h1 class="h1-large">Kalil Auto Service</h1>
                        <p class="p-large">Kalil Auto Service merupakan sebuah layanan bengkel mobil di Kabupaten
                            Malang. Berdiri pada tahun 2019, kini Bengkel Kalil Auto Service telah memiliki berbagai
                            macam customer, dan mulai menjalin kerja sama dengan lini bisnis lain sebagai vendor.</p>
                        <a class="btn-solid-lg" href="#introduction">Details</a>
                    </div> <!-- end of text-container -->
                </div> <!-- end of col -->
                <div class="col-lg-5 col-xl-7 px-5 pt-2 ml-4">
                    <div class="image-container">
                        <img class="img-fluid" src="{{ asset('user/images/img-header.png') }}" alt="alternative">
                    </div> <!-- end of image-container -->
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </header> <!-- end of header -->
    <!-- end of header -->


    <!-- Statistics -->
    <div class="counter" style="padding-top:10rem" id="details">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">

                    <!-- Counter -->
                    <div class="counter-container">
                        <div class="counter-cell">
                            <div data-purecounter-start="0" data-purecounter-end="231" data-purecounter-duration="3"
                                class="purecounter">1</div>
                            <div class="counter-info">Happy Customers</div>
                        </div> <!-- end of counter-cell -->
                        <div class="counter-cell">
                            <div data-purecounter-start="0" data-purecounter-end="385"
                                data-purecounter-duration="1.5" class="purecounter">1</div>
                            <div class="counter-info">Issues Solved</div>
                        </div> <!-- end of counter-cell -->
                        <div class="counter-cell">
                            <div data-purecounter-start="0" data-purecounter-end="159" data-purecounter-duration="3"
                                class="purecounter">1</div>
                            <div class="counter-info">Good Reviews</div>
                        </div> <!-- end of counter-cell -->
                        <div class="counter-cell">
                            <div data-purecounter-start="0" data-purecounter-end="128" data-purecounter-duration="3"
                                class="purecounter">1</div>
                            <div class="counter-info">Case Studies</div>
                        </div> <!-- end of counter-cell -->
                    </div> <!-- end of counter-container -->
                    <!-- end of counter -->

                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of counter -->
    <!-- end of statistics -->


    <!-- Introduction -->
    <div id="introduction" class="basic-1 bg-gray">
        <div class="container">
            <div class="row">
                <div class="col-xl-11">
                    <h2>Kualitas pelayanan dan kepuasan customer adalah hal yang kami utamakan!</h2>
                    <p>Sistem yang kami miliki mendukung transparansi dan efisiensi sehingga kami bisa memberikan harga
                        yang lebih terjangkau. Selain itu, semua layanan kami didukung oleh garansi 1 bulan. Customer
                        dapat mengikuti semua proses pengerjaan menggunakan software maupun perbaikan yang dilakukan
                        langsung dihadapan anda. Semua mekanik kami diseleksi dan diawasi secara ketat oleh profesional
                        di bidangnya sehingga dapat memberikan tingkat pelayanan terbaik.</p>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of basic-1 -->
    <!-- end of introduction -->


    <!-- Details 1 -->
    <div id="services" class="basic-2">
        <img class="decoration-star" src="{{ asset('user/images/decoration-star.svg') }}" alt="alternative">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-xl-5">
                    <div class="image-container">
                        <img class="img-fluid" src="{{ asset('user/images/details-1.png') }}" alt="alternative">
                    </div> <!-- end of image-container -->
                </div> <!-- end of col -->
                <div class="col-lg-6 col-xl-7">
                    <div class="text-container">
                        <h2>Layanan Kami</h2>
                        <ul class="list-unstyled li-space-lg">
                            <li class="d-flex">
                                <i class="fas fa-square"></i>
                                <div class="flex-grow-1"><b>Pengecekan, perawatan, dan perbaikan secara berkala</b>
                                    <br> Proses perawatan dan perbaikan rutin kendaraan yang meliputi penggantian
                                    pelumas pada mesin untuk menjaga performa mesin.
                                </div>
                            </li>
                            <li class="d-flex">
                                <i class="fas fa-square"></i>
                                <div class="flex-grow-1"><b> Perawatan mesin </b><br> Perawatan dan perbaikan engine
                                    sistem meliputi engine electrical diagnosis, mecanical engine serta sistem pelumasan
                                    dan pendinginan mesin.</div>
                            </li>
                            <li class="d-flex">
                                <i class="fas fa-square"></i>
                                <div class="flex-grow-1"><b>Perawatan Kaki Mobil</b><br>Perbaikan dan perawatan yang
                                    meliputi automatic/manual transmission, suspension system, brake system, steering
                                    system dan drive sistem.</div>
                            </li>
                            <li class="d-flex">
                                <i class="fas fa-square"></i>
                                <div class="flex-grow-1"><b>AC / Kelistrikan</b> <br>Perbaikan dan perawatan Air
                                    Conditioner, electrical wiring system dan electrical component.</div>
                            </li>
                        </ul>
                        {{-- <a class="btn-solid-reg" href="article.html">Get started</a> --}}
                    </div> <!-- end of text-container -->
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of basic-2 -->
    <!-- end of details 1 -->


    <!-- Services -->
    <div id="alur" class="cards-1 bg-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="text-container">
                        <h2>Alur Pelayanan</h2>
                        <p>Untuk menunjang pelayanan yang maksimal, kami menawarkan alur kerja efektif kepada customer.
                        </p>
                        <p>Diharapkan dengan sistem yang kami terapkan, dapat menghemat waktu pengerjaan serta efisiensi
                            setiap langkah yang akan dilakukan</p>
                    </div> <!-- end of text-container -->
                </div> <!-- end of col -->
                <div class="col-lg-7">
                    <div class="card-container">

                        <!-- Card -->
                        <div class="card">
                            <div class="card-icon">
                                <span class="fas fa-rocket"></span>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Booking dan Analisis Kerusakan</h5>
                            </div>
                        </div>
                        <!-- end of card -->

                        <!-- Card -->
                        <div class="card">
                            <div class="card-icon">
                                <span class="far fa-clock"></span>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Diagnosa dan Estimasi</h5>
                            </div>
                        </div>
                        <!-- end of card -->

                        <!-- Card -->
                        <div class="card">
                            <div class="card-icon">
                                <span class="far fa-comments"></span>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Diskusi dan Penawaran</h5>
                            </div>
                        </div>
                        <!-- end of card -->

                        <!-- Card -->
                        <div class="card">
                            <div class="card-icon">
                                <span class="fas fa-tools"></span>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Eksekusi Perbaikan</h5>
                            </div>
                        </div>
                        <!-- end of card -->

                        <!-- Card -->
                        <div class="card">
                            <div class="card-icon">
                                <span class="fas fa-chart-pie"></span>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Pelaporan Progress</h5>
                            </div>
                        </div>
                        <!-- end of card -->

                        <!-- Card -->
                        <div class="card">
                            <div class="card-icon">
                                <span class="far fa-chart-bar"></span>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Final Check dan Serah Terima</h5>
                            </div>
                        </div>
                        <!-- end of card -->

                    </div> <!-- end of container -->
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of cards-1 -->
    <!-- end of services -->

    <!-- Projects -->
    <div id="galeri" class="cards-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="h2-heading">Our Gallery</h2>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
            <div class="row">
                <div class="col-lg-12">

                    @foreach ($galeri as $row)
                        <!-- Card -->
                        <div class="card">
                            <img class="img-fluid" src="{{ asset('storage/' . $row->gambar) }}" alt="alternative">
                        </div>
                        <!-- end of card -->
                    @endforeach

                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of cards-2 -->
    <!-- end of projects -->


    <!-- Testimonials -->
    <div class="slider-1 bg-gray" id="feedback">
        <img class="quotes-decoration" src="{{ asset('user/images/quotes.svg') }}" alt="alternative">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">

                    <!-- Card Slider -->
                    <div class="slider-container">
                        <div class="swiper-container card-slider">
                            <div class="swiper-wrapper">


                                @foreach ($feedback as $row)
                                    <!-- Slide -->
                                    <div class="swiper-slide">
                                        <p class="testimonial-text">“{{ $row->feedback }}”</p>
                                        <div class="testimonial-author">{{ $row->booking->user->nama }}</div>
                                        <div class="testimonial-position">{{ $row->created_at->format('d M Y') }}
                                        </div>
                                    </div> <!-- end of swiper-slide -->
                                    <!-- end of slide -->
                                @endforeach

                            </div> <!-- end of swiper-wrapper -->

                            <!-- Add Arrows -->
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                            <!-- end of add arrows -->

                        </div> <!-- end of swiper-container -->
                    </div> <!-- end of slider-container -->
                    <!-- end of card slider -->

                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of slider-1 -->
    <!-- end of testimonials -->


    <!-- Contact -->
    <div id="contact" class="form-1">
        {{-- <img class="decoration-star" src="{{ asset('user/images/decoration-star.svg') }}" alt="alternative"> --}}
        <img class="decoration-star-2" src="{{ asset('user/images/decoration-star.svg') }}" alt="alternative">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 px-3">
                    <div class="image-container">
                        <div class="map-responsive rounded">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3951.8416827977876!2d112.6634778!3d-7.9116016!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd62bfe8b83255f%3A0x4c9d8a296e55bd7b!2sKalil%20Auto%20Service%20-%20Bengkel%20Mobil!5e0!3m2!1sid!2sid!4v1686299267195!5m2!1sid!2sid"
                                width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div> <!-- end of image-container -->
                </div> <!-- end of col -->
                <div class="col-lg-6 " style="padding-left: 5rem">
                    <div class="text-container">
                        <h2>Hubungi kami!</h2>
                        <form href="" method="POST">
                            @csrf
                            <div class="form-group">
                                <input type="text" class="form-control-input" placeholder="Nama Lengkap"
                                    required="" name="nama">
                            </div>
                            <div class="form-group">
                                <textarea type="text" fows="6" class="form-control-input" placeholder="Pesan" required=""
                                    name="pesan"></textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="form-control-submit-button">Submit</button>
                            </div>
                        </form>
                        <!-- end of contact form -->
                    </div> <!-- end of text-container -->
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of form-1 -->
    <!-- end of contact -->


    <!-- Footer -->
    <div class="footer bg-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer-col first">
                        <h6>About</h6>
                        <p class="small">Kalil Auto Service merupakan sebuah layanan bengkel mobil di Kabupaten Malang. Berdiri pada tahun 2019, kini Bengkel Kalil Auto Service telah memiliki berbagai macam customer, dan mulai menjalin kerja sama dengan lini bisnis lain sebagai vendor.</p>
                    </div> <!-- end of footer-col -->
                    <div class="footer-col second">
                        <h6>Kontak</h6>
                        <ul class="list-unstyled li-space-lg p-small">
                            @foreach ($kontak as $row)
                                <li>{{ $row->nama }} : {{ $row->isi }}</li>
                            @endforeach
                        </ul>
                    </div> <!-- end of footer-col -->
                    <div class="footer-col third">
                        <span class="fa-stack">
                            <a href="{{ url('https://wa.me/081913211707') }}">
                                <i class="fas fa-circle fa-stack-2x"></i>
                                <i class="fab fa-whatsapp fa-stack-1x"></i>
                            </a>
                        </span>
                        <span class="fa-stack">
                            <a href="{{ url('https://www.instagram.com/kalil.autoservice/') }}">
                                <i class="fas fa-circle fa-stack-2x"></i>
                                <i class="fab fa-instagram fa-stack-1x"></i>
                            </a>
                        </span>
                        <p class="p-small">We would love to hear from you</p>
                    </div> <!-- end of footer-col -->
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of footer -->
    <!-- end of footer -->


    <!-- Copyright -->
    <div class="copyright bg-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <p class="p-small">Copyright © <a href="#your-link">Kalil Auto Service</a></p>
                </div> <!-- end of col -->
            </div> <!-- enf of row -->
        </div> <!-- end of container -->
    </div> <!-- end of copyright -->
    <!-- end of copyright -->


    <!-- Back To Top Button -->
    <button onclick="topFunction()" id="myBtn">
        <img src="{{ asset('user/images/up-arrow.png') }}" alt="alternative">
    </button>
    <!-- end of back to top button -->

    <!-- Scripts -->
    <script src="{{ asset('user/js/bootstrap.min.js') }}"></script> <!-- Bootstrap framework -->
    <script src="{{ asset('user/js/swiper.min.js') }}"></script> <!-- Swiper for image and text sliders -->
    <script src="{{ asset('user/js/purecounter.min.js') }}"></script> <!-- Purecounter counter for statistics numbers -->
    <script src="{{ asset('user/js/scripts.js') }}"></script> <!-- Custom scripts -->
</body>

</html>
