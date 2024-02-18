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


    <style>
        .author .photo {
            margin-right: 10px;
        }

        .author .photo img {
            width: 40px;
            border-radius: 50%;
            margin-bottom: 0;
        }

        .author .name h3 {
            margin: 0;
            padding: 0;
            font-size: 15px;
            font-family: var(--font-secondary);
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
                        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">{{ $judul2 }}</li>
                    </ol>
                    <h6 class="font-weight-bolder mb-0">{{ $judul3 }}</h6>
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
                                    <i class="sidenav-toggler-line" style="color: black;"></i>
                                    <i class="sidenav-toggler-line" style="color: black;"></i>
                                    <i class="sidenav-toggler-line" style="color: black;"></i>
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
        <div class="container-fluid py-4">
            @if(session()->has('blog_sukses'))
            <div class="alert alert-success alert-dismissible text-white fade show" role="alert">
                <span class="alert-icon align-middle">
                    <span class="material-icons text-md">
                        thumb_up_off_alt
                    </span>
                </span>
                <span class="alert-text"><strong>{{ session('blog_sukses') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            @endif
            @if(session()->has('hapus_blog'))
            <div class="alert alert-danger alert-dismissible text-white fade show" role="alert">
                <span class="alert-icon align-middle">
                    <span class="material-icons text-md">
                        thumb_up_off_alt
                    </span>
                </span>
                <span class="alert-text"><strong>{{ session('hapus_blog') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            @endif
            @if(session()->has('lengkapi'))
            <div class="alert alert-danger alert-dismissible text-white fade show" role="alert">
                <span class="alert-icon align-middle">
                    <span class="material-icons text-md">
                        thumb_up_off_alt
                    </span>
                </span>
                <span class="alert-text"><strong>{{ session('lengkapi') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            @endif
            @if(session()->has('EditBlog'))
            <div class="alert alert-danger alert-dismissible text-white fade show" role="alert">
                <span class="alert-icon align-middle">
                    <span class="material-icons text-md">
                        thumb_up_off_alt
                    </span>
                </span>
                <span class="alert-text"><strong>{{ session('EditBlog') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            @endif
            @if(session()->has('editjudulblog'))
            <div class="alert alert-warning alert-dismissible text-white fade show" role="alert">
                <span class="alert-icon align-middle">
                    <span class="material-icons text-md">
                        thumb_up_off_alt
                    </span>
                </span>
                <span class="alert-text"><strong>{{ session('editjudulblog') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            @endif
            <div class="row" style="margin-bottom: 190px;">
                <div class="col-12" style="background-color: white;">
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Bagaimana Cara Membuat Postingan Blog ?
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                <div class="accordion-body">

                                    <div class="tulisan1 mb-3">
                                        <h5 class="tulisann1"></h5>
                                    </div>

                                    <img src="{{ asset('fotopetunjukpenggunaanblog/Screenshot 2024-02-12 001509.jpg') }}" alt="" width="1000px" class="img-fluid">


                                    <div class="tulisan2 mb-3 mt-5">
                                        <h5 class="tulisann2"></h5>
                                    </div>

                                    <img src="{{ asset('fotopetunjukpenggunaanblog/tambahpostinganblog.jpg') }}" alt="" width="1000px" class="img-fluid">


                                    <div class="tulisan3 mb-3 mt-5">

                                        <h5 class="tulisann3"></h5>
                                    </div>

                                    <img src="{{ asset('fotopetunjukpenggunaanblog/tambahpostinganblog2.jpg') }}" alt="" width="1000px" class="img-fluid">



                                    <div class="tulisan4 mb-3 mt-5">

                                        <h5 class="tulisann4"></h5>
                                    </div>

                                    <img src="{{ asset('fotopetunjukpenggunaanblog/tambahblog.png') }}" alt="" width="1000px" class="img-fluid">



                                    <div class="tulisan5 mb-3 mt-5">

                                        <h5 class="tulisann5"></h5>
                                    </div>

                                    <img src="{{ asset('fotopetunjukpenggunaanblog/tambahpostinganblog5.jpg') }}" alt="" width="1000px" class="img-fluid">

                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Bagaimana Cara Mengedit Profile ?
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                <div class="accordion-body">

                                    <div class="tulisan6 mb-3">

                                        <h5 class="tulisann6"></h5>
                                    </div>

                                    <img src="{{ asset('fotopetunjukpenggunaanblog/updateprofile1.jpg') }}" alt="" width="1000px" class="img-fluid">


                                    <div class="tulisan7 mb-3 mt-5">

                                        <h5 class="tulisann7"></h5>
                                    </div>

                                    <img src="{{ asset('fotopetunjukpenggunaanblog/updateprofile2.jpg') }}" alt="" width="1000px" class="img-fluid">


                                    <div class="tulisan8 mb-3 mt-5">

                                        <h5 class="tulisann8"></h5>
                                    </div>

                                    <img src="{{ asset('fotopetunjukpenggunaanblog/profile2.png') }}" alt="" width="1000px" class="img-fluid">

                                    <div class="tulisan9 mb-3 mt-5">

                                        <h5 class="tulisann9"></h5>
                                    </div>

                                    <img src="{{ asset('fotopetunjukpenggunaanblog/profile4.jpg') }}" alt="" width="1000px" class="img-fluid">
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    Bagaimana Cara Menghapus Postingan Blog ?
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <div class="tulisan10 mb-3 mt-5">

                                        <h5 class="tulisann10"></h5>
                                    </div>

                                    <img src="{{ asset('fotopetunjukpenggunaanblog/hapusblog.jpg') }}" alt="" width="1000px" class="img-fluid">

                                    <div class="tulisan11 mb-3 mt-5">

                                        <h5 class="tulisann11"></h5>
                                    </div>

                                    <img src="{{ asset('fotopetunjukpenggunaanblog/hapusblog2.jpg') }}" alt="" width="1000px" class="img-fluid">

                                    <div class="tulisan12 mb-3 mt-5">

                                        <h5 class="tulisann12"></h5>
                                    </div>

                                    <img src="{{ asset('fotopetunjukpenggunaanblog/hapusblog3.jpg') }}" alt="" width="1000px" class="img-fluid">
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingFour">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                    Bagaimana Cara Mengedit Postingan Blog ?
                                </button>
                            </h2>
                            <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <div class="tulisan13 mb-3 mt-5">

                                        <h5 class="tulisann13"></h5>
                                    </div>

                                    <img src="{{ asset('fotopetunjukpenggunaanblog/update1.jpg') }}" alt="" width="1000px" class="img-fluid">

                                    <div class="tulisan14 mb-3 mt-5">

                                        <h5 class="tulisann14"></h5>
                                    </div>

                                    <img src="{{ asset('fotopetunjukpenggunaanblog/update2.jpg') }}" alt="" width="1000px" class="img-fluid">

                                    <div class="tulisan15 mb-3 mt-5">

                                        <h5 class="tulisann15"></h5>
                                    </div>

                                    <img src="{{ asset('fotopetunjukpenggunaanblog/update4.png') }}" alt="" width="1000px" class="img-fluid">
                                    <img src="{{ asset('fotopetunjukpenggunaanblog/update7.jpg') }}" alt="" width="1000px" class="img-fluid">

                                    <div class="tulisan16 mb-3 mt-5">

                                        <h5 class="tulisann16"></h5>
                                    </div>

                                    <img src="{{ asset('fotopetunjukpenggunaanblog/update17.jpg') }}" alt="" width="1000px" class="img-fluid">

                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
            <footer class="footer mt-auto py-4">
                <div class="container-fluid">
                    <div class="row align-items-center justify-content-lg-between">
                        <div class="col-lg-6 mb-lg-0 mb-4">
                            <div class="copyright text-center text-sm text-muted text-lg-start">
                                © <script>
                                    document.write(new Date().getFullYear())
                                </script>,
                                made with <i class="fa fa-heart"></i> by
                                <p class="font-weight-bold d-inline">Nusantara Blog</p>
                            </div>
                        </div>
                        <div class="col-lg-6">

                        </div>
                    </div>
                </div>
            </footer>
        </div>
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


    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/TextPlugin.min.js"></script>

    <script>
        gsap.registerPlugin(TextPlugin)

        const loginMessage1 = '1. Buka Website Lalu Pilih Postingan Blog Saya';

        gsap.to('.tulisann1', {
            duration: 5,
            delay: 1,
            text: loginMessage1
        });

        const loginMessage2 = '2. Setelah itu, Klik Tambah Postingan Blog';

        gsap.to('.tulisann2', {
            duration: 5,
            delay: 1,
            text: loginMessage2
        });

        const loginMessage3 = '3. Jika Sudah, Maka Akan Tampil Halaman Tambah Postingan Blog, Pastikan Sebelum Menambah Postingan Blog, Isi Terlebih Dahulu Profile Di Halaman Profile, Agar Bisa Menambahkan Blog.';

        gsap.to('.tulisann3', {
            duration: 5,
            delay: 1,
            text: loginMessage3
        });

        const loginMessage4 = '4. Setelah Itu Inputkan, Category Blog Yang ingin Di pilih, Lalu isikan Judul Blog, Lalu Isikan Juga Name Slug Dari Blog yang ingin Anda Posting, Lalu jika sudah isi juga Tulisan Body blog Yang ingin anda posting, setelah itu isikan juga foto dan juga tanggal postingan blog, Pastikan Semua Terisi, Setelah Itu Klik Tambah Postingan Blog';

        gsap.to('.tulisann4', {
            duration: 5,
            delay: 1,
            text: loginMessage4
        });

        const loginMessage5 = '5. Setelah Selesai Maka Postingan Blog Anda Secara Otomatis, Berhasil Di Tambahkan';

        gsap.to('.tulisann5', {
            duration: 5,
            delay: 1,
            text: loginMessage5
        });

        const loginMessage6 = '1. Klik Ikon Profile Seperti Dibawah';

        gsap.to('.tulisann6', {
            duration: 5,
            delay: 1,
            text: loginMessage6
        });

        const loginMessage7 = '2. Klik Profile seperti pada gambar di bawah ini';

        gsap.to('.tulisann7', {
            duration: 5,
            delay: 1,
            text: loginMessage7
        });

        const loginMessage8 = '3. Jika Sudah Di Klik, Maka akan tampil halaman profile user, disini silahkan lengkapi semua profile anda, dan jika sudah maka klik EDIT yang ditandai dengan garis warna kuning, untuk mengedit profile anda';

        gsap.to('.tulisann8', {
            duration: 5,
            delay: 1,
            text: loginMessage8
        });

        const loginMessage9 = '4. Jika Profile Berhasil Ter Update Maka Akan Muncul Pesan Nofifikasi Update Profile Berhasil, Seperti Pada Gambar Di Bawah Ini';

        gsap.to('.tulisann9', {
            duration: 5,
            delay: 1,
            text: loginMessage9
        });

        const loginMessage10 = '1. Klik Postingan Blog Saya, Seperti Pada Gambar Di Bawah Ini';

        gsap.to('.tulisann10', {
            duration: 5,
            delay: 1,
            text: loginMessage10
        });

        const loginMessage11 = '2. Klik Hapus Postingan Blog, Seperti Pada Gambar Di Bawah Ini';

        gsap.to('.tulisann11', {
            duration: 5,
            delay: 1,
            text: loginMessage11
        });

        const loginMessage12 = '3. Jika Sudah, Maka Secara Otomatis Blog Akan Terhapus, Dan Akan Tampil Pesan Notifikasi, Seperti Pada Gambar Di bawah Ini';

        gsap.to('.tulisann12', {
            duration: 5,
            delay: 1,
            text: loginMessage12
        });

        const loginMessage13 = '1. Klik Postingan Blog Saya Seperti Pada Gambar Di Bawah Ini';

        gsap.to('.tulisann13', {
            duration: 5,
            delay: 1,
            text: loginMessage13
        });

        const loginMessage14 = '2. Lalu Jika Sudah Silahkan Pilih Postingan Blog Mana Yang Akan Diedit, Jika Sudah Maka Klik Judul Postingan Blog nya, Seperti Pada Gambar Di Bawah Ini';

        gsap.to('.tulisann14', {
            duration: 5,
            delay: 1,
            text: loginMessage14
        });

        const loginMessage15 = '3. Lalu Jika Sudah Silahkan Pilih Bagian Blog Mana Yang Ingin Diedit, Jika Sudah Maka Klik EDIT Pada Bagian Tersebut, Lalu Isikan Data Yang Ingin Anda Ubah, Jika Sudah Maka Klik Edit';

        gsap.to('.tulisann15', {
            duration: 5,
            delay: 1,
            text: loginMessage15
        });

        const loginMessage16 = '4. Lalu Jika Sudah Maka Secara Otomatis, Blog Anda Sudah Ter Edit dan Akan Muncul Pesan Bahwa Edit Berhasil, Seperti Pada Gambar Di Bawah ini';

        gsap.to('.tulisann16', {
            duration: 5,
            delay: 1,
            text: loginMessage16
        });
    </script>

</body>

</html>