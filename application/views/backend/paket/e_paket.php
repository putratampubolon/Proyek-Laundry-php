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
					<form class="user" method="post" action="<?= base_url()?>cpanel/paket/update">
						<div class="form-group">
							<input type="text" name="kode_paket" value="<?= $paket['kode_paket'];?>" class="form-control form-control-user" readonly>
						</div>

						<div class="form-group">
							<input type="text" name="nama_paket" value="<?= $paket['nama_paket']?>" class="form-control form-control-user" placeholder="Enter Nama Paket" required>
						</div>

						<div class="form-group">
							<input type="text" name="harga_paket" value="<?= $paket['harga_paket'];?>" class="form-control form-control-user" placeholder="Enter Harga Paket" required>
						</div>

						<div class="row">
							<div class="col-md-2">
								<button type="submit" class="btn btn-primary btn-user btn-block text-white"> Update</button>     
							</div>

							<div class="col-md-2">
								<a href="<?= base_url()?>cpanel/paket" class="btn btn-danger btn-user btn-block">Batal</a>  
							</div>
						</div>						

					</form>
				</div>
			</div>
		</div>
	</body>
</html>


