<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <title>Register</title>
    <link rel="stylesheet" href="{{asset('/login/style.scss')}}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<link rel="stylesheet" href="{{asset('/login/style.css')}}">
<body>
    <div id="card">
        <form action="{{route('admin.aksiregister')}}" method="POST">
            @csrf
            <!-- <div class="svgContainer py-3">
                <div>
                    @include('backend.auth.svg')
                </div>
            </div> -->
            <h4 class="text-center">Register</h4>
            @if(session()->has('pesan'))
            <div class="alert alert-warning" style="" id="success">
                <strong>{{ session()->get('pesan') }}</strong>
            </div>
            @endif 
            <div class="form-group">
                <input type="text" name="admin_nama" required class="form-control" placeholder="Nama">
                <span class="indicator"></span>
            </div>	
            <div class="form-group">
                <input type="text" name="username" required class="form-control" placeholder="Username">
            </div>
            <div class="form-group">
                <input type="password" name="password" required class="form-control" placeholder="Password">
            </div>
            <div class="form-group">
                <input type="password" name="repeat_password" required class="form-control" placeholder="Repeat Password">
            </div>
            <div align="center">
                <button type="submit">Register</button>
            </div>
        </form>
    </div>
    @if (session('pesan'))
	<script>
		$('#success').show();
		setInterval(function(){ $('#success').hide(); }, 5000);
	</script>   
    @endif
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.3/TweenMax.min.js"></script>
    <script src="{{asset('/login/style.js')}}"></script>
</body>
</html>