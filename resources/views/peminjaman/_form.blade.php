<!-- Input (Select) Mahasiswa -->
<div class="form-group">
    <label class="form-label" for="mahasiswa_id">NIM Peminjam</label>
    {{ html()->select('mahasiswa_id')->options($mahasiswa)->class(["form-control", "is-invalid" => $errors->has('mahasiswa_id')])->id('mahasiswa_id')->placeholder('NIM') }}
    @error('mahasiswa_id')
    <div class="invalid-feedback">{{ $errors->first('mahasiswa_id') }}</div>
    @enderror
</div>

<!-- Date Text Field Input -->
<div class="form-group">
    <label class="form-label" for="date">Tanggal Pinjam</label>
    {{ html()->date('tanggal_pinjam')->class(["form-control", "is-invalid" => $errors->has('tanggal_pinjam')])->id('tanggal_pinjam')->placeholder('Tanggal Pinjam') }}
    @error('tanggal_pinjam')
    <div class="invalid-feedback">{{ $errors->first('tanggal_pinjam') }}</div>
    @enderror
</div>

<!-- Date Text Field Input -->
<div class="form-group">
    <label class="form-label" for="date">Tanggal Kembali</label>
    {{ html()->date('tanggal_kembali')->class(["form-control", "is-invalid" => $errors->has('tanggal_kembali')])->id('tanggal_kembali')->placeholder('Tanggal Kembali') }}
    @error('tanggal_kembali')
    <div class="invalid-feedback">{{ $errors->first('tanggal_kembali') }}</div>
    @enderror
</div>

<div class="form-group">
    <label class="form-label" for="barang_id">Barang</label>
    <table class="table">
    @forelse($barang as $b)
    <tr>
        <td>
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="barang_{{$b->id_barang}}" name="barang[{{$b->id_barang}}]" value="{{ $b->id }}">
                <label class="custom-control-label" for="barang_{{$b->id_barang}}">{{ $b->id_barang }} - {{ $b->nama_barang}}</label>
            </div>
        </td>
    </tr>
    @empty
    <tr>
        <td>
            <h6 class="text-left">Tidak ada Barang</h6>
        </td>
    </tr>
    @endforelse
    </table>
</div>

