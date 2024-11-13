<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NamaController extends Controller
{
    public function nama($nama)
    {
        // return "Nama saya adalah: $nama";
        return view('test', compact('nama'));
    }
    public function hitung($angka1, $angka2)
    {
        $satu = $angka1;
        $dua = $angka2;

        $hasil = $angka1 * $angka2;
        return view('test', compact('hasil', 'satu', 'dua'));
        // return view('test', compact('satu'));
        // return view('test', compact('dua'));
    }

}
