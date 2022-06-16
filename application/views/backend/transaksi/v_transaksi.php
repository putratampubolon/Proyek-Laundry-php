<!DOCTYPE html>
<html>
	<head>
		
	</head>

	<body>
		<!-- Begin Page Content -->
		<div class="container-fluid">

			<?php 
			if (!empty($this->session->flashdata('info'))) {?>
			<div class="row">
				<div class="col-md-12 mb-md-3">
					<div class="alert alert-success" role="alert"> 
						<?= $this->session->flashdata('info');?>
					</div>	
				</div>
			</div>
			<?php }
			?>	

			<div class="row">
				<div class="col-md-12 mb-md-3">
					<a href="<?= base_url()?>cpanel/transaksi/tambah_transaksi" class="btn btn-primary">Tambah Transaksi</a>	
				</div>
			</div>

			<!-- Page Heading -->
			<h1 class="h3 mb-2 text-gray-800"><?= $judul;?></h1>

			<!-- DataTales Example -->
			<div class="card shadow mb-4">
				<div class="card-header py-3">
					<h6 class="m-0 font-weight-bold">Daftar <?= $judul;?></h6>
				</div>		

				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
							<thead>
								<tr>
									<th>Tanggal Masuk</th>
									<th>Kode Transaksi</th>
									<th>Konsumen</th>
									<th>Paket</th>
									<th>Berat<br>(KG)</th>
									<th>Grand Total</th>
									<th>Tanggal Ambil</th>
									<th>Status</th>
									<th>Aksi</th>
								</tr>
							</thead>

							<tbody>
								<?php 
								$no = 1;
								foreach ($data as $row) {?>
								<tr>
									<td><?= mediumdate_indo($row->tgl_masuk);?></td>
									<td><?= $row->kode_transaksi;?></td>
									<td><?= $row->nama_konsumen;?></td>
									<td><?= $row->nama_paket;?></td>
									<td><?= $row->berat;?></td>
									<td>Rp. <?= number_format($row->grand_total,0,'.','.');?></td>
									<td>
										<?php 
										if ($row->tgl_ambil == '0000-00-00') {

										}else{
											echo mediumdate_indo($row->tgl_ambil);
										}
										?>
									</td>

									<td>
										<?php 
										if ($row->status == 'Open') {?>
											<select name="status" class="badge badge-danger status">
												<option value="<?= $row->kode_transaksi?>Open" selected> Open</option>
												<option value="<?= $row->kode_transaksi?>On Proses"> On Proses</option>												
												<option value="<?= $row->kode_transaksi?>Closed"> Closed</option>												
											</select>

										<?php }else if($row->status == 'On Proses'){?>
										<div class="dropdown mb-2"> 
											<select name="status" class="badge badge-warning status">
												<option value="<?= $row->kode_transaksi?>Open"> Open</option>
												<option value="<?= $row->kode_transaksi?>On Proses" selected> On Proses</option>												
												<option value="<?= $row->kode_transaksi?>Closed"> Closed</option>												
											</select>
										</div>
										<?php }else if($row->status == 'Closed'){?>
										<div class="dropdown mb-2"> 
											<button class="btn btn-success btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
												Closed
											</button>			                                        
										</div>
										<?php }
										?>
									</td>

									<td>
										<?php 
											if ($row->status == "Closed") {?>
												<a href="<?= base_url()?>cpanel/transaksi/detail/<?= $row->kode_transaksi?>" class="btn btn-warning btn-sm" target="_blank">Detail</a>
											<?php }else{?>
												<a href="<?= base_url()?>cpanel/transaksi/edit/<?= $row->kode_transaksi?>" class="btn btn-success btn-sm">Edit</a>
												<a href="<?= base_url()?>cpanel/transaksi/detail/<?= $row->kode_transaksi?>" class="btn btn-warning btn-sm" target="_blank">Detail</a>
											<?php }
										?>
									</td>
								</tr>
								<?php }
								?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>

		<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
		<script type="text/javascript">
			$('.status').change(function() {
				var stt = $(this).val();
				var kt = stt.substring(0,4);
				var status = stt.substr(4,15);

				$.ajax({
					url : '<?= base_url()?>cpanel/transaksi/update_status',
					data : {kt:kt, status:status},
					method : 'post',
					dataType : 'JSON' 
				});
			});
		</script>
	</body>
</html>


