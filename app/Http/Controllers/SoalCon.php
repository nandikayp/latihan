<?php
namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class SoalCon extends Controller
{
    public function index()
    {

        $soal = DB::table('soal')
            ->leftJoin('nilai', function ($join) {
                $join->on('soal.idsoal', '=', 'nilai.idsoal')
                    ->where('nilai.iduser', '=', Auth::user()->id);
            })
            ->select('soal.*', DB::raw('IFNULL(nilai.iduser, 0) AS isAnswered'))
            ->get();

        return view('soal', ['soal' => $soal]);
    }
    public function storeinput(Request $request)
    {
        if ($request->bataswaktu < date('Y-m-d')) {
            return redirect()->back()->with('error', 'Waktu Tidak Valid');
        }
        // insert data ke table soal
        DB::table('soal')->insert([
            'judulmateri' => $request->judulmateri,
            'deskripsisoal' => $request->deskripsisoal,
            'bataswaktu' => $request->bataswaktu
        ]);
        // alihkan halaman ke route soal
        Session::flash('message', 'Input Berhasil.');
        return redirect('/soal');
    }
    public function storeupdate(Request $request)
    {
        // update data soal
        DB::table('soal')->where('idsoal', $request->idsoal)->update([
            'judulmateri' => $request->judulmateri,
            'deskripsisoal' => $request->deskripsisoal,
            'bataswaktu' => $request->bataswaktu
        ]);
        // alihkan halaman ke halaman produk
        return redirect('/soal');

    }
    public function delete($id)
    {
        // mengambil data user berdasarkan id yang dipilih
        DB::table('soal')->where('idsoal', $id)->delete();
        return redirect('/soal');
    }
}
