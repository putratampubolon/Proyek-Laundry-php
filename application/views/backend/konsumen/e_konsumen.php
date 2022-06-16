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
					<form class="user" method="post" action="<?= base_url()?>cpanel/konsumen/update">
						<div class="form-group">
							<input type="text" name="kode_konsumen" value="<?= $data['kode_konsumen'];?>" class="form-control form-control-user" readonly>
						</div>

						<div class="form-group">
							<input type="text" name="nama_konsumen" value="<?= $data['nama_konsumen'];?>" class="form-control form-control-user" placeholder="Enter Nama Konsumen" required>
						</div>

						<div class="form-group">
							<textarea name="alamat_konsumen" class="form-control form-control-user" placeholder="Enter Alamat Konsumen" required>
								<?= $data['alamat_konsumen'];?>
							</textarea>
						</div>

						<div class="form-group">
							<input type="text" name="no_hp" value="<?= $data['no_hp'];?>" class="form-control form-control-user" placeholder="Enter No. HP" required>
						</div>

						<div class="row">
							<div class="col-md-2">
								<button type="submit" class="btn btn-primary btn-user btn-block text-white"> Update</button>     
							</div>

							<div class="col-md-2">
								<a href="<?= base_url()?>cpanel/konsumen" class="btn btn-danger btn-user btn-block">Batal</a>  
							</div>
						</div>

						

					</form>
				</div>
			</div>
		</div>
	</body>
</html>


