<!-- Static Field for List Barang -->
<div class="form-group">
    <div class="col">
    <table class="table table-outline table-responsive-sm table-hover">
        <thead class="{{ config('style.thead') }}">
            <tr>
                <th class="text-center">No.</th>
                <th class="text-center">ID Barang</th>
                <th class="text-center">Nama Barang</th>
                <th class="text-center">Status Pengembalian</th>
            </tr>
        </thead>
        <tbody>
        @foreach($detailpeminjaman as $detail)
            <tr>
                <td class="text-center">{{ $loop->iteration }}</td>
                <td class="text-center">{{ $detail->barang->id_barang }}</td>
                <td class="text-center">{{ $detail->barang->nama_barang }}</td>
                <td class="text-center">{!! $detail->status_text !!}</td>
            </tr>
        @endforeach
        </tbody>
    </table>  
    </div>  
</div>