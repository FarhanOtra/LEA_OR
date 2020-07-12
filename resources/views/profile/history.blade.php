@extends('layouts.admin')

@section('breadcrumb')
    {!!  cui()->breadcrumb([
        'Home' => route('home'),
        'Profile' => route('profile.show'),
        'History' => '#'
    ]) !!}
@endsection

@section('toolbar')
    {!! cui()->toolbar_btn(route('profile.history'), 'cil-paw', 'Login History') !!}
    {!! cui()->toolbar_btn(route('profile.edit'), 'cil-user', 'Edit Profil') !!}
    {!! cui()->toolbar_btn(route('password.edit'), 'cil-lock-locked', 'Ubah Password') !!}
@endsection

@section('content')

    <div class="card">

        <div class="card-header">
            <strong>Riwayat Login Pengguna</strong>
        </div>

        <div class="card-body">
                <!-- Static Field for Nama -->
                <div class="form-group">
                    <div><strong>Nama</strong></div>
                    <div>{{ $user->name }}</div>
                </div>

                <!-- Static Field for username -->
                <div class="form-group">
                    <div><strong>Username</strong></div>
                    <div>{{ $user->username }}</div>
                </div>

                <!-- Static Field for email -->
                <div class="form-group">
                    <div><strong>E-mail</strong></div>
                    <div>{{ $user->email }}</div>
                </div>

                <!-- Static Field for Riwayat Login -->
                <div class="form-group">
                    <div><strong>Riwayat Login</strong></div>
                    <div>
                        <table class="table table-bordered table-striped table-" style="margin-top: 32px">
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Tanggal</th>
                                <th class="text-center">Jam</th>
                                <th class="text-center">IP</th>
                            </tr>
                            @php $i=1 @endphp
                            @foreach($logins as $login)
                                <tr>
                                    <td class="text-center">{{ $i++ }}</td>
                                    <td class="text-center">{{ $login->login_at->toDateString() }}</td>
                                    <td class="text-center">{{ $login->login_at->toTimeString() }}</td>
                                    <td class="text-center">{{ $login->login_ip }}</td>
                                </tr>
                            @endforeach
                        </table>
                        {{ $logins->links() }}
                    </div>
                </div>



        </div>

    </div>

@endsection
