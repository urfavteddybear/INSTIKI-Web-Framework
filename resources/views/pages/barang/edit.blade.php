@extends('layouts.master')

@section('content')
    <div class="px-5 py-5">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h1>Form Edit Data Barang</h1>
                </div>
                <form action="{{ route('barang.update', $barang->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <hr>
                    <div class="form-group">
                        <label for="kode">Kode</label>
                        <input type="text" name="kode" id="kode" class="form-control" value="{{ old('kode', $barang->kode) }}" placeholder="Masukkan kode barang">
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" id="nama" class="form-control" step="0.01" min="0.01" placeholder="Masukkan nama barang" value="{{ old('nama', $barang->nama) }}">
                    </div>
                    <div class="form-group">
                        <label for="harga">Harga</label>
                        <input type="number" name="harga" id="harga" class="form-control" placeholder="Masukkan harga barang" value="{{ old('harga', $barang->harga) }}">
                    </div>
                    <hr>
                    <div class="text-center">
                        <a href="{{ route('barang.index') }}" class="btn btn-danger">Kembali</a>
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
