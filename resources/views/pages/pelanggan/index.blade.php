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
                    <h1>Halaman Data Pelanggan</h1>
                    <a href="{{ route('pelanggan.create') }}" class="btn btn-primary">
                        Tambah Pelanggan
                    </a>
                </div>

                <hr>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode</th>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>Jenis Kelamin</th>
                                <th>Tanggal Lahir</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pelanggan as $i => $d)
                                <tr>
                                    <td>{{ $i + 1 }}</td>
                                    <td>{{ $d->kode }}</td>
                                    <td>{{ $d->nama_pelanggan }}</td>
                                    <td>{{ $d->alamat }}</td>
                                    <td>{{ $d->jenis_kelamin }}</td>
                                    <td>{{ $d->tanggal_lahir }}</td>
                                    <td>{{ $d->is_aktif == '1' ? 'Aktif' : 'Nonaktif' }}</td>
                                    <td>
                                        <a href=" {{ route('pelanggan.show', $d->id) }}" class="btn btn-sm btn-info">
                                            Details
                                        </a>
                                        <a href=" {{ route('pelanggan.edit', $d->id) }}" class="btn btn-sm btn-warning">
                                            Edit
                                        </a>
                                        <button type="button" class="btn btn-sm btn-danger"
                                        onclick="hapusData(`btndelete{{$d->id}}`)">
                                            Delete
                                        </button>
                                        <form action="{{route('pelanggan.destroy', $d->id)}}" method="POST" style="display: none;">
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
                        {{ $pelanggan->links('pagination::bootstrap-4') }}
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

