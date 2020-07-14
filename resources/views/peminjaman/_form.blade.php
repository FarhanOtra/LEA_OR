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
    <label class="form-label" for="date">Date</label>
    {{ html()->date('date')->class(["form-control", "is-invalid" => $errors->has('date')])->id('date')->placeholder('Date') }}
    @error('date')
    <div class="invalid-feedback">{{ $errors->first('date') }}</div>
    @enderror
</div>

<div class="form-group">
    <label class="form-label" for="barang_id">Barang</label>
    <table class="table">
    @foreach($barang as $b)
    <tr>
        <td>
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="barang_{{$b->nama_barang}}" name="barang[{{$b->nama_barang}}]" value="{{ $b->id }}">
                <label class="custom-control-label" for="barang_{{$b->nama_barang}}">{{ $b->id_barang }} - {{ $b->nama_barang}}</label>
            </div>
        </td>
    </tr>
    @endforeach
    </table>
</div>

