@extends('layouts.blank')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('errors.validation')
        </div>
    </div>

    <br>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card-group">

                <div class="card text-white bg-primary py-5 d-md-down-none" style="width:44%">
                    <div class="card-body text-center">
                        <div>
                        <!-- <h2>{{ config('app.name') }}</h2> -->
                            <img src="{{ asset('/img/logo-unand.png')}}" alt="" width="50%"/>
                        </div>
                    </div>
                </div>


                <div class="card p-4">
                    <div class="card-body">
                        <h1>Login</h1>

                        <p class="text-muted">Masuk ke akun Anda</p>

                        <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                            {{ csrf_field() }}

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="cil-user"></i>
                                    </span>
                                </div>
                                <label for="username"></label>
                                <input type="text" name="username" id="username"
                                       class="form-control {{ $errors->has('username')? " is-invalid": "" }}"
                                       value="{{ old("username") }}" placeholder="Username"/>
                            </div>

                            <div class="input-group mb-4">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                       <i class="cil-lock-locked"></i>
                                    </span>
                                </div>
                                <label for="password"></label>
                                <input type="password" name="password" id="password"
                                       class="form-control {{ $errors->has('name')? " is-invalid": "" }}" required
                                       placeholder="password"/>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <button type="submit" class="btn btn-primary px-4">Login</button>
                                </div>
                                <div class="col-6 text-right">
                                    <a href="{{ route('password.request') }}" class="btn btn-link btn-sm">Lupa
                                        Password?</a>
                                </div>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

