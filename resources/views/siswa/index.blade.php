@extends('layouts.app')

@section('title', 'Data Siswa - SISFO Akademik')

@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">

    <h1 class="h3 mb-0 text-gray-800">
        Data Siswa
    </h1>

    <a href="{{ route('siswa.create') }}" class="btn btn-primary">
        <i class="fas fa-plus fa-sm"></i>
        Tambah Siswa
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
            Daftar Siswa
        </h6>

    </div>

    <div class="card-body">

        <div class="table-responsive">

            <table class="table table-bordered" width="100%" cellspacing="0">

                <thead>

                    <tr>
                        <th>No</th>
                        <th>NIS</th>
                        <th>Nama Siswa</th>
                        <th>Jenis Kelamin</th>
                        <th>Kelas</th>
                        <th>No HP</th>
                        <th>Aksi</th>
                    </tr>

                </thead>

                <tbody>

                    @forelse($siswa as $item)

                        <tr>

                            <td>
                                {{ $loop->iteration }}
                            </td>

                            <td>
                                {{ $item->nis }}
                            </td>

                            <td>
                                {{ $item->nama_siswa }}
                            </td>

                            <td>
                                {{ $item->jenis_kelamin }}
                            </td>

                            <td>
                                {{ $item->kelas->nama_kelas }}
                            </td>

                            <td>
                                {{ $item->no_hp ?? '-' }}
                            </td>

                            <td>

                                <a href="{{ route('siswa.edit', $item->id) }}"
                                   class="btn btn-warning btn-sm">

                                    <i class="fas fa-edit"></i>
                                    Edit

                                </a>

                                <form action="{{ route('siswa.destroy', $item->id) }}"
                                      method="POST"
                                      class="d-inline">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="btn btn-danger btn-sm"
                                            onclick="return confirm('Yakin ingin menghapus data siswa ini?')">

                                        <i class="fas fa-trash"></i>
                                        Hapus

                                    </button>

                                </form>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="7" class="text-center">
                                Belum ada data siswa.
                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection