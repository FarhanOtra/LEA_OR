@extends('layouts.admin')

@section('breadcrumb')
    {!! cui()->breadcrumb([
        'Home' => route('home'),
        'Peminjaman' => route('peminjaman.index'),
        'Tambah' => '#'
    ]) !!}
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col">
            <div class="row">
            <div class="col-md-10">
                    <div class="card">

                        {{ html()->form('POST', route('peminjaman.store'))->acceptsFiles()->open() }}

                        {{-- CARD HEADER--}}
                        <div class="card-header">
                          <strong> <i class="cil-people"></i> Pinjam Barang</strong>
                        </div>

                        {{-- CARD BODY--}}
                        <div class="card-body">
                            @include('peminjaman._form')
                        </div>

                        {{--CARD FOOTER--}}
                        <div class="card-footer">
                            <input type="submit" value="Pinjam" class="btn btn-primary"/>
                        </div>

                        {{ html()->form()->close() }}
                    </div>
                </div>

            </div>

        </div>
    </div>
@endsection
