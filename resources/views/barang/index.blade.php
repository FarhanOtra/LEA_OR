@extends('layouts.admin')

@section('breadcrumb')
    {!! cui()->breadcrumb([
        'Home' => route('home'),
        'Barang' => '#'
    ]) !!}
@endsection

@section('toolbar')
    {!! cui()->toolbar_btn(route('barang.create'), 'cil-address-book', 'Tambah Barang') !!}    
@endsection

@section('content')
<div class="row justify-content-center">
        <div class="col">
            <div class="card">

                {{-- CARD HEADER--}}
                <div class="card-header">
                    <strong><i class="cil-list"></i> List Barang</strong>
                </div>

                {{-- CARD BODY--}}
                <div class="card-body">

                    <table class="{{ config('style.table') }}">
                        <thead class="{{ config('style.thead') }}">
                        <tr>
                            <th class="text-center">No.</th>
                            <th class="text-center">ID Barang</th>
                            <th class="text-center">Nama Barang</th>
                            <th class="text-center">Keterangan</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($barang as $b)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td class="text-center">{{ $b->id_barang }}</td>
                                <td class="text-center">{{ $b->nama_barang }}</td>
                                <td class="text-center">{{ $b->keterangan }}</td>
                                <td class="text-center"><h5>{!! $b->status_text !!}</h5></td>
                                <td class="text-center">
                                    {!! cui()->btn_edit(route('barang.edit', [$b->id])) !!}
                                    {!! cui()->btn_delete(route('barang.destroy', [$b->id]),'Yakin Ingin Menghapus?') !!}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6">
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
