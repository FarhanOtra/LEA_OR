<!-- Input (Select) Mahasiswa -->
<div class="form-group">
    <label class="form-label" for="mahasiswa_id">NIM Peminjam</label>
    {{ html()->select('mahasiswa_id')->options($mahasiswa)->class(["form-control", "is-invalid" => $errors->has('mahasiswa_id')])->id('mahasiswa_id')->placeholder('NIM') }}
    @error('mahasiswa_id')
    <div class="invalid-feedback">{{ $errors->first('mahasiswa_id') }}</div>
    @enderror
</div>

<!-- Input (Select) Barang -->
<div class="form-group">
    <label class="form-label" for="barang_id">Barang</label>
    {{ html()->select('barang_id')->options($barang)->class(["form-control", "is-invalid" => $errors->has('barang_id')])->id('barang_id')->placeholder('Nama') }}
    @error('barang_id')
    <div class="invalid-feedback">{{ $errors->first('barang_id') }}</div>
    @enderror
</div>

