@extends('layouts.app')

@section('title', 'Data Nilai - SISFO Akademik')

@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">

    <h1 class="h3 mb-0 text-gray-800">
        Data Nilai Siswa
    </h1>

    <a href="{{ route('nilai.create') }}" class="btn btn-primary">
        <i class="fas fa-plus fa-sm"></i>
        Tambah Nilai
    </a>

</div>

@if (session('success'))

    <div class="alert alert-success">
        {{ session('success') }}
    </div>

@endif

<div class="card shadow mb-4">

    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">
            Daftar Nilai Siswa
        </h6>
    </div>

    <div class="card-body">

        <div class="table-responsive">

            <table class="table table-bordered" width="100%" cellspacing="0">

                <thead>
                    <tr>
                        <th>No</th>
                        <th>Siswa</th>
                        <th>Mata Pelajaran</th>
                        <th>Guru</th>
                        <th>Tugas</th>
                        <th>UTS</th>
                        <th>UAS</th>
                        <th>Nilai Akhir</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse ($nilai as $item)

                        <tr>

                            <td>{{ $loop->iteration }}</td>

                            <td>
                                {{ $item->siswa->nama_siswa }}
                            </td>

                            <td>
                                {{ $item->mapel->nama_mapel }}
                            </td>

                            <td>
                                {{ $item->guru->nama_guru }}
                            </td>

                            <td>
                                {{ $item->tugas }}
                            </td>

                            <td>
                                {{ $item->uts }}
                            </td>

                            <td>
                                {{ $item->uas }}
                            </td>

                            <td>
                                <strong>
                                    {{ number_format($item->nilai_akhir, 2) }}
                                </strong>
                            </td>

                            <td>

                                @if ($item->nilai_akhir >= $item->mapel->kkm)

                                    <span class="badge badge-success">
                                        Lulus
                                    </span>

                                @else

                                    <span class="badge badge-danger">
                                        Tidak Lulus
                                    </span>

                                @endif

                            </td>

                            <td>

                                <a href="{{ route('nilai.edit', $item->id) }}"
                                   class="btn btn-warning btn-sm">

                                    <i class="fas fa-edit"></i>

                                </a>

                                <form action="{{ route('nilai.destroy', $item->id) }}"
                                      method="POST"
                                      class="d-inline"
                                      onsubmit="return confirm('Yakin ingin menghapus nilai ini?');">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="btn btn-danger btn-sm">

                                        <i class="fas fa-trash"></i>

                                    </button>

                                </form>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="10" class="text-center">

                                Belum ada data nilai.

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection