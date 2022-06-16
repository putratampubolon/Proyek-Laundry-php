<!DOCTYPE html>
<html>
	<head>
		<style>
			.bg_nav{
				background-color: 		#000080;
			}
		</style>
	</head>

	<body>
		<!-- Sidebar -->
		<ul class="navbar-nav bg_nav sidebar sidebar-dark accordion" id="accordionSidebar">
		<!-- <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar"> -->

			<!-- Sidebar - Brand -->
			<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
				<div class="sidebar-brand-icon rotate-n-15">
					<i class="fas fa-laugh-wink"></i>
				</div>
				<div class="sidebar-brand-text mx-3"> Corry <sup>Laundry</sup></div>
			</a>

			<!-- Divider -->
			<hr class="sidebar-divider my-0">

			<!-- Nav Item - Dashboard -->
			<li class="nav-item active">
				<a class="nav-link" href="<?= base_url()?>cpanel/dashboard">
					<i class="fas fa-fw fa-tachometer-alt"></i>
					<span>Dashboard</span>
				</a>
			</li>

			<!-- Nav Item - Pages Collapse Menu -->
			<li class="nav-item">
				<a class="nav-link collapsed" href="<?= base_url()?>cpanel/konsumen">
					<span>Data Konsumen</span>
				</a>
			</li>	

			<li class="nav-item">
				<a class="nav-link collapsed" href="<?= base_url()?>cpanel/paket">
					<span>Data Paket</span>
				</a>
			</li>	

			<li class="nav-item">
				<a class="nav-link collapsed" href="<?= base_url()?>cpanel/transaksi">
					<span>Data Transaksi</span>
				</a>
			</li>	

			<li class="nav-item">
				<a class="nav-link collapsed" href="<?= base_url()?>cpanel/laporan">
					<span>Laporan</span>
				</a>
			</li>		

			<!-- Divider -->
			<hr class="sidebar-divider d-none d-md-block">

			<!-- Sidebar Toggler (Sidebar) -->
			<div class="text-center d-none d-md-inline">
				<button class="rounded-circle border-0" id="sidebarToggle"></button>
			</div>

		</ul>
		<!-- End of Sidebar -->
	</body>
</html>


		