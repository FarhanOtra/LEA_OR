<!-- Date Text Field Input -->
<div class="form-group">
    <label class="form-label" for="id_barang">ID Barang</label>
    {{ html()->text('id_barang')->class(["form-control", "is-invalid" => $errors->has('id_barang')])->id('id_barang')->placeholder('ID Barang') }}
    @error('id_barang')
    <div class="invalid-feedback">{{ $errors->first('id_barang') }}</div>
    @enderror
</div>

<!-- Date Text Field Input -->
<div class="form-group">
    <label class="form-label" for="nama_barang">Nama Barang</label>
    {{ html()->text('nama_barang')->class(["form-control", "is-invalid" => $errors->has('nama_barang')])->id('nama_barang')->placeholder('Nama Barang') }}
    @error('nama_barang')
    <div class="invalid-feedback">{{ $errors->first('nama_barang') }}</div>
    @enderror
</div>

<!-- Date Text Field Input -->
<div class="form-group">
    <label class="form-label" for="keterangan">Keterangan</label>
    {{ html()->textarea('keterangan')->class(["form-control", "is-invalid" => $errors->has('keterangan')])->id('keterangan')->placeholder('Keterangan Barang') }}
    @error('keterangan')
    <div class="invalid-feedback">{{ $errors->first('keterangan') }}</div>
    @enderror
</div>
