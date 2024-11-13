@extends('layouts.master')

@section('content')
    <div class="px-5 py-5">
        @if (session('created'))
            <div class="alert alert-success" role="alert">
                {{session('created')}}
            </div>
        @endif
        @if (session('updated'))
            <div class="alert alert-warning" role="alert">
                {{session('updated')}}
            </div>
        @endif
        @if (session('deleted'))
            <div class="alert alert-danger" role="alert">
                {{session('deleted')}}
            </div>
        @endif
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h1>Halaman Data Barang</h1>
                    <a href="{{ route('barang.create') }}" class="btn btn-primary">
                        Tambah Barang
                    </a>
                </div>

                {{-- Membuat form pencarian dengan metode GET --}}
                <form action="{{ route('barang.index') }}" method="GET">
                    <div class="input-group mb-3">
                        {{-- Membuat input text untuk menerima inputan user --}}
                        <input type="text" name="search" class="form-control" placeholder="Cari berdasarkan kode atau nama" aria-label="Cari berdasarkan kode atau nama" aria-describedby="button-addon2"
                            {{-- Membuat value dari inputan search agar dapat diisi dengan nilai yang diperoleh dari request --}}
                            value="{{ request()->query('search') }}">
                        {{-- Membuat tombol submit untuk mengirimkan request --}}
                        <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Cari</button>
                    </div>
                </form>

                <hr>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode</th>
                                <th>Nama</th>
                                <th>Gambar</th>
                                <th>Harga</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($barang as $i => $d)
                                <tr>
                                    <td>{{ $i + 1 }}</td>
                                    <td>{{ $d->kode }}</td>
                                    <td>{{ $d->nama }}</td>
                                    <td>{{ $d->gambar }}</td>
                                    <td>Rp. {{ $d->harga }}</td>
                                    <td>{{ $d->is_aktif == '1' ? 'Aktif' : 'Nonaktif' }}</td>
                                    <td>
                                        <a href=" {{ route('barang.show', $d->id) }}" class="btn btn-sm btn-info">
                                            Details
                                        </a>
                                        <a href=" {{ route('barang.edit', $d->id) }}" class="btn btn-sm btn-warning">
                                            Edit
                                        </a>
                                        <button type="button" class="btn btn-sm btn-danger"
                                        onclick="hapusData(`btndelete{{$d->id}}`)">
                                            Delete
                                        </button>
                                        <form action="{{route('barang.destroy', $d->id)}}" method="POST" style="display: none;">
                                            @csrf
                                            @method('DELETE')
                                            <button class="hidden" type="submit" style="display: none;" id="btndelete{{ $d->id }}"></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="d-flex justify-content-center mt-3">
                        {{ $barang->links('pagination::bootstrap-4') }}
                    </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script>
        function hapusData(id) {
            Swal.fire({
                title: "Apakah anda ingin menghapus data?",
                text: "Setelah dihapus data tidak dapat dipulihkan",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#3085d6",
                confirmButtonText: "Iya, Hapus!",
                cancelButtonText: "Batal"
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById(id).click();
                    }
                });
        }
    </script>
@endpush

