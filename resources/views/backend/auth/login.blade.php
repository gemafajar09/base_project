<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <title>Login</title>
    <link rel="stylesheet" href="{{asset('/login/style.scss')}}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<link rel="stylesheet" href="{{asset('/login/style.css')}}">
<body>
    <div id="card">
        <form action="{{route('login')}}" method="POST">
            @csrf
            <div class="svgContainer py-3">
                <div>
                    @include('backend.auth.svg')
                </div>
            </div>
            
            <div class="form-group">
                <input type="text" id="email" name="username" required class="form-control">
                <span class="indicator"></span>
            </div>	
            <div class="form-group">
                <input type="password" id="password" name="password" required class="form-control">
            </div>
            <div align="center">
                <button type="submit">Log In</button>
            </div>
        </form>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.3/TweenMax.min.js"></script>
    <script src="{{asset('/login/style.js')}}"></script>
</body>
</html>