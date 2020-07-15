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

<!-- Static Field for Tanggal Pinjam -->
<div class="form-group">
    <div class="form-label">Tanggal Pinjam</div>
    <div>{{ $peminjaman->tanggal_pinjam }}</div>
</div>

<!-- Static Field for Tanggal Kembali -->
<div class="form-group">
    <div class="form-label">Tanggal Kembali</div>
    <div>{{ $peminjaman->tanggal_kembali }}</div>
</div>

<!-- Static Field for Tanggal -->
<div class="form-group">
    <div class="form-label">Status Pengembalian</div>
    <div><h5>{!! $peminjaman->status_text !!}</h5></div>
</div>