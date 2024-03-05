@extends('master')
@section('konten')
    <h2 class="text text-primary" style="display: flex; text-align:center; margin-bottom:20px; margin-left:5rem">Daftar User
    </h2>
    <section class="intro">
        <div class="mask d-flex align-items-start h-100">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-11">
                        <div class="card bg-dark shadow-2-strong">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-dark table-borderless mb-0">
                                        <thead>
                                            <tr>
                                                <th scope="col">Id User </th>
                                                <th scope="col">Nama</th>
                                                <th scope="col">Email</th>
                                                <th scope="col">Role</th>
                                                <th scope="col" class="ps-3">Opsi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($user as $u)
                                                <tr>
                                                    <th scope="row">{{ $loop->iteration }}</th>
                                                    <td>{{ $u->name }}</td>
                                                    <td>{{ $u->email }}</td>
                                                    <td>{{ $u->role }}</td>
                                                    <td>
                                                        <form action="/user/delete/{{ $u->id }}">
                                                            <button type="submit" class="btn btn-danger"
                                                                onclick="return confirm('Apakah Ingin Menghapus Data')">Delete</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection
