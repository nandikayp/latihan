@extends('master')
@section('konten')

    <head>
        <title>User</title>
    </head>

    <body>
        <h2 class="text text-primary">Data User</h2>
        <br />
        <table class="table   table-striped-columns table-hover">
            <tr class="text text-danger">
                <th>ID User</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Role</th>
                <th>Opsi</th>
            </tr>
            @foreach ($user as $u)
                <tr class="text text-secondary">
                    <td> {{ $u->id }} </td>
                    <td> {{ $u->name }} </td>
                    <td> {{ $u->email }} </td>

                    <td> {{ $u->role }} </td>
                    <td>

                        <button class="btn btn-danger" data-toggle="modal" data-
                            target="#DelUser{{ $u->id }}">Delete</button>

                    </td>
                </tr>
                <!-- Ini tampil form delete user -->

                <div class="modal fade" id="DelUser{{ $u->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">

                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus User</h1>

                            </div>
                            <div class="modal-body">
                                <form action="/user/delete/{{ $u->id }}" method="get" class="form-floating">
                                    @csrf
                                    <div>
                                        <h3>Yakin mau menghapus data <b>{{ $u->name }}</b> ?</h3>

                                    </div>
                                    <div class="modal-footer">

                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Cancel</button>

                                        <button type="submit" class="btn btn-primary">Yes</button>

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </table>
    </body>
@endsection
