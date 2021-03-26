<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="{{ url('assets/css/login.css') }}">
</head>
<body>

<!-- Content -->
<div class="container">
    <div class="row content">
        <div class="col-md-6 mb-3">
            <img src="assets/img/login/login.png" alt="image" class="img-fluid">
        </div>
        <div class="col-md-6">
            <h3 class="singin-text mb-3">Sign In</h3>

            <!-- form -->
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <!-- Form grup -->
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <!-- Form grup -->
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="" class="form-control @error('password') is-invalid @enderror" value="{{ old('email') }}">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                
                <!-- buttons -->
                <button class="btn btn-class">Login</button> <br> <br>
                
                <!-- Form grup -->
               
                <div class="form-group">
                    <label for=""><a href="{{ route('register') }}" class="alink">Any Account?</a></label>
                </div>

            </form>
        </div>
    </div>
</div>
