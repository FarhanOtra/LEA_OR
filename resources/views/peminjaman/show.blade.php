@extends('layouts.admin')

@section('breadcrumb')
    {!! cui()->breadcrumb([
        'Home' => route('home'),
        'Peminjaman' => route('peminjaman.index'),
        'Detail' => '#'
    ]) !!}
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col">
            <div class="row">
            <div class="col-md-10">
                    <div class="card">

                        {{-- CARD HEADER--}}
                        <div class="card-header">
                          <strong> <i class="cil-zoom"></i> Detail Peminjaman</strong>
                        </div>

                        {{-- CARD BODY--}}
                        <div class="card-body">
                            @include('peminjaman._detail')
                        </div>

                        {{--CARD FOOTER--}}
                        <div class="card-footer">

                        </div>

                    </div>
                </div>

            </div>

        </div>
    </div>
@endsection