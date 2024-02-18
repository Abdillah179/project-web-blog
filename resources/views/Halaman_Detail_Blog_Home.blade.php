<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>{{ $judul }}</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link rel="icon" type="image/png" href="{{ asset('logo/logo.png') }}">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:wght@400;500&family=Inter:wght@400;500&family=Playfair+Display:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('Blog-template/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('Blog-template/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('Blog-template/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
    <link href="{{ asset('Blog-template/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('Blog-template/assets/vendor/aos/aos.css') }}" rel="stylesheet">

    <!-- Template Main CSS Files -->
    <link href="{{ asset('Blog-template/assets/css/variables.css') }}" rel="stylesheet">
    <link href="{{ asset('Blog-template/assets/css/main.css') }}" rel="stylesheet">


    <link rel="stylesheet" href="{{ asset('font-awesome/css/font-awesome.min.css') }}">


    <link rel="stylesheet" id="dark">


    <link rel="stylesheet" href="{{ asset('darkmode/node_modules/bootstrap/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{  asset('darkmode/node_modules/bootstrap-icons/font/bootstrap-icons.css') }}">

</head>

<body id="body">

    <!-- ======= Header ======= -->
    <header id="header" class="header d-flex align-items-center fixed-top">
        <div class="container-fluid container-xl d-flex align-items-center justify-content-between header-atas">

            <a href="index.html" class="logo d-flex align-items-center tulisan-nusantara" style="text-decoration:none">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                <!-- <img src="assets/img/logo.png" alt=""> -->
                <h1>NusantaraBlog</h1>
            </a>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a href="/" class="tulisan" style="text-decoration: none;">Home</a></li>
                    <li class="dropdown"><a href="/" class="tulisan" style="text-decoration: none;"><span>Category Blog</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
                        <ul>
                            @foreach($AllCategory as $Allcty)
                            <li><a href="/categorybloghome/{{ $Allcty->category_slug }}" class="tulisan" style="text-decoration: none;">{{ $Allcty->name }}</a></li>
                            @endforeach
                        </ul>
                    </li>

                    <li><a href="/madeby" class="mb-2 mt-2 tulisan" style="text-decoration: none;">Made By</a></li>
                    <li>
                        <div class="form-check form-switch ms-4">
                            <input class="form-check-input" type="checkbox" role="switch" id="switch">
                            <label class="form-check-label" for="switch">Dark Mode</label>
                        </div>
                    </li>
                </ul>
            </nav><!-- .navbar -->

            <div class="position-relative">
                <a href="#" class="mx-2 js-search-open" style="text-decoration: none;"><span class="bi-search"></span></a>
                <a href="/login" class="mx-3 login" style="text-decoration: none;"><i class="fa fa-sign-in" aria-hidden="true" class="login"></i>Login</a>
                <i class="bi bi-list mobile-nav-toggle" style="text-decoration: none;"></i>

                <!-- ======= Search Form ======= -->
                <div class="search-form-wrap js-search-form-wrap">
                    <form action="search-result.html" class="search-form">
                        <span class="icon bi-search"></span>
                        <input type="text" placeholder="Search" class="form-control">
                        <button class="btn js-search-close"><span class="bi-x"></span></button>
                    </form>
                </div><!-- End Search Form -->

            </div>

        </div>

    </header><!-- End Header -->

    <main id="main">

        <section class="single-post-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-9 post-content" data-aos="fade-up">

                        <!-- ======= Single Post Content ======= -->

                        <div class="single-post">
                            <div class="post-meta"><span class="date">{{ $detailbloghome->slug_category }}</span> <span class="mx-1">&bullet;</span> <span class="published_at">{{ $detailbloghome->published_at }}</span><span class="mx-2">&bullet;</span> <span class="negara">{{ $detailbloghome->negara }}</span></div>
                            <h1 class="mb-5">{{ $detailbloghome->title }}</h1>

                            <figure class="my-4">
                                <img src="{{  asset('storage/' . $detailbloghome->blog_image) }}" alt="" class="img-fluid">
                                <figcaption>{{ $detailbloghome->title }}</figcaption>
                            </figure>
                            <p>{!! $detailbloghome->body !!}</p>
                        </div><!-- End Single Post Content -->
                    </div>
                    <div class="col-md-3">
                        <!-- ======= Sidebar ======= -->
                        <div class="aside-block">
                            <a href="/login" class="btn btn-primary">Edit Postingan Blog</a>
                        </div>
                    </div>
                </div>
        </section>
    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">

        <div class="footer-content">
            <div class="container">

                <div class="row g-5 d-flex justify-content-center">
                    <div class="col-6 col-lg-2">
                        <h3 class="footer-heading">Navigation</h3>
                        <ul class="footer-links list-unstyled">
                            <li><a href="/" style="text-decoration: none;"><i class="bi bi-chevron-right"></i> Home</a></li>
                            <li><a href="#body" style="text-decoration: none;"><i class="bi bi-chevron-right"></i> Category Blog</a></li>
                            <li><a href="/madeby" style="text-decoration: none;"><i class="bi bi-chevron-right"></i> Made By</a></li>
                        </ul>
                    </div>
                    <div class="col-6 col-lg-2">
                        <h3 class="footer-heading">Category Blog</h3>
                        <ul class="footer-links list-unstyled">
                            @foreach($AllCategory as $Allctr)
                            <li><a href="/categorybloghome/{{  $Allctr->category_slug }}" style="text-decoration: none;"><i class="bi bi-chevron-right"></i> {{ $Allctr->name  }}</a></li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="col-lg-4">
                        <h3 class="footer-heading">Recent Posts</h3>

                        <ul class="footer-links footer-blog-entry list-unstyled">
                            @foreach($RecentPost as $RCP)
                            <li>
                                <a href="/detailbloghome/{{ $RCP->slug }}" class="d-flex align-items-center" style="text-decoration: none;">
                                    <img src="{{  asset('storage/' . $RCP->blog_image) }}" alt="" class="img-fluid me-3">
                                    <div>
                                        <div class="post-meta d-block"><span class="date">{{ $RCP->slug_category }}</span> <span class="mx-1">&bullet;</span> <span>{{ $RCP->published_at }}</span><span class="mx-1">&bullet;</span> <span>{{ $RCP->negara }}</span></div>
                                        <span>{{ $RCP->title }}</span>
                                    </div>
                                </a>
                            </li>
                            @endforeach
                        </ul>

                    </div>
                </div>
            </div>
        </div>

        <div class="footer-legal">
            <div class="container">

                <div class="row d-flex justify-content-center">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        <div class="copyright text-center">
                            © Copyright <strong><span>NusantaraBlog</span></strong>. All Rights Reserved
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </footer>

    <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('Blog-template/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('Blog-template/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('Blog-template/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('Blog-template/assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('Blog-template/assets/vendor/php-email-form/validate.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('Blog-template/assets/js/main.js') }}"></script>


    <script src="{{ asset('darkmode/node_modules/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{  asset('darkmode/node_modules/bootstrap/dist/js/bootstrap.bundle.js') }}"></script>


    <script>
        var dark = $('#dark');
        var ubah = $('#switch');

        ubah.change(function() {
            if (ubah.prop('checked') == true) {
                dark.attr('href', "{{ asset('css/stylemodegelapp.css') }}")
            } else {
                dark.attr('href', "")
            }
        })
    </script>
</body>

</html>