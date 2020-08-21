@extends('layouts.admin')

@section('breadcrumb')
    {!! cui()->breadcrumb([
        'Home' => route('home'),
        'Peminjaman' => route('peminjaman.index'),
        'Blacklist' => '#',
    ]) !!}
@endsection

@section('content')
<div class="row ">
        <div class="col-8">
            <div class="card">

                {{-- CARD HEADER--}}
                <div class="card-header">
                    <strong><i class="cil-ban"></i> List Blacklist</strong>
                </div>

                {{-- CARD BODY--}}
                <div class="card-body">

                    <table class="{{ config('style.table') }}">
                        <thead class="{{ config('style.thead') }}">
                        <tr>
                            <th class="text-center">No.</th>
                            <th class="text-center">NIM</th>
                            <th class="text-center">Nama</th>
                            <th class="text-center">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($mahasiswa as $m)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td class="text-center">{{ $m->nim }}</td>
                                <td class="text-center">{{ $m->nama_mahasiswa }}</td>
                                <td class="text-center">
                                    <a class="btn btn-danger" onclick="return confirm('Hapus dari Blacklist?')" href="{{route('peminjaman.unblacklist', $m->id)}}"><i class="cil-trash"></i></a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5">
                                    <h6 class="text-center">Tidak ada Blacklist</h6>
                                </td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>

                </div><!--card-body-->
            </div><!--card-->
        </div><!--col-->
    </div><!--row-->
@endsection
