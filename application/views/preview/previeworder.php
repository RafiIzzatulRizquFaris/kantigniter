<!-- DataTales Example -->
<div class="card shadow mb-4">
						<div class="card-header py-3">
							<h2 class="m-0 font-weight-bold text-primary text-center">Data Order</h6>
						</div>
						<div class="card-body">
							<div class="table-responsive">
								<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" border="1">
									<thead>
										<tr>
											<th>Code</th>
											<th>Customer ID</th>
											<th>Date</th>
											<th>Note</th>
                                            <th>Status</th>
										</tr>
									</thead>
									<tbody>
										<?php
									foreach ($order as $data) {
									?>
										<tr>
											<td><?= $data->kode?></td>
											<td><?= $data->id_customer?></td>
											<td><?= $data->tanggal?></td>
											<td><?= $data->keterangan?></td>
											<td><?= $data->status_order?></td>
										</tr>
										<?php
									}
										?>
									</tbody>
								</table>
							</div>
						</div>
					</div>