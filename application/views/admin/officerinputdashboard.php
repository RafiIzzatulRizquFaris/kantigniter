<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<meta name="description" content="" />
	<meta name="author" content="" />

	<title>User Dashboard</title>

	<!-- Custom fonts for this template-->
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
</head>

<body id="page-top">
	<!-- Page Wrapper -->
	<div id="wrapper">
		<!-- Sidebar -->
		<?php
            $this->load->view('partial/sidebaradmin');
        ?>
		<!-- End of Sidebar -->

		<!-- Content Wrapper -->
		<div id="content-wrapper" class="d-flex flex-column">
			<!-- Main Content -->
			<div id="content">
				
			<?php
             $this->load->view('partial/topbar');
            ?>

				<!-- Begin Page Content -->
				<div class="container-fluid">

					<div class="card shadow mb-4">
						<div class="card-header py-3 text-center">
							<h6 class="m-0 font-weight-bold text-primary">
								Officer Register
							</h6>
						</div>
						<div class="card-body">
							<div class="card card-7">
								<div class="card-body">
									<form method="POST" action="<?php echo site_url('Action/insert_petugas'); ?>">
										<div class="form-row">
											<div class="name">Nama</div>
											<div class="value">
												<div class="input-group">
													<input class="input--style-5" type="text" name="nama_officer" />
												</div>
											</div>
										</div>
										<div class="form-row">
											<div class="name">Username</div>
											<div class="value">
												<div class="input-group">
													<input class="input--style-5" type="text" name="username_officer" />
												</div>
											</div>
										</div>
										<div class="form-row">
											<div class="name">Password</div>
											<div class="value">
												<div class="input-group">
													<input class="input--style-5" type="password"
														name="password_officer" />
												</div>
											</div>
										</div>
										<div class="form-row">
											<div class="name">No Telepon</div>
											<div class="value">
												<div class="input-group">
													<input type="text" class="input--style-5" name="telepon_officer">
												</div>
											</div>
										</div>
										<div class="form-row">
											<div class="name">Position</div>
											<div class="value">
												<div class="input-group">
													<div class="rs-select2 js-select-simple select--no-search">
														<select name="position_officer">
															<option disabled="disabled" selected="selected">Choose
																option</option>
															<option value="admin">Admin</option>
															<option value="petugas">Officer</option>
														</select>
														<div class="select-dropdown"></div>
													</div>
												</div>
											</div>
										</div>
										<div class="text-center">
											<button class="btn btn--radius-2 btn-success btn-block btn-lg"
												type="submit">
												Submit
											</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- /.container-fluid -->
			</div>
			<!-- End of Main Content -->

			<?php
        $this->load->view('partial/footer');
      ?>

		</div>
		<!-- End of Content Wrapper -->
	</div>
	<!-- End of Page Wrapper -->

	<!-- Scroll to Top Button-->
	<a class="scroll-to-top rounded" href="#page-top">
		<i class="fas fa-angle-up"></i>
	</a>

	<?php
        $this->load->view('partial/logoutmodal');
	?>

	<script src="js/global.js"></script>
</body>

</html>
