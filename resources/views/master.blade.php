<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>E-Tugas Tamansiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="/css/master.css">
</head>

<body class="overflow-hidden">
    <div class="d-flex">
        <div class="d-flex flex-column flex-shrink-0 p-3 text-bg-dark" style="width: 300px; height: 100vh;">
            <a href="{{ route('dashboard') }}"
                class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                <svg class="bi pe-none me-2" width="40" height="32">
                    <use xlink:href="#bootstrap" />
                </svg>
                <span class="fs-4">Classroom</span>
            </a>
            <hr>
            <ul class="nav nav-pills flex-column mb-auto">
                <li>
                    <a href="{{ route('dashboard') }}" class="nav-link text-white">
                        <svg class="bi pe-none me-2" width="16" height="16">
                            <use xlink:href="#speedometer2" />
                        </svg>
                        Dashboard
                    </a>
                </li>
                <li>
                    <a href="/soal" class="nav-link text-white">
                        <svg class="bi pe-none me-2" width="16" height="16">
                            <use xlink:href="#table" />
                        </svg>
                        Tugas
                    </a>
                </li>
                <li>
                    <a href="/nilai" class="nav-link text-white">
                        <svg class="bi pe-none me-2" width="16" height="16">
                            <use xlink:href="#grid" />
                        </svg>
                        Nilai
                    </a>
                </li>
                <li>
                </li>
            </ul>
            <hr>
            <div class="dropdown">
                <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="https://github.com/mdo.png" alt="" width="32" height="32"
                        class="rounded-circle me-2">
                    <strong>{{ Auth::user()->email }}</strong>
                </a>
                <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                    <li><a class="dropdown-item" href="{{ route('actionlogout') }}">Sign out</a></li>
                </ul>
            </div>
        </div>
        <div class="container" style="margin-top : 100px;">
            @yield('konten')
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</html>
