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

<!-- Input (Select) Status -->
<div class="form-group">
    <label class="form-label" for="status_barang">Status</label>
    {{ html()->select('status_barang')->options([1=>'Tersedia',2=>'Dipinjam',3=>'Rusak'])->class(["form-control", "is-invalid" => $errors->has('status_barang')])->id('status_barang')->placeholder('Status Barang') }}
    @error('status_barang')
    <div class="invalid-feedback">{{ $errors->first('status_barang') }}</div>
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