<!--
=========================================================
* Material Dashboard 2 - v3.1.0
=========================================================

* Product Page: https://www.creative-tim.com/product/material-dashboard
* Copyright 2023 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/png" href="{{ asset('logo/logo.png') }}">
    <title>
        {{ $judul }}
    </title>
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
    <!-- Nucleo Icons -->
    <!-- Nucleo Icons -->
    <link href="{{ asset('material-dashboard-template/assets/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('material-dashboard-template/assets/css/nucleo-svg.css') }}" rel="stylesheet" />

    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>

    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">

    <!-- CSS Files -->
    <link id="pagestyle" href="{{ asset('material-dashboard-template/assets/css/material-dashboard.css?v=3.1.0') }}" rel="stylesheet" />

    <!-- Nepcha Analytics (nepcha.com) -->
    <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
    <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>

    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.8/dist/trix.css">
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script>

    <style>
        trix-toolbar [data-trix-button-group="file-tools"] {
            display: none;
        }
    </style>
</head>

<body class="g-sidenav-show  bg-gray-200">
    <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
        <div class="sidenav-header">
            <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
            <a class="navbar-brand m-0" target="_blank">
                <img src="{{  asset('logo/logo.png') }}" class="navbar-brand-img h-100 rounded-circle" alt="main_logo">
                <span class="ms-1 font-weight-bold text-white">Nusantara Blog</span>
            </a>
        </div>
        <hr class="horizontal light mt-0 mb-2">
        <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link text-white active bg-gradient-primary" href="/Dashboard">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">dashboard</i>
                        </div>
                        <span class="nav-link-text ms-1">Back to Dashboard <<< </span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="sidenav-footer position-absolute w-100 bottom-0">
            <div class="card card-plain shadow-none" id="sidenavCard">
                <img class="w-50 mx-auto rounded-circle" src="{{  asset('logo/logo.png') }}" alt="sidebar_illustration">
                <div class="card-body text-center p-3 w-100 pt-0">
                    <div class="docs-info mt-3">
                        <h6 class="font-weight-bold text-white">Nusantara Blog</h6>
                    </div>
                </div>
            </div>
        </div>
    </aside>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
            <div class="container-fluid py-1 px-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;"></a></li>
                        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Edit Postingan Blog</li>
                    </ol>
                    <h6 class="font-weight-bolder mb-0">Edit Postingan Blog</h6>
                </nav>
                <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                    <div class="ms-md-auto pe-md-3 d-flex align-items-center">

                    </div>
                    <ul class="navbar-nav justify-content-end">
                        <li class="nav-item dropdown pe-2 d-flex align-items-center">
                            <span id="onlineStatus" class="badge bg-gradient-info me-3 mt-1">ONLINE</span>

                            <!-- Script JavaScript dan jQuery -->
                            <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
                            <script>
                                function blinkText() {
                                    $('#onlineStatus').fadeOut(1000).fadeIn(1000, blinkText);
                                }
                            </script>

                            @if(Auth::check() && Auth::id() == auth()-> user()->id)
                            <script>
                                blinkText();
                            </script>
                            @endif
                            <a href="" class="nav-link text-white p-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                @if(auth()->user()->image == 'default.jpg' || auth()->user()->image == null)
                                <img src="{{ asset('image/profile/' . auth()->user()->image) }}" alt="" height="30px" class="rounded-circle me-sm-1">
                                <span class="d-sm-inline d-none" style="color: black;">{{ auth()->user()->name }}</span>

                                @else
                                <img src="{{ asset('storage/' . auth()->user()->image) }}" alt="" height="30px" class="rounded-circle me-sm-1">
                                <span class="d-sm-inline d-none" style="color: black;">{{ auth()->user()->name }}</span>

                                @endif
                            </a>
                            <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton">
                                <li class="mb-2">
                                    <a class="dropdown-item border-radius-md" href="/profile">
                                        <i class="fa fa-user" aria-hidden="true"></i>Profile
                                    </a>
                                </li>
                                <li class="mb-2">
                                    <a class="dropdown-item border-radius-md" href="/logout">
                                        <i class="fa fa-sign-out" aria-hidden="true"></i>Logout
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                            <a href="javascript:;" class="nav-link text-white p-0" id="iconNavbarSidenav">
                                <div class="sidenav-toggler-inner">
                                    <i class="sidenav-toggler-line bg-black"></i>
                                    <i class="sidenav-toggler-line bg-black"></i>
                                    <i class="sidenav-toggler-line bg-black"></i>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item px-3 d-flex align-items-center">
                            <a href="javascript:;" class="nav-link text-white p-0">
                                <i class="fa fa-cog fixed-plugin-button-nav cursor-pointer" style="color: black;"></i>
                            </a>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>
        <!-- End Navbar -->
        <section class="single-post-content">
            @if(session()->has('editheaderblog'))
            <div class="alert alert-warning alert-dismissible text-white fade show" role="alert">
                <span class="alert-icon align-middle">
                    <span class="material-icons text-md">
                        thumb_up_off_alt
                    </span>
                </span>
                <span class="alert-text"><strong>{{ session('editheaderblog') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            @endif
            @if(session()->has('editfotoblog'))
            <div class="alert alert-warning alert-dismissible text-white fade show" role="alert">
                <span class="alert-icon align-middle">
                    <span class="material-icons text-md">
                        thumb_up_off_alt
                    </span>
                </span>
                <span class="alert-text"><strong>{{ session('editfotoblog') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            @endif
            @if(session()->has('editbodyteksblog'))
            <div class="alert alert-warning alert-dismissible text-white fade show" role="alert">
                <span class="alert-icon align-middle">
                    <span class="material-icons text-md">
                        thumb_up_off_alt
                    </span>
                </span>
                <span class="alert-text"><strong>{{ session('editbodyteksblog') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            @endif
            <div class="container">
                <div class="row">
                    <div class="col-md-12 post-content" data-aos="fade-up">

                        <!-- ======= Single Post Content ======= -->
                        <div class="single-post">
                            <div class="post-meta"><span class="date">{{ $datablog->slug_category }}</span> <span class="mx-1">&bullet;</span> <span>{{ $datablog->published_at }}</span> <span class="mx-1">&bullet;</span> <span>{{ $datablog->negara }}</span><span class="mx-1">&bullet;</span> <button type="button" class="btn bg-gradient-info btn-block mt-1 btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModalSignUp">
                                    Edit Header
                                </button>

                                <div class="modal fade" id="exampleModalSignUp" tabindex="-1" role="dialog" aria-labelledby="exampleModalSignTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                                        <div class="modal-content">
                                            <div class="modal-body p-0">
                                                <div class="card card-plain">
                                                    <div class="card-header pb-0 text-left">
                                                        <h5 class="text-center">Edit Kategori Blog, Tanggal Postingan Blog</h5>
                                                    </div>
                                                    <div class="card-body pb-3">
                                                        <form role="form text-left" action="/posteditheaderblog/{{ $datablog->slug }}" method="post">
                                                            @csrf

                                                            <div class="input-group input-group-static mb-5">
                                                                <label for="exampleFormControlSelect1" class="ms-0">Category Blog</label>
                                                                <select name="slug_category" class="form-control @error('slug_category') is-invalid @enderror" id="exampleFormControlSelect1">
                                                                    @foreach($category as $ctr)
                                                                    <option value="{{ $ctr->category_slug }}">{{ $ctr->name }}</option>
                                                                    @endforeach
                                                                </select>

                                                                @error('slug_category')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                                @enderror
                                                            </div>
                                                            <div class="input-group input-group-static mb-5">
                                                                <label for="published_at" class="ms-0">Tanggal Postingan Blog</label>
                                                                <input type="date" name="published_at" class="form-control @error('published_at') is-invalid @enderror" id="published_at" value="{{ $datablog->published_at }}">


                                                                @error('published_at')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                                @enderror
                                                            </div>
                                                            <div class="text-center">
                                                                <button type="submit" class="btn bg-gradient-info btn-lg btn-rounded w-100 mt-4 mb-0">Edit</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <h1 class="mb-5">{{ $datablog->title }} <button type="button" class="btn bg-gradient-info mt-2" data-bs-toggle="modal" data-bs-target="#exampleModalJudul">
                                        Edit Judul
                                    </button>

                                    <div class="modal fade" id="exampleModalJudul" tabindex="-1" role="dialog" aria-labelledby="exampleModalSignTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                                            <div class="modal-content">
                                                <div class="modal-body p-0">
                                                    <div class="card card-plain">
                                                        <div class="card-header pb-0 text-left">
                                                            <h5 class="text-center">Edit Judul Postingan Blog</h5>
                                                        </div>
                                                        <div class="card-body pb-3">
                                                            <form role="form text-left" action="/posteditjudulblog/{{ $datablog->slug }}" method="post">
                                                                @csrf

                                                                <div class="input-group input-group-static mb-5">
                                                                    <label for="title" class="ms-0">Judul Blog</label>
                                                                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title" value="{{ $datablog->title }}">

                                                                    @error('title')
                                                                    <div class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                    @enderror
                                                                </div>
                                                                <div class="input-group input-group-static mb-5">
                                                                    <label for="slug" class="ms-0">Name Slug</label>
                                                                    <input type="text" name="slug" class="form-control @error('slug') is-invalid @enderror" id="slug" readonly value="{{ $datablog->slug }}">


                                                                    @error('slug')
                                                                    <div class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                    @enderror
                                                                </div>
                                                                <div class="text-center">
                                                                    <button type="submit" class="btn bg-gradient-info btn-lg btn-rounded w-100 mt-4 mb-0">Edit</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </h1>
                                <img src="{{ asset('storage/' . $datablog->blog_image) }}" alt="" class="img-fluid mb-3"> <button type="button" class="btn bg-gradient-info btn-block btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModalFoto">
                                    Edit Foto
                                </button>

                                <div class="modal fade" id="exampleModalFoto" tabindex="-1" role="dialog" aria-labelledby="exampleModalSignTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                                        <div class="modal-content">
                                            <div class="modal-body p-0">
                                                <div class="card card-plain">
                                                    <div class="card-header pb-0 text-left">
                                                        <h5 class="text-center">Edit Foto Postingan Blog</h5>
                                                    </div>
                                                    <div class="card-body pb-3">
                                                        <form role="form text-left" action="/posteditfotoblog/{{ $datablog->slug }}" method="post" enctype="multipart/form-data">
                                                            @csrf

                                                            <div class="input-group input-group-static mb-5">
                                                                <label for="blog-Image" class="ms-0">Foto</label>
                                                                <img class="img-preview img-fluid">
                                                                <input type="file" name="blog_image" class="form-control @error('blog_image') is-invalid @enderror" id="blog-Image" value="{{ $datablog->blog_image}}" onchange="previewImage()">


                                                                @error('blog_image')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                                @enderror
                                                            </div>
                                                            <div class="text-center">
                                                                <button type="submit" class="btn bg-gradient-info btn-lg btn-rounded w-100 mt-4 mb-0">Edit</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <p>{!! $datablog->body !!} <button type="button" class="btn bg-gradient-info btn-block btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModalBodyTeks">
                                        Edit Teks Body
                                    </button>

                                <div class="modal fade" id="exampleModalBodyTeks" tabindex="-1" role="dialog" aria-labelledby="exampleModalSignTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-body p-0">
                                                <div class="card card-plain">
                                                    <div class="card-header pb-0 text-left">
                                                        <h5 class="text-center">Edit Teks Body Postingan Blog</h5>
                                                    </div>
                                                    <div class="card-body pb-3">
                                                        <form role="form text-left" action="/posteditbodyteksblog/{{ $datablog->slug }}" method="post">
                                                            @csrf

                                                            <div class="mb-5">
                                                                <label for="body" class="form-label">Body</label>
                                                                <input id="body" type="hidden" name="body" class="form-control @error('body') is-invalid @enderror" value="{{ $datablog->body }}">
                                                                <trix-editor input="body"></trix-editor>

                                                                @error('body')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                                @enderror
                                                            </div>
                                                            <div class="text-center">
                                                                <button type="submit" class="btn bg-gradient-info btn-lg btn-rounded w-100 mt-4 mb-0">Edit</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                </p>
                            </div><!-- End Single Post Content -->
                        </div>
                    </div>
                </div>
        </section>
    </main>
    <div class="fixed-plugin">
        <a class="fixed-plugin-button text-dark position-fixed px-3 py-2">
            <i class="material-icons py-2">settings</i>
        </a>
        <div class="card shadow-lg">
            <div class="card-header pb-0 pt-3">
                <div class="float-start">
                    <h5 class="mt-3 mb-0">Nusantara Blog UI Configurator</h5>
                </div>
                <div class="float-end mt-4">
                    <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
                        <i class="material-icons">clear</i>
                    </button>
                </div>
                <!-- End Toggle Button -->
            </div>
            <hr class="horizontal dark my-1">
            <div class="card-body pt-sm-3 pt-0">
                <!-- Sidebar Backgrounds -->
                <div>
                    <h6 class="mb-0">Sidebar Colors</h6>
                </div>
                <a href="javascript:void(0)" class="switch-trigger background-color">
                    <div class="badge-colors my-2 text-start">
                        <span class="badge filter bg-gradient-primary active" data-color="primary" onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-dark" data-color="dark" onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-info" data-color="info" onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-success" data-color="success" onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-warning" data-color="warning" onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-danger" data-color="danger" onclick="sidebarColor(this)"></span>
                    </div>
                </a>
                <!-- Sidenav Type -->
                <p class="text-sm d-xl-none d-block mt-2">You can change the sidenav type just on desktop view.</p>
                <!-- Navbar Fixed -->
                <div class="mt-3 d-flex">
                    <h6 class="mb-0">Navbar Fixed</h6>
                    <div class="form-check form-switch ps-0 ms-auto my-auto">
                        <input class="form-check-input mt-1 ms-auto" type="checkbox" id="navbarFixed" onclick="navbarFixed(this)">
                    </div>
                </div>
                <hr class="horizontal dark my-3">
                <div class="mt-2 d-flex">
                    <h6 class="mb-0">Light / Dark</h6>
                    <div class="form-check form-switch ps-0 ms-auto my-auto">
                        <input class="form-check-input mt-1 ms-auto" type="checkbox" id="dark-version" onclick="darkMode(this)">
                    </div>
                </div>
                <hr class="horizontal dark my-sm-4">
            </div>
        </div>
    </div>
    <!--   Core JS Files   -->
    <script src="{{ asset('material-dashboard-template/assets/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('material-dashboard-template/assets/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('material-dashboard-template/assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('material-dashboard-template/assets/js/plugins/smooth-scrollbar.min.js') }}"></script>
    <script src="{{ asset('material-dashboard-template/assets/js/plugins/chartjs.min.js') }}"></script>

    <script>
        var ctx = document.getElementById("chart-bars").getContext("2d");

        new Chart(ctx, {
            type: "bar",
            data: {
                labels: ["M", "T", "W", "T", "F", "S", "S"],
                datasets: [{
                    label: "Sales",
                    tension: 0.4,
                    borderWidth: 0,
                    borderRadius: 4,
                    borderSkipped: false,
                    backgroundColor: "rgba(255, 255, 255, .8)",
                    data: [50, 20, 10, 22, 50, 10, 40],
                    maxBarThickness: 6
                }, ],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index',
                },
                scales: {
                    y: {
                        grid: {
                            drawBorder: false,
                            display: true,
                            drawOnChartArea: true,
                            drawTicks: false,
                            borderDash: [5, 5],
                            color: 'rgba(255, 255, 255, .2)'
                        },
                        ticks: {
                            suggestedMin: 0,
                            suggestedMax: 500,
                            beginAtZero: true,
                            padding: 10,
                            font: {
                                size: 14,
                                weight: 300,
                                family: "Roboto",
                                style: 'normal',
                                lineHeight: 2
                            },
                            color: "#fff"
                        },
                    },
                    x: {
                        grid: {
                            drawBorder: false,
                            display: true,
                            drawOnChartArea: true,
                            drawTicks: false,
                            borderDash: [5, 5],
                            color: 'rgba(255, 255, 255, .2)'
                        },
                        ticks: {
                            display: true,
                            color: '#f8f9fa',
                            padding: 10,
                            font: {
                                size: 14,
                                weight: 300,
                                family: "Roboto",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                },
            },
        });


        var ctx2 = document.getElementById("chart-line").getContext("2d");

        new Chart(ctx2, {
            type: "line",
            data: {
                labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                datasets: [{
                    label: "Mobile apps",
                    tension: 0,
                    borderWidth: 0,
                    pointRadius: 5,
                    pointBackgroundColor: "rgba(255, 255, 255, .8)",
                    pointBorderColor: "transparent",
                    borderColor: "rgba(255, 255, 255, .8)",
                    borderColor: "rgba(255, 255, 255, .8)",
                    borderWidth: 4,
                    backgroundColor: "transparent",
                    fill: true,
                    data: [50, 40, 300, 320, 500, 350, 200, 230, 500],
                    maxBarThickness: 6

                }],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index',
                },
                scales: {
                    y: {
                        grid: {
                            drawBorder: false,
                            display: true,
                            drawOnChartArea: true,
                            drawTicks: false,
                            borderDash: [5, 5],
                            color: 'rgba(255, 255, 255, .2)'
                        },
                        ticks: {
                            display: true,
                            color: '#f8f9fa',
                            padding: 10,
                            font: {
                                size: 14,
                                weight: 300,
                                family: "Roboto",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                    x: {
                        grid: {
                            drawBorder: false,
                            display: false,
                            drawOnChartArea: false,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            color: '#f8f9fa',
                            padding: 10,
                            font: {
                                size: 14,
                                weight: 300,
                                family: "Roboto",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                },
            },
        });

        var ctx3 = document.getElementById("chart-line-tasks").getContext("2d");

        new Chart(ctx3, {
            type: "line",
            data: {
                labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                datasets: [{
                    label: "Mobile apps",
                    tension: 0,
                    borderWidth: 0,
                    pointRadius: 5,
                    pointBackgroundColor: "rgba(255, 255, 255, .8)",
                    pointBorderColor: "transparent",
                    borderColor: "rgba(255, 255, 255, .8)",
                    borderWidth: 4,
                    backgroundColor: "transparent",
                    fill: true,
                    data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
                    maxBarThickness: 6

                }],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index',
                },
                scales: {
                    y: {
                        grid: {
                            drawBorder: false,
                            display: true,
                            drawOnChartArea: true,
                            drawTicks: false,
                            borderDash: [5, 5],
                            color: 'rgba(255, 255, 255, .2)'
                        },
                        ticks: {
                            display: true,
                            padding: 10,
                            color: '#f8f9fa',
                            font: {
                                size: 14,
                                weight: 300,
                                family: "Roboto",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                    x: {
                        grid: {
                            drawBorder: false,
                            display: false,
                            drawOnChartArea: false,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            color: '#f8f9fa',
                            padding: 10,
                            font: {
                                size: 14,
                                weight: 300,
                                family: "Roboto",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                },
            },
        });
    </script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{ asset('material-dashboard-template/assets/js/material-dashboard.min.js?v=3.1.0') }}"></script>


    <script>
        const title = document.querySelector('#title');
        const slug = document.querySelector('#slug');

        title.addEventListener('change', function() {
            fetch('/createSlug?title=' + title.value)
                .then(response => response.json())
                .then(data => slug.value = data.slug)
        });

        document.addEventListener('trix-file-accept', function(e) {
            e.preventDefault();
        });
    </script>

    <script>
        function previewImage() {
            const image = document.querySelector('#blog-Image');
            const imgPreview = document.querySelector('.img-preview');
            const oldImg = document.querySelector('#image-foto')

            imgPreview.style.display = 'block';
            imgPreview.style.marginBottom = '10px';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }


            if (oldImg) {
                oldImg.parentNode.removeChild(oldImg);
            }

        }
    </script>

</body>

</html>