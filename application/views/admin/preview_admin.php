<div class="container-fluid">
					<!-- DataTales Example -->
					<div class="card shadow mb-4">
						<div class="card-header py-3">
							<h6 class="m-0 font-weight-bold text-primary text-center">Data Petugas</h6>
						</div>
						<div class="card-body">
							<div class="table-responsive">
								<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
									<thead>
										<tr>
											<th>ID</th>
											<th>Name</th>
											<th>Position</th>
											<th>Username</th>
											<th>Telephone</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										<?php
										foreach ($petugas as $datap) {
										?>
										<tr>
											<th><?php echo $datap->id_petugas?></th>
											<td><?php echo $datap->nama_petugas?></td>
											<td><?php echo $datap->level?></td>
											<td><?php echo $datap->username?></td>
											<td><?php echo $datap->telp?></td>
											<td>
												<button type="button" class="btn btn-warning" data-toggle="modal"
													data-target="#editModal"
													onclick="onupdate('<?php echo $datap->id_petugas?>', '<?php echo $datap->nama_petugas?>', '<?php echo $datap->username?>', '<?php echo $datap->telp?>')">Edit</button>
												<button type="button" class="btn btn-danger" data-toggle="modal"
													data-target="#deleteModal"
													onclick="ondelete('<?php echo $datap->id_petugas?>', '<?php echo $datap->nama_petugas?>')">Delete</button>
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