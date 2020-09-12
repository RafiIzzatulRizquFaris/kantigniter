<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Admin Dashboard</title>
	<link
		href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
		rel="stylesheet">

	<!-- Custom styles for this template-->
	<link href="<?php echo base_url('css/sb-admin-2.min.css');?>" rel="stylesheet">
	<link href="<?php echo base_url('css/main.css');?>" rel="stylesheet">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous">
	</script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
		integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
		integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
	</script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
		integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
	</script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
		integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
	</script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
	<script src="<?php echo base_url('js/sb-admin-2.min.js');?>"></script>
	<script>
		function print() {
			console.log("dasdasd");
		}

		function onProsesLaporan(id, judul, tgl, isi, foto) {
			$("#proses-report").html("")
			let layout =
				`<form action="<?php echo site_url('AduanController/prosesLaporan');?>" method="POST" >Preses laporan : <input type="text" name="report_title" readonly value="${judul}"><br><br> Dengan id : <input type="text" name="report_id" readonly value="${id}"><br><br>Isi laporan :</br>${isi}<br><br>Bukti : <br><img src="<?php echo base_url('assets/');?>${foto}" width="300"><button type="submit" class="btn btn--radius-2 btn-primary btn-block mt-3">Proses</button></form>`
			$("#proses-report").append(layout)
		}

		function onSelesaiLaporan(id, judul, tgl, isi) {
			$("#selesai-report").html("")
			let layout =
				`<form method="POST" action="<?php echo site_url('AduanController/selesaiLaporan') ?>">
								<div class="form-row">
									<div class="name">ID</div>
									<div class="value">
										<div class="input-group">
											<input class="input--style-5" type="text" name="report_id" readonly value="${id}"/>
										</div>
									</div>
								</div>
								<div class="form-row">
									<div class="name">Tanggapan</div>
									<div class="value">
										<div class="input-group">
											<textarea class="form-control input--style-5 input-group-text" name="report_resp"
												rows="3"></textarea>
										</div>
									</div>
								</div>
								<div class="text-center">
									<button class="btn btn--radius-2 btn-success btn-block btn-lg" type="submit">
										Submit
									</button>
								</div>
							</form>`
			$("#selesai-report").append(layout)
		}

	</script>
</head>

<body id="page-top">

	<!-- Page Wrapper -->
	<div id="wrapper">

		<!-- Sidebar -->
		<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

			<!-- Sidebar - Brand -->
			<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
				<div class="sidebar-brand-icon rotate-n-15">
					<i class="fa fa-envelope" aria-hidden="true"></i>
				</div>
				<div class="sidebar-brand-text mx-3">ADUKAN</div>
			</a>

			<!-- Divider -->
			<hr class="sidebar-divider">

			<div class="sidebar-heading">
				Dashboard
			</div>

			<!-- Nav Item - Dashboard -->
			<li class="nav-item active">
				<a class="nav-link" href="<?php echo site_url('AdminController/index');?>">
					<i class="fas fa-fw fa-database"></i>
					<span>Data Pengaduan</span></a>
			</li>

			<li class="nav-item">
				<a class="nav-link" href="<?php echo site_url('OfficerDataController/index');?>">
					<i class="fas fa-fw fa-database"></i>
					<span>Data Petugas</span></a>
			</li>

			<!-- Nav Item - Charts -->
			<li class="nav-item">
				<a class="nav-link" href="<?php echo site_url('OfficerInputController/index');?>">
					<i class="fas fa-fw fa-envelope-open"></i>
					<span>Input Petugas</span></a>
			</li>

			<!-- Divider -->
			<hr class="sidebar-divider">

			<!-- Heading -->
			<div class="sidebar-heading">
				Account
			</div>

			<!-- Nav Item - Tables -->
			<li class="nav-item">
				<a class="nav-link" data-toggle="modal" data-target="#logoutModal">
					<i class="fa fa-minus-circle"></i>
					<span>Sign Out</span></a>
			</li>

			<!-- Divider -->
			<hr class="sidebar-divider d-none d-md-block">

		</ul>
		<!-- End of Sidebar -->

		<!-- Content Wrapper -->
		<div id="content-wrapper" class="d-flex flex-column">

			<!-- Main Content -->
			<div id="content">

				<!-- Topbar -->
				<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

					<!-- Sidebar Toggle (Topbar) -->
					<button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
						<i class="fa fa-bars"></i>
					</button>

					<!-- Topbar Navbar -->
					<ul class="navbar-nav ml-auto">

						<!-- <div class="topbar-divider d-none d-sm-block"></div> -->

						<!-- Nav Item - User Information -->
						<li class="nav-item dropdown no-arrow">
							<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
								data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<span
									class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $this->session->userdata('username') ?></span>
								<img class="img-profile rounded-circle"
									src="<?php echo base_url('assets/account_circle.png'); ?>">
							</a>
						</li>

					</ul>

				</nav>
				<!-- End of Topbar -->

				<!-- Begin Page Content -->
				<div class="container-fluid">

					<div class="container my-3 text-right">
						<button type="button" class="btn btn-primary"><a href="<?= site_url('Action/print_pdf_aduan') ?>"
								style="text-decoration: none; color: white;">Cetak
								PDF</a></button>
						<button type="button" class="btn btn-primary"><a href="<?= site_url('Action/print_xls_aduan') ?>"
								style="text-decoration: none; color: white;">Cetak
								XLS</a></button>
					</div>

					<!-- Page Heading -->
					<h1 class="h3 mb-2 text-gray-800">Data Pengaduan</h1>
					<p class="mb-4">Mencakup segala data pengaduan yang telah dimasukkan oleh masyarakat</p>

					<!-- DataTales Example -->
					<div class="card shadow mb-4">
						<div class="card-header py-3">
							<h6 class="m-0 font-weight-bold text-primary text-center">Data Pengaduan</h6>
						</div>
						<div class="card-body">
							<div class="table-responsive">
								<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
									<thead>
										<tr>
											<th>ID</th>
											<th>Judul Pengaduan</th>
											<th>Tanggal</th>
											<th>Status</th>
											<th class="text-center">Action</th>
										</tr>
									</thead>
									<tbody>
										<?php
									foreach ($pengaduan as $data) {
									?>
										<tr>
											<td><?= $data->id_pengaduan?></td>
											<td><?= $data->judul?></td>
											<td><?= $data->tgl_pengaduan?></td>
											<td><?= $data->status?></td>
											<?php
											$strconcat = "'";
											if ($data->status == 'menunggu') {
												echo '<td class="text-center"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#prosesModal" onclick="onProsesLaporan('.$strconcat.''.$data->id_pengaduan.''.$strconcat.', '.$strconcat.''.$data->judul.''.$strconcat.', '.$strconcat.''.$data->tgl_pengaduan.''.$strconcat.', '.$strconcat.''.$data->isi_laporan.''.$strconcat.', '.$strconcat.''.$data->foto.''.$strconcat.')">Proses</button></td>';
											}elseif ($data->status == 'proses') {
												echo '<td class="text-center"><button type="button" class="btn btn-success" data-toggle="modal" data-target="#selesaiModal" onclick="onSelesaiLaporan('.$strconcat.''.$data->id_pengaduan.''.$strconcat.', '.$strconcat.''.$data->judul.''.$strconcat.', '.$strconcat.''.$data->tgl_pengaduan.''.$strconcat.', '.$strconcat.''.$data->isi_laporan.''.$strconcat.')">Selesai</button></td>';
											}elseif ($data->status == 'selesai') {
												echo '<td class="text-center"><button type="button" class="btn btn-secondary" disabled>No Action</button></td>';
											}
											?>
										</tr>
										<?php
									}
										?>
									</tbody>
								</table>
							</div>
						</div>
					</div>

				</div>
				<!-- /.container-fluid -->

			</div>
			<!-- End of Main Content -->

			<?php
             $this->load->view('footer');
            ?>

		</div>
		<!-- End of Content Wrapper -->

	</div>
	<!-- End of Page Wrapper -->

	<!-- Scroll to Top Button-->
	<a class="scroll-to-top rounded" href="#page-top">
		<i class="fas fa-angle-up"></i>
	</a>

	<!-- Modal Proses-->
	<div class="modal fade" id="prosesModal" data-backdrop="static" data-keyboard="false" tabindex="-1"
		aria-labelledby="staticBackdropLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="staticBackdropLabel">Proses Laporan</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body" id="proses-report">
				</div>
			</div>
		</div>
	</div>

	<!-- Modal Selesai-->
	<div class="modal fade" id="selesaiModal" data-backdrop="static" data-keyboard="false" tabindex="-1"
		aria-labelledby="staticBackdropLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="card card-7">
						<div class="card-body" id="selesai-report">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Logout Modal-->
	<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
		aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
					<button class="close" type="button" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
				<div class="modal-footer">
					<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
					<a class="btn btn-primary" href="<?php echo site_url('Action/logout');?>">Logout</a>
				</div>
			</div>
		</div>
	</div>
</body>

</html>
