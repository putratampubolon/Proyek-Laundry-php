<?php 
	$tgl_masuk = date('Y-m-d');
?>

<!DOCTYPE html>
<html>
	<head>
	</head>

	<body>
		<!-- Begin Page Content -->
		<div class="container-fluid">
			<!-- Page Heading -->
			<h1 class="h3 mb-2 text-gray-800"><?= $judul;?></h1>

			<!-- DataTales Example -->
			<div class="card shadow mb-4">
				<div class="card-body">
					<form class="user" method="post" action="<?= base_url()?>cpanel/transaksi/simpan">
						<div class="form-group col-md-4">
							<input type="text" name="kode_transaksi" value="<?= $kode_transaksi;?>" class="form-control" readonly>
						</div>

						<div class="form-group col-md-4">
							<select name="kode_konsumen" class="form-control" required>
								<option value="" selected> Pilih Konsumen </option>
								<?php 
									foreach ($konsumen as $row) {?>
										<option value="<?= $row->kode_konsumen;?>"> <?= $row->nama_konsumen;?></option>
									<?php }
								?>
							</select>
						</div>

						<div class="form-group col-md-4">
							<select name="kode_paket" id="paket" class="form-control" required>
								<option value="" selected> Pilih Paket </option>
								<?php 
									foreach ($paket as $row) {?>
										<option value="<?= $row->kode_paket;?>"> <?= $row->nama_paket;?></option>
									<?php }
								?>
							</select>
						</div>

						<div class="form-group col-md-4">
							<input type="text" id="harga" class="form-control" placeholder="Harga" readonly>
						</div>

						<div class="form-group" hidden="">
							<input type="date" name="tgl_masuk" value="<?= $tgl_masuk;?>" class="form-control" required>
						</div>

						<div class="form-group col-md-4">
							<input type="number" name="berat" id="berat" class="form-control" placeholder="Berat (KG)" required>
						</div>

						<!-- <div class="form-group">
							<select name="berat" id="berat" class="form-control" required>
								<option value="" selected> Pilih Berat (kg) </option>
								<?php 
									for ($berat=1; $berat <= 20; $berat++) { ?>
										<option value="<?= $berat;?>"> <?= $berat;?> </option>
									<?php }
								?>
								
							</select>
						</div> -->

						<div class="form-group col-md-4">
							<input type="text" name="grand_total" id="grand_total" class="form-control" placeholder="Total" readonly>
						</div>

						<div class="form-group col-md-4">
							<input type="text" name="status" value="Open" class="form-control" readonly>
						</div>

						<div class="row">
							<div class="col-md-2">
								<button type="submit" class="btn btn-primary btn-user btn-block text-white" target="_blank"> Simpan Transaksi</button>     
							</div>

							<div class="col-md-2">
								<a href="<?= base_url()?>cpanel/paket" class="btn btn-danger btn-user btn-block">Batal</a>  
							</div>
						</div>						

					</form>
				</div>
			</div>
		</div>

		<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	</body>
</html>

<script>
	$("#paket").change(function() {
		var kode_paket = $(this).val();
		$.ajax({
			url : '<?= base_url()?>cpanel/transaksi/get_hargaPaket',
			data : {kode_paket:kode_paket},
			method : 'post',
			dataType : 'JSON',
			success : function(hasil){
				$('#harga').val(hasil.harga_paket);
			}
		});
	});

	$('#berat').keyup(function() {
		var berat = $(this).val();
		var harga = document.getElementById('harga').value;
		// var total = berat * harga;
		$('#grand_total').val(berat * harga);
	});
</script>


