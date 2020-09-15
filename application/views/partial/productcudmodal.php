<script>
		function ondelete(id, productname) {
			$("#delete-data").html("")
			let layout =
                `<form action="<?php 
                if ($this->uri->segment(1) == 'Waiter') {
                    echo site_url('Waiter/deleteProduct');
                }else {
                    echo site_url('Admin/deleteProduct');
                }
                ?>" method="POST" >Menghapus <input type="text" name="product_name" readonly value="${productname}"> dengan id <input type="text" name="product_id" readonly value="${id}"><button type="submit" class="btn btn--radius-2 btn-danger btn-block mt-3">Delete</button></form>`
			$("#delete-data").append(layout)
		}

		function onupdate(id, name, price, stock) {
			$("#update-data").html("");
			let layoutupdate = `<div class="card card-7">
						<div class="card-body">
                            <form method="POST" action="<?php 
                            if ($this->uri->segment(1) == 'Waiter') {
                                echo site_url('Waiter/updateProduct'); 
                            }else {
                                echo site_url('Admin/updateProduct');
                            }
                            ?>" enctype="multipart/form-data">
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
								<div class="form-row">
									<div class="name">Image</div>
									<div class="value">
										<div class="input-group">
											<input type="file" class="form-control-file input--style-5" id="image_product" name="image_product">
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
                            <form method="POST" action="<?php
                            if ($this->uri->segment(1) == 'Waiter') {
                                echo site_url('Waiter/insertProduct'); 
                            }else {
                                echo site_url('Admin/insertProduct');
                            }
                            ?>" enctype="multipart/form-data">
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
								<div class="form-row">
									<div class="name">Image</div>
									<div class="value">
										<div class="input-group">
											<input type="file" class="form-control-file input--style-5" id="image_product" name="image_product">
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