@extends('layouts.app')

@section('title', 'Data Mata Pelajaran - SISFO Akademik')

@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">

    <h1 class="h3 mb-0 text-gray-800">
        Data Mata Pelajaran
    </h1>

    <a href="{{ route('mapel.create') }}" class="btn btn-primary">
        <i class="fas fa-plus fa-sm"></i>
        Tambah Mata Pelajaran
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
            Daftar Mata Pelajaran
        </h6>

    </div>

    <div class="card-body">

        <div class="table-responsive">

            <table class="table table-bordered" width="100%" cellspacing="0">

                <thead>

                    <tr>
                        <th>No</th>
                        <th>Kode Mapel</th>
                        <th>Nama Mata Pelajaran</th>
                        <th>KKM Minimum</th>
                        <th>Aksi</th>
                    </tr>

                </thead>

                <tbody>

                    @forelse($mapel as $item)

                        <tr>

                            <td>
                                {{ $loop->iteration }}
                            </td>

                            <td>
                                {{ $item->kode_mapel }}
                            </td>

                            <td>
                                {{ $item->nama_mapel }}
                            </td>

                            <td>
                                {{ $item->kkm }}
                            </td>

                            <td>

                                <a href="{{ route('mapel.edit', $item->id) }}"
                                   class="btn btn-warning btn-sm">

                                    <i class="fas fa-edit"></i>
                                    Edit

                                </a>

                                <form action="{{ route('mapel.destroy', $item->id) }}"
                                      method="POST"
                                      class="d-inline">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="btn btn-danger btn-sm"
                                            onclick="return confirm('Yakin ingin menghapus data mata pelajaran ini?')">

                                        <i class="fas fa-trash"></i>
                                        Hapus

                                    </button>

                                </form>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="5" class="text-center">
                                Belum ada data mata pelajaran.
                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection