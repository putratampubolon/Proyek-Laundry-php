<form method="post" action="<?= base_url()?>ceklondri">
	
	<div class="container">
		<div class="row mb-5">
			<div class="col-md-10">
				<input type="text" name="kode_transaksi" class="form-control" placeholder="Silahkan masukkan kode transaksi anda...">
			</div>

			<div class="col-md-2">
				<button type="submit" class="btn btn-primary">Cek Laundry</button>
			</div>
		</div>
	</div>	

</form>


<div class="container">
	<table class="table table-bordered table-striped mb-5">
		<thead>
			<tr>
				<th scope="col">Nama Konsumen</th>
				<th scope="col">Tanggal Masuk</th>
				<th scope="col">Paket</th>
				<th scope="col">Total</th>
				<th scope="col">Status</th>
			</tr>
		</thead>

		<tbody>
			<?php 
				if (!empty($data)) {
					foreach ($data as $row) {?>
						<tr>
							<td><?= $row->nama_konsumen;?></td>
							<td><?= mediumdate_indo($row->tgl_masuk);?></td>
							<td><?= $row->nama_paket;?></td>
							<td>Rp. <?= number_format($row->grand_total,0,'.','.');?></td>
							<td><?= $row->status;?></td>
						</tr>
					<?php }
				}else{?>
					<tr>
						<td colspan="5" class="bg-info text-danger">Tidak Ada Data</td>
					</tr>
				<?php }
			?>
		</tbody>
	</table>
</div>

