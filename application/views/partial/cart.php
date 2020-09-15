<div class="card shadow mb-4">
									<div class="card-header py-3 text-center">
										<h6 class="m-0 font-weight-bold text-primary">
											Chart
										</h6>
									</div>
									<div class="card-body">
										<div class="card card-7">
											<div class="card-body">
												<form method="POST"
													action="<?php echo site_url('AduanController/insertLaporan'); ?>"
													enctype="multipart/form-data">
													<div class="form-row">
														<div class="name">Judul Pengaduan</div>
														<div class="value">
															<div class="input-group">
																<input class="input--style-5" type="text"
																	name="judul_report" />
															</div>
														</div>
													</div>
													<div class="form-row">
														<div class="name">Isi Pengaduan</div>
														<div class="value">
															<div class="input-group text-justify">
																<!-- <input type="text" class="input--style-5 input-group-text" name="isi_pengaduan"> -->
																<textarea
																	class="form-control input--style-5 input-group-text"
																	name="isi_report"></textarea>
															</div>
														</div>
													</div>
													<div class="form-row">
														<div class="name">Bukti Pengaduan</div>
														<div class="value">
															<div class="input-group">
																<input type="file"
																	class="form-control-file input--style-5"
																	id="bukti_pengaduan" name="foto_report">
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