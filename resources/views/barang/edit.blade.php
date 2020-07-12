@extends('layouts.admin')

@section('breadcrumb')
    {!! cui()->breadcrumb([
        'Home' => route('home'),
        'Barang' => route('barang.index'),
        'Edit' => '#'
    ]) !!}
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col">
            <div class="row">
            <div class="col-md-10">
                    <div class="card">

                        {{ html()->modelForm($barang,'PUT', route('barang.update', [$barang->id]))->acceptsFiles()->open() }}

                        {{-- CARD HEADER--}}
                        <div class="card-header">
                          <strong> <i class="cil-zoom"></i> Edit Barang</strong>
                        </div>

                        {{-- CARD BODY--}}
                        <div class="card-body">
                            @include('barang._form')
                        </div>

                        {{--CARD FOOTER--}}
                        <div class="card-footer">
                            <input type="submit" class="btn btn-primary" value="Ubah"/>
                        </div>

                        {{ html()->closeModelForm() }}
                    </div>
                </div>

            </div>

        </div>
    </div>
@endsection
