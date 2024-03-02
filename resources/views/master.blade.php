<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Classroom</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="css/master.css">
    <link rel="stylesheet" href="">
</head>

<body>
    <div class="container">
        <div class="col-md-12">
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->

                    <div class="navbar-brand text-nav" href="{{ route('dashboard') }}">Aplikasi Classroom</a>

                    </div>
                    <!-- Collect the nav links, forms, and other content for toggling -->

                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                        <ul class="nav navbar-nav navbar-left">
                            @if (Auth::user()->role == 'guru')
                                <li class="nav-item"><a class="nav-link text text-primary" href="/user">User</a></li>
                            @endif

                            <li class="nav-item"><a class="nav-link" href="/soal">Tugas</a></li>

                            <li class="nav-item"><a class="nav-link" href="/nilai">Nilai</a></li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <li class="dropdown">

                                <a href="#" class="dropdown-toggle text text-secondary" data-toggle="dropdown"
                                    role="button" aria- haspopup="true" aria-expanded="false"><i
                                        class="fa fa-user text text-primary"></i>
                                    {{ Auth::user()->email }}

                                    <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a>Level: {{ Auth::user()->role }}</a>

                                    </li>
                                    <li role="separator" class="divider"></li>

                                    <li><a href="{{ route('actionlogout') }}" class="text text-danger"><i
                                                class="fa fa-power-off text text-danger"></i> Log
                                            Out</a></li>

                                </ul>
                            </li>
                        </ul>
                    </div>
                    <!-- /.navbar-collapse -->
                </div>
                <!-- /.container-fluid -->
            </nav>
            @yield('konten')
        </div>
    </div>
    </div>
</body>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</html>
