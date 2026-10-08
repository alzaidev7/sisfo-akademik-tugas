@extends('layouts.app')

@section('title', 'Data Kelas - SISFO Akademik')

@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data Kelas</h1>

    <a href="{{ route('kelas.create') }}" class="btn btn-primary">
        <i class="fas fa-plus fa-sm"></i>
        Tambah Kelas
    </a>
</div>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="card shadow mb-4">

    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">
            Daftar Kelas
        </h6>
    </div>

    <div class="card-body">

        <div class="table-responsive">

            <table class="table table-bordered" width="100%" cellspacing="0">

                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Kelas</th>
                        <th>Jurusan</th>
                        <th>Tingkat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse($kelas as $item)

                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->nama_kelas }}</td>
                            <td>{{ $item->jurusan }}</td>
                            <td>{{ $item->tingkat }}</td>

                            <td>

                                <a href="{{ route('kelas.edit', $item->id) }}"
                                   class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i>
                                    Edit
                                </a>

                                <form action="{{ route('kelas.destroy', $item->id) }}"
                                      method="POST"
                                      class="d-inline">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="btn btn-danger btn-sm"
                                            onclick="return confirm('Yakin ingin menghapus data ini?')">

                                        <i class="fas fa-trash"></i>
                                        Hapus

                                    </button>

                                </form>

                            </td>
                        </tr>

                    @empty

                        <tr>
                            <td colspan="5" class="text-center">
                                Belum ada data kelas.
                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection