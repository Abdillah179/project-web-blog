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
</head>

<body class="g-sidenav-show bg-gray-200">
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
    <div class="main-content position-relative max-height-vh-100 h-100">
        <!-- Navbar -->
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
            <div class="container-fluid py-1 px-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;"></a></li>
                        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Profile User</li>
                    </ol>
                    <h6 class="font-weight-bolder mb-0">Profile User</h6>
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
        <div class="container-fluid px-2 px-md-4">
            @if(session()->has('sukses'))
            <div class="alert alert-success alert-dismissible text-white fade show" role="alert">
                <span class="alert-icon align-middle">
                    <span class="material-icons text-md">
                        thumb_up_off_alt
                    </span>
                </span>
                <span class="alert-text"><strong>{{ session('sukses') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            @endif
            @if(session()->has('suksess'))
            <div class="alert alert-success alert-dismissible text-white fade show" role="alert">
                <span class="alert-icon align-middle">
                    <span class="material-icons text-md">
                        thumb_up_off_alt
                    </span>
                </span>
                <span class="alert-text"><strong>{{ session('suksess') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            @endif
            <div class="page-header min-height-300 border-radius-xl mt-4" style="background-image: url('https://images.unsplash.com/photo-1531512073830-ba890ca4eba2?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80');">
                <span class="mask  bg-gradient-primary  opacity-6"></span>
            </div>
            <div class="card card-body mx-3 mx-md-4 mt-n6 card-profile-bottom">
                <div class="row gx-4">
                    <div class="col-auto">
                        <div class="avatar avatar-xl position-relative">

                            @if(auth()->user()->image == 'default.jpg')
                            <img src="{{ asset('image/profile/' . auth()->user()->image) }}" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
                            @else
                            <img src="{{ asset('storage/' . auth()->user()->image) }}" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
                            @endif

                        </div>
                        <div class="col-md-4">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn bg-gradient-info btn-block" data-bs-toggle="modal" data-bs-target="#exampleModalSignUp">
                                Edit Foto
                            </button>
                        </div>
                        <div class="modal fade" id="exampleModalSignUp" tabindex="-1" role="dialog" aria-labelledby="exampleModalSignTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                                <div class="modal-content">
                                    <div class="modal-body p-0">
                                        <div class="card card-plain">
                                            <!-- <div class="card-header pb-0 text-left">
                                                <h3 class="font-weight-bolder text-primary text-gradient">Join us today</h3>
                                                <p class="mb-0">Enter your email and password to register</p>
                                            </div> -->
                                            <div class="card-body pb-3">
                                                @if(auth()->user()->image == 'default.jpg')

                                                @else
                                                <form action="/postdeletefotoprofileuser/{{ auth()->user()->id }}" method="post" class="d-inline">
                                                    @method('delete')
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger">Hapus Foto</button>
                                                </form>
                                                @endif
                                                <form role="form text-left" action="/posteditfotoprofile" method="post" enctype="multipart/form-data">
                                                    @csrf

                                                    <div class="input-group input-group-outline my-3">
                                                        <img class="img-preview img-fluid">
                                                        @if(auth()->user()->image)
                                                        <img src="{{ asset('storage/' . auth()->user()->image) }}" alt="" class="img-fluid d-block mb-4" id="image-foto">
                                                        @endif
                                                        <label class="form-label"></label>
                                                        <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" value="{{ auth()->user()->image }}" onchange="previewImage()" id="formFile">

                                                        @error('image')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror
                                                    </div>
                                                    <div class="text-center">
                                                        <button type="submit" class="btn bg-gradient-primary btn-lg btn-rounded w-100 mt-4 mb-0">Edit</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto my-auto">
                        <div class="h-100">
                            <h5 class="mb-1">
                                {{ auth()->user()->name }}
                            </h5>
                        </div>
                    </div>
                </div>
                <div class="container-fluid py-4">
                    <div class="row">
                        <form action="/postprofile" method="post">
                            @csrf

                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header pb-0">
                                        <div class="d-flex align-items-center">
                                            <p class="mb-0">Edit Profile</p>
                                            <button type="submit" class="btn btn-primary btn-sm ms-auto">Edit</button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <p class="text-uppercase text-sm">User Information</p>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="input-group input-group-static my-3">
                                                    <label for="name" class="ms-0">Nama Lengkap</label>
                                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ auth()->user()->name }}" id="name">

                                                    @error('name')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-group input-group-static my-3">
                                                    <label for="email" class="ms-0">Email</label>
                                                    <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ auth()->user()->email }}" readonly id="email">


                                                    @error('email')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-group input-group-static my-3">
                                                    <label for="no_telepon" class="ms-0">No Telepon</label>
                                                    <input type="text" name="no_telepon" class="form-control @error('no_telepon') is-invalid @enderror" value="{{ auth()->user()->no_telepon }}" id="no_telepon">


                                                    @error('no_telepon')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <hr class=" horizontal dark">
                                        <p class="text-uppercase text-sm">Contact Information</p>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="input-group input-group-static my-3">
                                                    <label for="alamat" class="ms-0">Address</label>
                                                    <input type="text" name="alamat" class="form-control @error('no_telepon') is-invalid @enderror" value="{{ auth()->user()->alamat }}" id="alamat">


                                                    @error('alamat')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="input-group input-group-static my-3">
                                                    <label for="kota" class="ms-0">City</label>
                                                    <input type="text" name="kota" class="form-control @error('no_telepon') is-invalid @enderror" value="{{ auth()->user()->kota }}" id="kota">


                                                    @error('kota')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="input-group input-group-static my-3">
                                                    <label for="negara" class="ms-0">Country</label>
                                                    <input type="text" name="negara" class="form-control @error('negara') is-invalid @enderror" value="{{ auth()->user()->negara }}" id="negara">


                                                    @error('negara')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="input-group input-group-static my-3">
                                                    <label for="kode_pos" class="ms-0">Postal Code</label>
                                                    <input type="text" name="kode_pos" class="form-control @error('kode_pos') is-invalid @enderror" value="{{ auth()->user()->kode_pos }}" id="kode_pos">


                                                    @error('kode_pos')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <hr class="horizontal dark">
                                        <p class="text-uppercase text-sm">About me</p>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="input-group input-group-static my-3">
                                                    <label for="tentang_saya" class="ms-0">About Me</label>
                                                    <input type="text" name="tentang_saya" class="form-control @error('tentang_saya') is-invalid @enderror" value="{{ auth()->user()->tentang_saya }}" id="tentang_saya">


                                                    @error('tentang_saya')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
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
        function previewImage() {
            const image = document.querySelector('#formFile');
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