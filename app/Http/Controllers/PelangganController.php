<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan2301010033;
use App\Models\Pelanggan_2301010033s;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search');
        $pelanggan = Pelanggan_2301010033s::where('kode', 'LIKE', "%{$search}%")
            ->orWhere('nama_pelanggan', 'LIKE', "%{$search}%")
            ->orWhere('alamat', 'LIKE', "%{$search}%")
            ->orWhere('jenis_kelamin', 'LIKE', "%{$search}%")
            ->orWhere('tanggal_lahir', 'LIKE', "%{$search}%")
            ->paginate(10);
        // function ini digunakan untuk menampilkan halaman utama barang
        return view('pages.pelanggan.index', [
            'pelanggan' => $pelanggan,
            'search' => $search
        ]);
    }

    public function create() {
        // function ini digunakan untuk menampilkan halaman tambah barang

        return view('pages.pelanggan.create');
    }

    public function store(Request $request) {
        // function ini digunakan untuk menyimpan data barang baru
        Pelanggan_2301010033s::create([
            'kode'=> $request->kode,
            'nama_pelanggan'=> $request->nama_pelanggan,
            'alamat'=> $request->alamat,
            'jenis_kelamin'=> $request->jenis_kelamin,
            'tanggal_lahir'=> $request->tanggal_lahir,
        ]);
        return redirect()->route('pelanggan.index')->with('created','Data pelanggan berhasil ditambahkan');
    }

    public function edit($pelanggan_id){
        //function ini digunakan untuk menampilkan halaman edit barang
        //Cara 1
        $pelanggan = Pelanggan_2301010033s::findOrFail($pelanggan_id);

        return view('pages.pelanggan.edit', compact('pelanggan'));

    }

    public function update(Request $request, $pelanggan_id){
        //function ini digunakan untuk mengupdate data barang
        Pelanggan_2301010033s::where('id', $pelanggan_id)->update([
            'kode'=> $request->kode,
            'nama_pelanggan'=> $request->nama_pelanggan,
            'alamat'=> $request->alamat,
            'jenis_kelamin'=> $request->jenis_kelamin,
            'tanggal_lahir'=> $request->tanggal_lahir,
            ]);
        return redirect()->route('pelanggan.index')->with('updated', 'Data barang pelanggan diupdate');
    }

    public function destroy($pelanggan_id){
        //function ini digunakan untuk menghapus data barang
        Pelanggan_2301010033s::where('id', $pelanggan_id)->delete();

        return redirect()->route('pelanggan.index')->with('deleted','Data pelanggan berhasil dihapus');
    }


    public function show($pelanggan_id){
        //function ini digunakan untuk menampilkan halaman detail barang
        $pelanggan = Pelanggan_2301010033s::where('id', $pelanggan_id)->first();
        return view('pages.pelanggan.show', compact('pelanggan'));
    }
}

