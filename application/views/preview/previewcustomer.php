<div class="card shadow mb-4">
						<div class="card-header py-3">
							<h6 class="m-0 font-weight-bold text-primary text-center">Data Customer</h6>
						</div>
						<div class="card-body">
							<div class="table-responsive">
								<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" border="1">
									<thead>
										<tr>
											<th>ID</th>
											<th>Username</th>
											<th>Fullname</th>
											<th>Balance</th>
											<th>Status</th>
										</tr>
									</thead>
									<tbody>
										<?php
									foreach ($customer as $data) {
									?>
										<tr>
											<td><?= $data->id_customer?></td>
											<td><?= $data->username?></td>
											<td><?= $data->nama_customer?></td>
											<td><?= $data->saldo?></td>
											<td><?= $data->status?></td>
										</tr>
										<?php
									}
										?>
									</tbody>
								</table>
							</div>
						</div>
					</div>