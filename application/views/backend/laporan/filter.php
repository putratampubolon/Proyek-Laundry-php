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
					<form class="user" method="post" action="<?= base_url()?>cpanel/laporan/filter" target="_blank">
						
						<div class="form-group row">
						    <label for="inputPassword" class="col-sm-2 col-form-label">Tanggal Mulai</label>
						    <div class="col-sm-4">
						      <input type="date" name="tanggal_mulai" class="form-control" id="inputPassword" required>
						    </div>
						</div>						

						<div class="form-group row">
						    <label for="inputPassword" class="col-sm-2 col-form-label">Tanggal Ahir</label>
						    <div class="col-sm-4">
						      <input type="date" name="tanggal_ahir" class="form-control" id="inputPassword" required>
						    </div>
						</div>

						<div class="form-group row">
						    <label for="inputPassword" class="col-sm-2 col-form-label"></label>
						    <div class="col-sm-4">
						      <button type="submit" class="btn btn-primary">Cetak Laporan</button>
						    </div>
						</div>	

					</form>
				</div>
			</div>
		</div>
	</body>
</html>


