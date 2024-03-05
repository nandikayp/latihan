@extends('master')
@section('konten')
    <h2 class="text text-primary" style="display: flex; text-align:center; margin-bottom:20px; margin-left:5rem">Data Soal
    </h2>

    @if (Auth::user()->role == 'guru')
        <button class="btn btn-primary mb-3" style="margin-left: 5rem;" data-bs-toggle="modal"
            data-bs-target="#TambahSoal">Tambah Tugas</button>
    @endif

    @if (session()->has('error'))
        <div class="alert alert-danger col-md-3" style="margin-left: 5rem" role="alert">
            {{ session('error') }}
        </div>
    @endif
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
                                                <th scope="col">Id Tugas</th>
                                                <th scope="col">Judul Materi</th>
                                                <th scope="col">Deskripsi Tugas</th>
                                                <th scope="col">Tenggat Waktu</th>
                                                <th scope="col" style="padding-left: 4rem">Opsi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($soal as $s)
                                                <tr>
                                                    <th scope="row">{{ $loop->iteration }}</th>
                                                    <td>{{ $s->judulmateri }}</td>
                                                    <td>{{ $s->deskripsisoal }}</td>
                                                    <td>{{ $s->bataswaktu }}</td>
                                                    <td>
                                                        <div class="button-container" style="display: flex; gap:10px;">
                                                            @if (Auth::user()->role == 'guru')
                                                                <div class=""></div>
                                                                <button class="btn btn-success" data-bs-toggle="modal"
                                                                    data-bs-target="#EditSoal{{ $s->idsoal }}">Edit</button>
                                                                |
                                                                <form action="/soal/delete/{{ $s->idsoal }}">
                                                                    <button type="submit" class="btn btn-danger"
                                                                        onclick="return confirm('Apakah Ingin Menghapus Data')">Delete</button>
                                                                </form>
                                                            @endif
                                                            @if (Auth::user()->role == 'siswa')
                                                                @if ($s->isAnswered > 0)
                                                                    <span>selesai</span>
                                                                @else
                                                                    @if ($s->bataswaktu <= date('Y-m-d'))
                                                                        <span class="text-white">waktu habis</span>
                                                                    @else
                                                                        <button class="btn btn-info" data-bs-toggle="modal"
                                                                            data-bs-target="#WorkSoal{{ $s->idsoal }}">Kerjakan</button>
                                                                    @endif
                                                                @endif
                                                            @endif
                                                        </div>
                                                    </td>
                                                </tr>
                                                <div class="modal fade" id="EditSoal{{ $s->idsoal }}" tabindex="-1"
                                                    aria-labelledby="exampleModalLabel" aria-hidden="true">

                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Update
                                                                    Tugas</h1>

                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="/soal/storeupdate" method="post"
                                                                    class="form-floating">

                                                                    @csrf
                                                                    <input type="hidden" name="idsoal" id="kode"
                                                                        readonly class="form-control"
                                                                        value="{{ $s->idsoal }}">
                                                                    <div class="">
                                                                        <label for="floatingInputValue" class="mb-2">Judul
                                                                            Materi</label>

                                                                        <input type="text" name="judulmateri"
                                                                            required="required" class="form-control"
                                                                            value="{{ $s->judulmateri }}">

                                                                    </div>
                                                                    <div class="">
                                                                        <label class="mt-3 mb-2"
                                                                            for="floatingInputValue">Deskripsi

                                                                            Tugas</label>

                                                                        <br>
                                                                        <textarea name="deskripsisoal" id="" cols="50" rows="10">{{ $s->deskripsisoal }}</textarea>

                                                                    </div>
                                                                    <div class="">
                                                                        <label for="floatingInputValue">Tenggat

                                                                            Waktu</label>

                                                                        <input type="date" name="bataswaktu"
                                                                            required="required" class="form-control"
                                                                            value="{{ $s->bataswaktu }}">

                                                                    </div>
                                                                    <div class="modal-footer">

                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-dismiss="modal">Close</button>

                                                                        <button type="submit" class="btn btn-primary">Save
                                                                            Updates</button>

                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                {{-- Kerjakan Soal --}}
                                                <div class="modal fade" id="WorkSoal{{ $s->idsoal }}" tabindex="-1"
                                                    aria-labelledby="exampleModalLabel"aria-hidden="true">

                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Kerjakan
                                                                    Tugas</h1>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="/nilai/storeinput" method="post"
                                                                    class="form-floating">

                                                                    @csrf
                                                                    <input type="hidden" name="idsoal" id="kode"
                                                                        readonly class="form-control"
                                                                        value="{{ $s->idsoal }}">
                                                                    <div class="form-floating">
                                                                        <p>Judul Materi : {{ $s->judulmateri }}</p>

                                                                    </div>
                                                                    <div class="form-floating">
                                                                        <p>Deskripsi Tugas : {{ $s->deskripsisoal }}</p>

                                                                    </div>
                                                                    <div class="form-floating">
                                                                        <p>Batas Waktu : {{ $s->bataswaktu }}</p>
                                                                    </div>
                                                                    <div class="">
                                                                        <label class="mb-2"
                                                                            for="floatingInputValue">Jawaban</label>
                                                                        <br>
                                                                        <textarea name="jawabansoal" id="" cols="70" rows="10"></textarea>
                                                                    </div>

                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-danger"
                                                                            data-bs-dismiss="modal">Tutup</button>

                                                                        <button type="submit"
                                                                            class="btn btn-success">Simpan Jawaban</button>

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
        </div>
    </section>

    {{-- Update Soal --}}


    {{-- Tambah Soal --}}

    <div class="modal fade" id="TambahSoal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id ="exampleModalLabel">Tambah Tugas</h1>

                </div>
                <div class="modal-body">
                    <form action="/soal/storeinput" method="post" class="form-floating" enctype="multipart/form-data">

                        @csrf
                        <div class="">
                            <label for="floatingInputValue" class="mb-2">Judul Materi</label>
                            <input type="text" name="judulmateri" required="required" class="form-control">
                        </div>
                        <div class="">
                            <label for="floatingInputValue" class="my-3">Deskripsi Tugas</label>

                            <br>
                            <textarea name="deskripsisoal" id="" cols="50" rows="10"></textarea>

                        </div>
                        <div class="">
                            <label for="floatingInputValue" class="mt-3 mb-2">Tenggat Waktu</label>

                            <input type="date" name="bataswaktu" required="required" class="form-control">

                        </div>

                        <div class="modal-footer">

                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                            <button type="submit" class="btn btn-primary">Save changes</button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
