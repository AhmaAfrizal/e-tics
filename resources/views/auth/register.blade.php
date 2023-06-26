<!doctype html>
<html lang="eng">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>E-tics</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{asset('img/svg/logo.svg')}}" type="image/x-icon">

    {{-- font awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body style="font-family:poppins;">

<div class="container">
    {{-- <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> --}}

    <div class="row justify-content-center" style="height: 670px;">
        <div class="col-md-5 align-self-center">
            <div class="jumbotron p-4 shadow" style=" border-radius: 20px;">
                <div class="row justify-content-center">
                    <div class="col-6 text-center ">
                        <img src="{{asset('img/sld/contc.png')}}" style="width: 125px;" alt="...">
                        <p class="mt-2" style="color: rgb(108, 104, 104); font-size: 24px; font-weight: 600;">Register</p>
                    </div>
                </div>
                <div class="row mt-2">
                    <form action="{{ route('register') }}" method="POST">
                        @csrf
                        <div class="form-floating mb-3">
                            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" id="floatingInput" style="border-radius:15px; padding-left:20px;" placeholder="Name">
                            <label for="floatingInput" style="font-size: 13px; font-weight: 500; color: rgb(162, 162, 162);" class="ms-3">
                                Username
                            </label>
                            @error('name')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="email" name="email" id="email" class="form-control" id="floatingInput" style="border-radius:15px; padding-left:20px;" placeholder="email">
                            <label for="floatingInput" style="font-size: 13px; font-weight: 500; color: rgb(162, 162, 162);" class="ms-3">
                                Email
                            </label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" name="password" id="password" class="form-control" id="floatingPassword" style="border-radius:15px; padding-left:20px;" placeholder="Password">
                            <label for="floatingPassword" style="font-size: 13px; font-weight: 500; color: rgb(162, 162, 162);" class="ms-3">
                                Password
                            </label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" name="password_confirmation" id="password-confirm" class="form-control" id="floatingInput" style="border-radius:15px; padding-left:20px;" placeholder="Email">
                            <label for="floatingInput" style="font-size: 13px; font-weight: 500; color: rgb(162, 162, 162);" class="ms-3">
                                Connfirm password
                            </label>
                        </div>
                        <div class="form-group text-center mt-4">
                            <button class="btn btn-primary" style="width: 150px; font-weight: 700; font-size: 17px;" type="submit">
                                Daftar
                            </button>
                            <p class="mt-2">Sudah mempunyai akun? <a href="/masuk" class="text-decoration-none">masuk</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>