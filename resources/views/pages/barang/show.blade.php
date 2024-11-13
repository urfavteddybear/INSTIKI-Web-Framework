@extends('layouts.master')

@section('content')
    <div class="px-5 py-5">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h1>Detail Data Barang</h1>
                </div>
                <hr>
                <table class="table table-condensed">
                    <tbody>
                        <tr>
                            <td>Kode</td>
                            <td>:</td>
                            <td>{{$barang->kode}}</td>
                        </tr>
                        <tr>
                            <td>Nama</td>
                            <td>:</td>
                            <td>{{$barang->nama}}</td>
                        </tr>
                        <tr>
                            <td>Harga</td>
                            <td>:</td>
                            <td>{{$barang->harga}}</td>
                        </tr>
                    </tbody>
                </table>
                <hr>
            </div>
        </div>
    </div>
@endsection
