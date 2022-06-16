<?php 
	$data = $this->db->get('paket')->result();
?>
<!DOCTYPE html>
<html>
	<head>
		<style>
			.th_bg{
				background-color: blue;
}
		</style>
	</head>

<div class="container">
	<div class="row">
		<div class="col-md-4" data-aos="fade-up" data-aos-duration="1000">
			<img class="set_image" src="<?= base_url()?>assets/images/images.jpg">
		</div>

		<div class="col-md-8" data-aos="fade-up" data-aos-duration="1000">
			<h5> Corry Laundry </h5>
			<p>
				Sebuah usaha laundry yang sudah berdiri sejak lama dan sudah beroperasi sejak duku,namu masih menggunakan metode yang sangat manual
				mulai dari penawaran harga dan jenis-jenis paket yang ada,pembayaran dan juga pembukuan yang masih juga manual,sehingga kadang susah
				untuk menghitung pemasukan dan pengluaran karena laporannya kadang tidak falid atau masih berantakan.Sampai akhirya di buatlah sistem
				ini yang bertujuan menampung informasi dan juga membuat pembukuan dan laporan menjadi semakin teratur dan mudah di dapatkan.
			</p>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12 my-md-5 col-sm-12 my-sm-5" data-aos="fade-up" data-aos-duration="1000">
			<h5>Jenis Paket</h5>
			<p>
				Disini kami menawarkan banyak jenis-jenis paket dari laundry kami yang bisa membuat anda tertarik dan
				membuat anda menjadi nyaman dan yakin terhadap laundry kami ini.
			</p>

			<table class="table table-hover table-bordered">
				<thead>
					<tr class="th_warna" >
						<th scope="col">No.</th>
						<th scope="col">Nama Paket</th>
						<th scope="col">Harga Paket</th>
					</tr>
				</thead>

				<tbody>
					<?php 
						$no = 1;
						foreach ($data as $row) {?>
							<tr>
								<td><?= $no++;?></td>
								<td><?= $row->nama_paket;?></td>
								<td><?= "Rp. " .number_format($row->harga_paket,0,'.','.');?></td>
							</tr>
						<?php }
					?>
				</tbody>
			</table>
		</div>
	</div>

	<hr>

	<div class="row mb-md-5" data-aos="fade-up" data-aos-duration="1000">
		<div class="col-md-12">
			<h5>Contact</h5>
			<p>Alamat: Balige,Toba</p>
			<p>Email: putratampubolon007@gmail.com</p>
			<p>Telpon: 081262876022</p>
		</div>
	</div>
</div>

</html>

