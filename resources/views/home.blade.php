@extends('layouts.admin')

@section('breadcrumb')
    {!! cui()->breadcrumb([
        'Home' => route('home')
    ]) !!}
@endsection

@section('toolbar')
    {!! cui()->toolbar_btn(route('profile.show'), 'cil-user', 'Profil') !!}
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">

                </div>
            </div>
        </div>
    </div>
@endsection
