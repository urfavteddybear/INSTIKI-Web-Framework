<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index()
    {
        $barang = Barang::paginate(10);
        // function ini digunakan untuk menampilkan halaman utama barang
        return view('pages.barang.index', [
            'barang' => $barang
    ]);
    }
    public function create() {
        // function ini digunakan untuk menampilkan halaman tambah barang

        return view('pages.barang.create');
    }

    public function store(Request $request) {
        // function ini digunakan untuk menyimpan data barang baru
        Barang::create([
            'kode'=> $request->kode,
            'nama'=> $request->nama,
            'harga'=> $request->harga,
        ]);
        return redirect()->route('barang.index')->with('created','Data barang berhasil ditambahkan');
    }

    public function edit($barang_id){
        //function ini digunakan untuk menampilkan halaman edit barang
        //Cara 1
        $barang = Barang::findOrFail($barang_id);

        return view('pages.barang.edit', compact('barang'));

    }

    public function update(Request $request, $barang_id){
        //function ini digunakan untuk mengupdate data barang
        Barang::where('id', $barang_id)->update([
            'kode'=> $request->kode,
            'nama'=> $request->nama,
            'harga'=> $request->harga,
            ]);
        return redirect()->route('barang.index')->with('updated', 'Data barang berhasil diupdate');
    }

    public function destroy($barang_id){
        //function ini digunakan untuk menghapus data barang
        Barang::where('id', $barang_id)->delete();

        return redirect()->route('barang.index')->with('deleted','Data barang berhasil dihapus');
    }


    public function show($barang_id){
        //function ini digunakan untuk menampilkan halaman detail barang
        $barang = Barang::where('id', $barang_id)->first();
        return view('pages.barang.show', compact('barang'));
    }
}
