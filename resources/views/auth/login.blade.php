<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/login.css">
</head>
<body>
    
<!-- Content -->
<div class="container">
    <div class="row content">
        <div class="col-md-6 mb-3">
            <img src="assets/img/login.png" alt="image" class="img-fluid">
        </div>
        <div class="col-md-6">
            <h3 class="singin-text mb-3">Sign In</h3>

            <!-- form -->
            <form action="#">
                <!-- Form grup -->
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="" class="form-control">
                </div>

                <!-- Form grup -->
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="Password" name="password" id="" class="form-control">
                </div>

                <!-- remember Me -->
                <div class="form-group form-check">
                    <input type="checkbox" name="checkbox" id="checkbox" class="form-check-input">
                    <label for="checkbox" class="form-check-label">Remember Me</label>
                </div>
                
                <!-- buttons -->
                <button class="btn btn-class">Login</button> <br> <br>
                
                <!-- Form grup -->
               
                <div class="form-group">
                    <label for="password"><a href="{{route('register')}}" class="alink">Dont Any Account?</a></label>
                </div>

            </form>
        </div>
    </div>
</div>

    <!-- Boostrap -->
    <script type="text/javascript" src="assets/bootstrap/js/bootstrap.min.js"></script>

</body>
</html>