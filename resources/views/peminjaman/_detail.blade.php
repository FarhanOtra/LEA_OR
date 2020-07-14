<!-- Static Field for NIM -->
<div class="form-group">
    <div class="form-label">NIM</div>
    <div>{{ $peminjaman->mahasiswa->nim }}</div>
</div>

<!-- Static Field for Nama -->
<div class="form-group">
    <div class="form-label">Nama</div>
    <div>{{ $peminjaman->mahasiswa->nama_mahasiswa }}</div>
</div>

<!-- Static Field for Tanggal -->
<div class="form-group">
    <div class="form-label">Tanggal</div>
    <div>{{ $peminjaman->date }}</div>
</div>

<!-- Static Field for Notes -->
<div class="form-group">
    <div class="form-label">List Barang</div>
    <br>
    <div class="col-5">
    <table class="table table-outline table-responsive-sm table-hover">
        <thead class="{{ config('style.thead') }}">
            <tr>
                <th class="text-center">ID Barang</th>
                <th class="text-center">Nama Barang</th>
            </tr>
        </thead>
        <tbody>
        @foreach($detailpeminjaman as $detail)
            <tr>
                <td class="text-center">{{ $detail->barang->id_barang }}</td>
                <td class="text-center">{{ $detail->barang->nama_barang }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>  
    </div>  
</div>