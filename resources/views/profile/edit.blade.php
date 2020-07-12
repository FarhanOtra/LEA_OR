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

            {{ html()->form('PUT', route('profile.update'))->acceptsFiles()->open() }}

            <div class="card">
                <div class="card-header">
                    <strong><i class="cil-user"></i> Edit User</strong>
                </div>

                <div class="card-body">

                    <!-- Text Field Input for Name -->
                    <div class="form-group">
                        <label class="form-label" for="name"><strong>Nama</strong></label>
                        {{ html()->text('name')->class(["form-control", "is-invalid" => $errors->has('name')])->id('name')->placeholder('Nama User')->value(old('name', $user->name)) }}
                        @error('name')
                        <div class="invalid-feedback">{{ $errors->first('name') }}</div>
                        @enderror
                    </div>

                    <!-- Static Field for Username -->
                    <div class="form-group">
                        <div><strong>Username</strong></div>
                        <div>{{ $user->username }}</div>
                    </div>

                    <!-- Text Field Input for Email -->
                    <div class="form-group">
                        <label class="form-label" for="email"><strong>Email</strong></label>
                        {{ html()->text('email')->class(["form-control", "is-invalid" => $errors->has('email')])->id('email')->placeholder('Email Pengguna')->value(old('email', $user->email)) }}
                        @error('email')
                        <div class="invalid-feedback">{{ $errors->first('email') }}</div>
                        @enderror
                    </div>

                    <!-- Static Field for Tipe -->
                    <div class="form-group">
                        <div><strong>Tipe</strong></div>
                        <div>{{ $user->type_text ?? "-" }}</div>
                    </div>

                @if(isset($civitas))

                    @if($user->type == \App\Models\User::LECTURER)
                        <!-- Text Field Input for Nidn -->
                            <div class="form-group">
                                <label class="form-label" for="nidn"><strong>NIDN</strong></label>
                                {{ html()->text('nidn')->class(["form-control", "is-invalid" => $errors->has('nidn')])->id('nidn')->placeholder('Nidn Dosen')->value(old('nidn', $civitas->nidn)) }}
                                @error('nidn')
                                <div class="invalid-feedback">{{ $errors->first('nidn') }}</div>
                                @enderror
                            </div>

                    @endif

                    @if($user->type == \App\Models\User::STUDENT)
                        <!-- Static Field for NIM -->
                            <div class="form-group">
                                <div><strong>NIM</strong></div>
                                <div>{{ $civitas->nim }}</div>
                            </div>

                            <!-- Text Field Input for Angkatan -->
                            <div class="form-group">
                                <label class="form-label" for="year"><strong>Angkatan</strong></label>
                                {{ html()->text('year')->class(["form-control", "is-invalid" => $errors->has('year')])->id('year')->placeholder('Angkatan')->value(old('year', $civitas->year)) }}
                                @error('year')
                                <div class="invalid-feedback">{{ $errors->first('year') }}</div>
                                @enderror
                            </div>
                    @else
                        <!-- Static Field for NIP -->
                            <div class="form-group">
                                <div><strong>NIP</strong></div>
                                <div>{{ $civitas->nip ?? "-" }}</div>
                            </div>

                            <!-- Text Field Input for Karpeg -->
                            <div class="form-group">
                                <label class="form-label" for="karpeg"><strong>Karpeg</strong></label>
                                {{ html()->text('karpeg')->class(["form-control", "is-invalid" => $errors->has('karpeg')])->id('karpeg')->placeholder('Karpeg Pegawai')->value(old('karpeg', $civitas->karpeg)) }}
                                @error('karpeg')
                                <div class="invalid-feedback">{{ $errors->first('karpeg') }}</div>
                                @enderror
                            </div>

                            <!-- Text Field Input for NPWP -->
                            <div class="form-group">
                                <label class="form-label" for="npwp"><strong>NPWP</strong></label>
                                {{ html()->text('npwp')->class(["form-control", "is-invalid" => $errors->has('npwp')])->id('npwp')->placeholder('NPWP Dosen')->value(old('npwp', $civitas->npwp)) }}
                                @error('npwp')
                                <div class="invalid-feedback">{{ $errors->first('npwp') }}</div>
                                @enderror
                            </div>

                            <!-- Input (Select) Ikatan Kerja -->
                            <div class="form-group">
                                <label class="form-label" for="association_type"><strong>Ikatan Kerja</strong></label>
                                {{ html()->select('association_type')->options($association_types)->class(["form-control", "is-invalid" => $errors->has('association_type')])->id('association_type')->value(old('association_type', $civitas->association_type)) }}
                                @error('association_type')
                                <div class="invalid-feedback">{{ $errors->first('association_type') }}</div>
                                @enderror
                            </div>

                    @endif

                    <!-- Text Field Input for NIK -->
                        <div class="form-group">
                            <label class="form-label" for="nik"><strong>NIK</strong></label>
                            {{ html()->text('nik')->class(["form-control", "is-invalid" => $errors->has('nik')])->id('nik')->value(old('nik', $civitas->nik)) }}
                            @error('nik')
                            <div class="invalid-feedback">{{ $errors->first('nik') }}</div>
                            @enderror
                        </div>

                        <!-- Static Field for Status -->
                        <div class="form-group">
                            <div><strong>Status</strong></div>
                            <div>{{ $civitas->status_text }}</div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">

                                <!-- Text Field Input for Tempat Lahir -->
                                <div class="form-group">
                                    <label class="form-label" for="birthplace"><strong>Tempat Lahir</strong></label>
                                    {{ html()->text('birthplace')->class(["form-control", "is-invalid" => $errors->has('birthplace')])->id('birthplace')->value(old('birthplace', $civitas->birthplace)) }}
                                    @error('birthplace')
                                    <div class="invalid-feedback">{{ $errors->first('birthplace') }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <!-- Text Field Input for Tanggal Lahir -->
                                <div class="form-group">
                                    <label class="form-label" for="birthday"><strong>Tanggal Lahir</strong></label>
                                    {{ html()->date('birthday')->class(["form-control", "is-invalid" => $errors->has('birthday')])->id('birthday')->value(old('birthday', optional($civitas->birthday)->toDateString())) }}
                                    @error('birthday')
                                    <div class="invalid-feedback">{{ $errors->first('birthday') }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Input (Select) Jenis Kelamin -->
                        <div class="form-group">
                            <label class="form-label" for="gender"><strong>Jenis Kelamin</strong></label>
                            {{ html()->select('gender')->options(config('central.gender'))->class(["form-control", "is-invalid" => $errors->has('gender')])->id('gender')->value(old('gender', $civitas->gender)) }}
                            @error('gender')
                            <div class="invalid-feedback">{{ $errors->first('gender') }}</div>
                            @enderror
                        </div>

                        <!-- Static Field for Jurusan -->
                        <div class="form-group">
                            <div><strong>Jurusan</strong></div>
                            <div>{{ optional($civitas->jurusan)->nama ?? "-" }}</div>
                        </div>


                        <!-- Text Field Input for No HP -->
                        <div class="form-group">
                            <label class="form-label" for="phone"><strong>No. HP</strong></label>
                            {{ html()->text('phone')->class(["form-control", "is-invalid" => $errors->has('phone')])->id('phone')->value(old('phone', $civitas->phone)) }}
                            @error('phone')
                            <div class="invalid-feedback">{{ $errors->first('phone') }}</div>
                            @enderror
                        </div>

                        <!-- Text Field Input for Alamat -->
                        <div class="form-group">
                            <label class="form-label" for="address"><strong>Alamat</strong></label>
                            {{ html()->textarea('address')->class(["form-control", "is-invalid" => $errors->has('address')])->id('address')->value(old('address', $civitas->address)) }}
                            @error('address')
                            <div class="invalid-feedback">{{ $errors->first('address') }}</div>
                            @enderror
                        </div>

                        <!-- Input (Select) Status Perkawinan -->
                        <div class="form-group">
                            <label class="form-label" for="marital_status"><strong>Status Perkawinan</strong></label>
                            {{ html()->select('marital_status')->options(config('central.marital_status'))->class(["form-control", "is-invalid" => $errors->has('marital_status')])->id('marital_status')->value(old('marital_status', $civitas->marital_status)) }}
                            @error('marital_status')
                            <div class="invalid-feedback">{{ $errors->first('marital_status') }}</div>
                            @enderror
                        </div>


                        <!-- Input (Select) Agama -->
                        <div class="form-group">
                            <label class="form-label" for="religion"><strong>Agama</strong></label>
                            {{ html()->select('religion')->options(config('central.religion'))->class(["form-control", "is-invalid" => $errors->has('religion')])->id('religion')->value(old('religion', $civitas->religion)) }}
                            @error('religion')
                            <div class="invalid-feedback">{{ $errors->first('religion') }}</div>
                            @enderror
                        </div>
                    @endif

                    <div class="form-group">
                        <label class="form-label" for="photo">Photo:</label>
                        {{ html()->file('photo')->class(["form-control-file", "is-invalid" => $errors->has('photo')])->id('photo') }}
                        @error('photo')
                        <div class="invalid-feedback">{{ $errors->first('photo') }}</div>
                        @enderror
                    </div>


                </div>

                <div class="card-footer">
                    <input type="submit" class="btn btn-primary" value="Simpan" />
                </div>

            </div>

            {{ html()->form()->close() }}

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
