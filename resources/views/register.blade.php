<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login – E-Tugas Tamansiswa</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/login.css">
</head>

<body>
    <div class="container wrapper">

        <div class="">
            <h2 class="text-center "><b class="text-app">Aplikasi</b><br>Classroom</h2>
            @if (session()->has('message'))
                <h1>{{ session('message') }}</h1>
            @endif
            <hr>
            @if (session('error'))
                <div class="alert alert-danger"> <b>Opps!</b>

                    {{ session('error') }} </div>
            @endif
            <form action="{{ route('actionregister') }}" method="post">
                @csrf
                <div class="form-group p-3 mt-3 ">

                    <input type="email" name="email" style="height: 5rem"
                        class=" mb-3  form-control form-field d-flex align-items-center" placeholder="Email"
                        required="">

                </div>
                <div class="form-group p-3 mt-3 ">

                    <input type="text" name="username" style="height: 5rem"
                        class=" mb-3  form-control form-field d-flex align-items-center" placeholder="Username"
                        required="">

                </div>
                <div class="form-group">
                    <input type="password" name="password" style="height: 5rem"
                        class="form-control form-field d-flex align-items-center" placeholder="Password" required="">

                </div>

                <button type="submit" class="btn btn-danger btn-block">Register</button>

                <hr>
                <p class="text-center text-peri">Sudah punya akun? <a href="/" style="font-size: medium"
                        class="te">Login</a>
                    Disini!
                </p>

            </form>
        </div>
    </div>
</body>

</html>
