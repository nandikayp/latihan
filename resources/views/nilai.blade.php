@extends('master')
@section('konten')
    <h2 class="text text-primary" style="display: flex; text-align:center; margin-bottom:30px; margin-left:8rem">Data Nilai
    </h2>
    @if (session()->has('error'))
        <div class="alert alert-danger col-md-3" style="margin-left: 7rem" role="alert">
            {{ session('error') }}
        </div>
    @endif
    <section class="intro">
        <div class="mask d-flex align-items-start h-100">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-10">
                        <div class="card bg-dark shadow-2-strong">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-dark table-borderles mb-0">
                                        <thead>
                                            <tr>
                                                <th scope="col">Id Soal</th>
                                                <th scope="col">Id User</th>
                                                <th scope="col">Jawaban Tugas</th>
                                                <th scope="col">Nilai</th>
                                                <th scope="col" style="padding-left:1rem;">Status</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($nilai as $n)
                                                <tr>
                                                    <th scope="row">{{ $loop->iteration }}</th>
                                                    <td>{{ $n->name }}</td>
                                                    <td>{{ $n->jawabansoal }}</td>
                                                    <td> <button class="btn btn-dark " data-bs-toggle="modal"
                                                            data-bs-target="#UpdateStatus{{ $n->idnilai }}">
                                                            {{ $n->nilai }}
                                                        </button></td>
                                                    <td>
                                                        @if (Auth::user()->role == 'guru')
                                                            @if ($n->status != 'selesai')
                                                                <button class="btn btn-warning ">
                                                                    {{ $n->status }}
                                                                </button>
                                                            @elseif($n->status == 'selesai')
                                                                <button class="btn btn-success">
                                                                    {{ $n->status }}
                                                                </button>
                                                            @endif
                                                        @else
                                                            <button class="btn btn-primary">{{ $n->status }}</button>
                                                        @endif
                                                    </td>
                                                </tr>
                                                <div class="modal fade" id="UpdateStatus{{ $n->idnilai }}" tabindex="-1"
                                                    aria-labelledby="exampleModalLabel" aria-hidden="true">

                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Beri
                                                                    Nilai
                                                                </h1>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="/nilai/storeupdate" method="post"
                                                                    class="form-floating">

                                                                    @csrf
                                                                    <input type="hidden" name="idnilai" id="idnilai"
                                                                        readonly class="form-control"
                                                                        value="{{ $n->idnilai }}">

                                                                    <div class="">
                                                                        <label class="mb-2" for="floatingInputValue">Nilai
                                                                            Tugas</label>

                                                                        <input type="number" name="nilai"
                                                                            required="required" class="form-control"
                                                                            value="{{ $n->nilai }}" max="100">

                                                                    </div>
                                                                    <div class="modal-footer">

                                                                        <button type="button" class="btn btn-danger"
                                                                            data-bs-dismiss="modal">Tutup</button>

                                                                        <button type="submit"
                                                                            class="btn btn-success">Simpan</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
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
    </section>
@endsection
