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
	<script src="<?php echo base_url('js/scripts.js');?>"></script>
	<script>
		function ondelete(id, productname) {
			$("#delete-data").html("")
			let layout =
				`<form action="<?php echo site_url('Admin/deleteProduct');?>" method="POST" >Menghapus <input type="text" name="product_name" readonly value="${productname}"> dengan id <input type="text" name="product_id" readonly value="${id}"><button type="submit" class="btn btn--radius-2 btn-danger btn-block mt-3">Delete</button></form>`
			$("#delete-data").append(layout)
		}

		function onupdate(id, name, price, stock) {
			$("#update-data").html("");
			let layoutupdate = `<div class="card card-7">
						<div class="card-body">
							<form method="POST" action="<?php echo site_url('Admin/updateProduct'); ?>">
								<div class="form-row">
									<div class="name">ID</div>
									<div class="value">
										<div class="input-group">
											<input class="input--style-5" type="text" name="id_product" readonly value="${id}"/>
										</div>
									</div>
								</div>
								<div class="form-row">
									<div class="name">Nama Product</div>
									<div class="value">
										<div class="input-group">
											<input class="input--style-5" type="text" name="name_product" value="${name}"/>
										</div>
									</div>
								</div>
								<div class="form-row">
									<div class="name">Harga</div>
									<div class="value">
										<div class="input-group">
											<input class="input--style-5" type="text" name="price_product" value="${price}"/>
										</div>
									</div>
								</div>
								<div class="form-row">
									<div class="name">Stock</div>
									<div class="value">
										<div class="input-group">
											<input type="text" class="input--style-5" name="stock_product" value="${stock}">
										</div>
									</div>
								</div>
								<div class="text-center">
									<button class="btn btn--radius-2 btn-success btn-block btn-lg" type="submit">
										Submit
									</button>
								</div>
							</form>
						</div>
					</div>`
			$("#update-data").append(layoutupdate)
		}

		function oninsert() {
			$("#insert-data").html("");
			let layoutupdate = `<div class="card card-7">
						<div class="card-body">
							<form method="POST" action="<?php echo site_url('Admin/insertProduct'); ?>">
								<div class="form-row">
									<div class="name">Nama Product</div>
									<div class="value">
										<div class="input-group">
											<input class="input--style-5" type="text" name="name_product"/>
										</div>
									</div>
								</div>
								<div class="form-row">
									<div class="name">Harga</div>
									<div class="value">
										<div class="input-group">
											<input class="input--style-5" type="text" name="price_product"/>
										</div>
									</div>
								</div>
								<div class="form-row">
									<div class="name">Stock</div>
									<div class="value">
										<div class="input-group">
											<input type="text" class="input--style-5" name="stock_product">
										</div>
									</div>
								</div>
								<div class="text-center">
									<button class="btn btn--radius-2 btn-success btn-block btn-lg" type="submit">
										Submit
									</button>
								</div>
							</form>
						</div>
					</div>`
			$("#insert-data").append(layoutupdate)
		}

	</script>
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

					<div class="container my-3 text-right">
						<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#insertModal" onclick="oninsert()">Tambah Produk</button>
					</div>

					<!-- Page Heading -->
					<!-- <h1 class="h3 mb-2 text-gray-800">Data Customer</h1> -->
					<!-- <p class="mb-4">Mencakup segala data pengaduan yang telah dimasukkan oleh masyarakat</p> -->

					<!-- DataTales Example -->
					<div class="card shadow mb-4">
						<div class="card-header py-3">
							<h6 class="m-0 font-weight-bold text-primary text-center">Data Product</h6>
						</div>
						<div class="card-body">
							<div class="table-responsive">
								<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
									<thead>
										<tr>
											<th>ID</th>
											<th>Product Name</th>
											<th>Price</th>
											<th>Stock</th>
											<th class="text-center">Action</th>
										</tr>
									</thead>
									<tbody>
										<?php
									foreach ($product as $data) {
									?>
										<tr>
											<td><?= $data->id_product?></td>
											<td><?= $data->nama_product?></td>
											<td><?= $data->harga_product?></td>
											<td><?= $data->stok_product?></td>
											<td>
												<button type="button" class="btn btn-warning" data-toggle="modal"
													data-target="#editModal"
													onclick="onupdate('<?php echo $data->id_product?>', '<?php echo $data->nama_product?>', '<?php echo $data->harga_product?>', '<?php echo $data->stok_product?>')">Edit</button>
												<button type="button" class="btn btn-danger" data-toggle="modal"
													data-target="#deleteModal"
													onclick="ondelete('<?php echo $data->id_product?>', '<?php echo $data->nama_product?>')">Delete</button>
											</td>
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
        $this->load->view('partial/cudmodal');
    ?>

	<?php
        $this->load->view('partial/logoutmodal');
	?>

</body>

</html>
