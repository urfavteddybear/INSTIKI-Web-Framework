@extends('layouts.master')

@section('content')
    <div class="px-5 py-5">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h1>Form Edit Data Pelanggan</h1>
                </div>
                <form action="{{ route('pelanggan.update', $pelanggan->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <hr>
                    <div class="form-group">
                        <label for="kode">Kode</label>
                        <input type="text" name="kode" id="kode" class="form-control" value="{{ old('kode', $pelanggan->kode) }}" placeholder="Masukkan kode pelanggan">
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama Pelanggan</label>
                        <input type="text" name="nama_pelanggan" id="nama_pelanggan" class="form-control" value="{{ old('kode', $pelanggan->nama_pelanggan) }}" placeholder="Masukkan nama pelanggan">
                    </div>
                    <div class="form-group">
                        <label for="harga">Alamat</label>
                        <input type="text" name="alamat" id="alamat" class="form-control" value="{{ old('kode', $pelanggan->alamat) }}"placeholder="Masukkan alamat">
                    </div>
                    <div class="form-group">
                        <label for="harga">Jenis Kelamin</label>
                        <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                            <option value="">Pilih Jenis Kelamin</option>
                            <option value="Laki-laki" {{ old('jenis_kelamin', $pelanggan->jenis_kelamin) == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                            <option value="Perempuan" {{ old('jenis_kelamin', $pelanggan->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tanggal_lahir">Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control" value="{{ old('kode', $pelanggan->tanggal_lahir) }}" placeholder="Masukkan tanggal lahir">
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