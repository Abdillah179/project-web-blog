<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>{{ $judul }}</title>
    <link rel="stylesheet" href="{{ asset('Login-Template/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/template-alert.css') }}">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="icon" type="image/png" href="{{ asset('logo/logo.png') }}">
</head>

<body>
    <div class="bg-img">
        @if(session()->has('status'))
        <label>
            <input type="checkbox" class="alertCheckbox" autocomplete="off" />
            <div class="alert info">
                <span class="alertClose">X</span>
                <span class="alertText">{{ session('status')}}<br />
                    <br class="clear" /></span>
            </div>
        </label>
        @endif
        <div class="content">
            <header>Forgot Password Form</header>
            <form action="{{ route('password.email') }}" method="post">
                @csrf

                <div class="field space">
                    <span class="fa fa-user"></span>
                    <input type="email" name="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror">


                    @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="pass">
                    <a href="#"></a>
                </div>
                <div class="field">
                    <input type="submit" value="Submit">
                </div>
            </form>
            <div class="login"></div>

            <div class="signup"> already have an account ?
                <a href="/login">Sig in Now</a>
            </div>
        </div>
    </div>

    <script>
        const pass_field = document.querySelector('.pass-key');
        const showBtn = document.querySelector('.show');
        showBtn.addEventListener('click', function() {
            if (pass_field.type === "password") {
                pass_field.type = "text";
                showBtn.textContent = "HIDE";
                showBtn.style.color = "#3498db";
            } else {
                pass_field.type = "password";
                showBtn.textContent = "SHOW";
                showBtn.style.color = "#222";
            }
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>

</html>