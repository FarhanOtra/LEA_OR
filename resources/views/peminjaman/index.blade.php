@extends('layouts.admin')

@section('breadcrumb')
    {!! cui()->breadcrumb([
        'Home' => route('home'),
        'Peminjaman' => '#'
    ]) !!}
@endsection

@section('toolbar')
    {!! cui()->toolbar_btn(route('peminjaman.create'), 'cil-address-book', 'Pinjam Barang') !!}    
@endsection

@section('content')
<div class="row justify-content-center">
        <div class="col">
            <div class="card">

                {{-- CARD HEADER--}}
                <div class="card-header">
                    <strong><i class="cil-list"></i> List Peminjaman Barang</strong>
                </div>

                {{-- CARD BODY--}}
                <div class="card-body">

                    <table class="{{ config('style.table') }}">
                        <thead class="{{ config('style.thead') }}">
                        <tr>
                            <th class="text-center">No.</th>
                            <th class="text-center">Tanggal Pinjam</th>
                            <th class="text-center">Tanggal Kembali</th>
                            <th class="text-center">NIM</th>
                            <th class="text-center">Nama</th>
                            <th class="text-center">Status Pengembalian</th>
                            <th class="text-center">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($peminjaman as $p)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td class="text-center">{{ $p->tanggal_pinjam }}</td>
                                <td class="text-center">{{ $p->tanggal_kembali }}</td>
                                <td class="text-center">{{ $p->mahasiswa->nim }}</td>
                                <td class="text-center">{{ $p->mahasiswa->nama_mahasiswa }}</td>
                                <td class="text-center"><h5>{!! $p->status_text !!}</h5></td>
                                <td class="text-center">
                                    {!! cui()->btn_view(route('peminjaman.show', [$p->id])) !!}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5">
                                    <h6 class="text-center">Tidak ada Barang</h6>
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
