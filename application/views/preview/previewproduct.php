<div class="card shadow mb-4">
						<div class="card-header py-3">
							<h6 class="m-0 font-weight-bold text-primary text-center">Data Product</h6>
						</div>
						<div class="card-body">
							<div class="table-responsive">
								<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" border="1">
									<thead>
										<tr>
											<th>ID</th>
											<th>Image</th>
											<th>Product Name</th>
											<th>Price</th>
											<th>Stock</th>
										</tr>
									</thead>
									<tbody>
										<?php
									foreach ($product as $data) {
									?>
										<tr>
											<td><?= $data->id_product?></td>
											<td class="text-center"><img src="<?php echo base_url('assets/product/').$data->gambar_product;?>" width="100"></td>
											<td><?= $data->nama_product?></td>
											<td><?= $data->harga_product?></td>
											<td><?= $data->stok_product?></td>
										</tr>
										<?php
									}
										?>
									</tbody>
								</table>
							</div>
						</div>
					</div>