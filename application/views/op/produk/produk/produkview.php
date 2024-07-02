<?php
echo asset_datatables();
?>
<div>
	<a href="<?=base_url(akses().'/produk/produk/add');?>" class="btn btn-primary btn-flat"><i class="fa fa-plus"></i> Tambah Produk</a>
</div>
<p>&nbsp;</p>
<table class="table table-bordered data-render">
	<thead>		
		<th>Nama Produk</th>
		<th>Supplier</th>
		<th>Metadata</th>
		<th>Harga</th>
		<th>Stok</th>
		<th></th>
	</thead>
	<tbody>
	<?php
if (!empty($data)) {
    foreach ($data as $row) {
        // Hitung hasil stok - jumlah_beli
        $hasil = $row->stok - $row->jumlah_beli;

        // Hanya tampilkan baris jika hasil stok - jumlah_beli sama dengan 1
        if ($hasil == 1) {
            $id = $row->produk_id;
            $nama = $row->kode_produk . "-" . $row->nama_produk;
            $supplier = field_value('supplier', 'supplier_id', $row->supplier_id, 'nama_supplier');
            $kategori = field_value('produk_kategori', 'kategori_id', $row->kategori_id, 'nama_kategori');
            $merek = field_value('produk_merek', 'merek_id', $row->merek_id, 'nama_merek');
            $ukuran = field_value('produk_ukuran', 'ukuran_id', $row->ukuran_id, 'nama_ukuran');
            $berat = number_format($row->berat, 2);
            $harga = number_format($row->harga, 0);

            ?>
            <tr>
                <td><?= $nama; ?></td>
                <td><?= $supplier; ?></td>
                <td>
                    <ul>
                        <li>Kategori <?= $kategori; ?></li>
                        <li>Brand <?= $merek; ?></li>
                        
                        <li>Size <?= $ukuran; ?></li>
                        <li>Berat <?= $berat; ?> Gram</li>
                    </ul>
                </td>
                <td>Rp <?= $harga; ?></td>
                <td><?= $hasil; ?></td>
                <td>
                    <a href="<?= base_url(akses() . '/produk/produk/edit') . '?id=' . $id; ?>" class="btn btn-md btn-info"><i class="fa fa-pencil"></i></a>
                    <a onclick="return confirm('Yakin ingin menghapus produk ini?');" href="<?= base_url(akses() . '/produk/produk/delete') . '?id=' . $id; ?>" class="btn btn-md btn-danger"><i class="fa fa-trash"></i></a>
                </td>
            </tr>
            <?php
        }
    }
}
?>

	</tbody>
</table>