<!-- DataTales Example -->
<div class="card shadow mb-4">
									<div class="card-header py-3">
										<h6 class="m-0 font-weight-bold text-primary text-center">Product</h6>
									</div>
									<div class="card-body">
										<div class="table-responsive">
											<table class="table table-bordered" id="dataTable" width="100%"
												cellspacing="0">
												<thead>
													<tr>
														<th>Image</th>
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
														<td><img src="<?php echo base_url('assets/product/').$data->gambar_product;?>" width="100"></td>
														<td><?= $data->nama_product?></td>
														<td><?= $data->harga_product?></td>
														<td><?= $data->stok_product?></td>
														<td class="text-center">
															<button type="button" class="btn btn-success"
																onclick="buyproduct('<?php echo $data->id_product?>', '<?php echo $data->nama_product?>', '<?php echo $data->harga_product?>', '<?php echo $data->gambar_product?>')">Buy</button>
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