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
			<a href="<?= base_url()?>cpanel/konsumen/tambah_konsumen" class="btn btn-primary">Tambah Konsumen</a>	
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
							<th>No.</th>
							<th>Kode</th>
							<th>Nama</th>
							<th>Alamat</th>
							<th>No. HP</th>
							<th>Opsi</th>
						</tr>
					</thead>

					<tbody>
						<?php 
							$no = 1;
							foreach ($data as $row) {?>
								<tr>
									<td><?= $no++;?></td>
									<td><?= $row->kode_konsumen;?></td>
									<td><?= $row->nama_konsumen;?></td>
									<td><?= $row->alamat_konsumen;?></td>
									<td><?= $row->no_hp;?></td>
									<td>
										<a href="<?= base_url()?>cpanel/konsumen/edit_konsumen/<?= $row->kode_konsumen;?>" class="btn btn-success btn-sm">Edit</a>
										<a href="<?= base_url()?>cpanel/konsumen/delete_konsumen/<?= $row->kode_konsumen;?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin Mau Menghapus ??');">Delete</a>
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
