@extends('layouts.admin')

@section('breadcrumb')
    {!!  cui()->breadcrumb([
        'Home' => route('home'),
        'Profile' => '#'
    ]) !!}
@endsection

@section('toolbar')
    {!! cui()->toolbar_btn(route('profile.history'), 'cil-paw', 'Login History') !!}
    {!! cui()->toolbar_btn(route('profile.edit'), 'cil-user', 'Edit Profil') !!}
    {!! cui()->toolbar_btn(route('password.edit'), 'cil-lock-locked', 'Ubah Password') !!}
@endsection


@section('content')


    <div class="row">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                    <strong><i class="cil-user"></i> Profile User</strong>
                </div>

                <div class="card-body">

                    <!-- Static Field for Nama -->
                    <div class="form-group">
                        <div><strong>Nama</strong></div>
                        <div>{{ $user->name }}</div>
                    </div>

                    <!-- Static Field for Username -->
                    <div class="form-group">
                        <div><strong>Username</strong></div>
                        <div>{{ $user->username }}</div>
                    </div>

                    <!-- Static Field for E-Mea -->
                    <div class="form-group">
                        <div><strong>E-Mail</strong></div>
                        <div>{{ $user->email }}</div>
                    </div>

                    <!-- Static Field for Tipe -->
                    <div class="form-group">
                        <div><strong>Tipe</strong></div>
                        <div>{{ $user->type_text }}</div>
                    </div>

                @if(isset($civitas))

                    @if($user->type == \App\Models\User::LECTURER)
                        <!-- Static Field for NIDN -->
                            <div class="form-group">
                                <div><strong>NIDN</strong></div>
                                <div>{{ $civitas->nidn }}</div>
                            </div>
                    @endif

                    @if($user->type == \App\Models\User::STUDENT)
                        <!-- Static Field for NIM -->
                            <div class="form-group">
                                <div><strong>NIM</strong></div>
                                <div>{{ $civitas->nim }}</div>
                            </div>

                            <!-- Static Field for Angkatan -->
                            <div class="form-group">
                                <div><strong>Angkatan</strong></div>
                                <div>{{ $civitas->year }}</div>
                            </div>
                    @else
                        <!-- Static Field for NIP -->
                            <div class="form-group">
                                <div><strong>NIP</strong></div>
                                <div>{{ $civitas->nip ?? "-" }}</div>
                            </div>

                            <!-- Static Field for Karpeg -->
                            <div class="form-group">
                                <div><strong>Karpeg</strong></div>
                                <div>{{ $civitas->karpeg ?? "-" }}</div>
                            </div>

                            <!-- Static Field for NPWP -->
                            <div class="form-group">
                                <div><strong>NPWP</strong></div>
                                <div>{{ $civitas->npwp ?? "-" }}</div>
                            </div>

                            <!-- Static Field for Ikatan Kerja -->
                            <div class="form-group">
                                <div><strong>Ikatan Kerja</strong></div>
                                <div>{{ $civitas->association_type_text ?? "-" }}</div>
                            </div>
                    @endif

                    <!-- Static Field for NIK -->
                        <div class="form-group">
                            <div><strong>NIK</strong></div>
                            <div>{{ $civitas->nik ?? "-" }}</div>
                        </div>

                        <!-- Static Field for Status -->
                        <div class="form-group">
                            <div><strong>Status</strong></div>
                            <div>{{ $civitas->status_text }}</div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <!-- Static Field for Tempat Lahir -->
                                <div class="form-group">
                                    <div><strong>Tempat Lahir</strong></div>
                                    <div>{{ $civitas->birthplace }}</div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <!-- Static Field for Tanggal Lahir -->
                                <div class="form-group">
                                    <div><strong>Tanggal Lahir</strong></div>
                                    <div>{{ optional($civitas->birthday)->toDateString() }}</div>
                                </div>
                            </div>
                        </div>

                        <!-- Static Field for Jenis Kelamin -->
                        <div class="form-group">
                            <div><strong>Jenis Kelamin</strong></div>
                            <div>{{ $civitas->gender_text ?? "-" }}</div>
                        </div>

                        <!-- Static Field for Jurusan -->
                        <div class="form-group">
                            <div><strong>Jurusan</strong></div>
                            <div>{{ optional($civitas->jurusan)->nama ?? "-" }}</div>
                        </div>

                        <!-- Static Field for Phone -->
                        <div class="form-group">
                            <div><strong>Phone</strong></div>
                            <div>{{ $civitas->phone ?? "-" }}</div>
                        </div>

                        <!-- Static Field for Alamat -->
                        <div class="form-group">
                            <div><strong>Alamat</strong></div>
                            <div>{{ $civitas->address ?? "-" }}</div>
                        </div>

                        <!-- Static Field for Status Perkawinan -->
                        <div class="form-group">
                            <div><strong>Status Perkawinan</strong></div>
                            <div>{{ $civitas->marital_status_text ?? "-" }}</div>
                        </div>

                        <!-- Static Field for Agama -->
                        <div class="form-group">
                            <div><strong>Agama</strong></div>
                            <div>{{ $civitas->religion_text ?? "-"}}</div>
                        </div>
                    @endif

                </div>

            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                {{-- CARD HEADER--}}
                <div class="card-header">
                    <strong><i class="cil-camera"></i> Passphoto</strong>
                </div>
                {{-- CARD BODY--}}
                <div class="card-body">
                    <div class="text-center">
                        @if(isset($civitas))
                            <img src="{{ asset($civitas->photo_url) }}" class="img-fluid rounded" alt="...">
                        @else
                            <img src="{{ asset('img/default-user.png') }}" class="img-fluid rounded" alt="...">
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
