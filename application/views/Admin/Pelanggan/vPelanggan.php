<!-- Content wrapper -->
<div class="content-wrapper">
	<!-- Content -->

	<div class="container-xxl flex-grow-1 container-p-y">
		<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tables /</span> User</h4>
		<?php
		if ($this->session->userdata('success')) {
		?>
			<div class="alert alert-success alert-dismissible" role="alert">
				<?= $this->session->userdata('success') ?>
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>
		<?php
		}
		?>

		<!-- <button type="button" class="btn btn-warning mb-3" data-bs-toggle="modal" data-bs-target="#tambah">
            Tambah Data Pelanggan
        </button> -->
		<!-- Basic Bootstrap Table -->

		<div class="row">
			<div class="col-lg-12">
				<div class="card">
					<h5 class="card-header">Informasi Pelanggan</h5>
					<div class="table-responsive text-nowrap">
						<table id="myTable" class="table ">
							<thead>
								<tr>
									<th>Nama Pelanggan </th>
									<th>No Telepon</th>
									<th>Jumlah Point</th>
									<th>Level Member</th>
									<!-- <th class="text-center">Edit</th> -->
								</tr>
							</thead>
							<tbody class="table-border-bottom-0">
								<?php
								foreach ($lap['all'] as $key => $value) {
								?>
									<tr>
										<td><?= $value->nm_pel ?></td>
										<td><?= $value->no_tlpon ?></td>
										<td><?= $value->point ?></td>
										<td><?php
											if ($value->level_member == '1') {
												echo ' <span class="badge bg-success">Gold</span>';
											} else if ($value->level_member == '2') {
												echo '<span class="badge bg-warning">Silver</span>';
											} else {
												echo '<span class="badge bg-info">Clasic</span>';
											}
											?></td>
										<!-- <td class="text-center"> <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTop<?= $value->id_pelanggan ?>">
                                                Edit
                                            </button>
                                            <a href="<?= base_url('Admin/cAnalisis_member/hapus_pelanggan/' . $value->id_pelanggan) ?>" class="btn btn-danger">Hapus</a>
                                        </td> -->
									</tr>
									<!-- Modal -->


								<?php
								}
								?>

							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>


		<!--/ Basic Bootstrap Table -->
	</div>
	<!-- / Content -->

	<?php
	foreach ($lap['all'] as $key => $value) {
	?>

		<!-- Slide from Top Modal -->
		<div class="col-lg-4 col-md-6">
			<div class="mt-3">
				<!-- Modal -->
				<div class="modal modal-top fade" id="modalTop<?= $value->id_pelanggan ?>" tabindex="-1">
					<div class="modal-dialog">
						<form action="<?= base_url('Admin/cAnalisis_member/kelola_pelanggan/' . $value->id_pelanggan) ?>" method="POST" class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="modalTopTitle">Kelola Data Pelanggan</h5>
								<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
							</div>
							<div class="modal-body">
								<div class="row">
									<div class="col mb-3">
										<label for="nameSlideTop" class="form-label">Nama Pelanggan</label>
										<input type="text" value="<?= $value->nm_pel ?>" name="nama" id="nameSlideTop" class="form-control" placeholder="Enter Name" />
									</div>
								</div>
								<div class="row g-2">
									<div class="col mb-3">
										<label for="emailSlideTop" class="form-label">Alamat</label>
										<input type="text" value="<?= $value->alamat ?>" name="alamat" id="emailSlideTop" class="form-control" placeholder="xxxx@xxx.xx" />
									</div>
									<div class="col mb-3">
										<label for="dobSlideTop" class="form-label">No Telepon</label>
										<input type="text" value="<?= $value->no_tlpon ?>" name="no_hp" id="dobSlideTop" class="form-control" placeholder="DD / MM / YY" />
									</div>
								</div>
								<div class="row g-2">
									<div class="col mb-0">
										<label for="emailSlideTop" class="form-label">Username</label>
										<input type="text" value="<?= $value->username ?>" name="username" id="emailSlideTop" class="form-control" placeholder="xxxx@xxx.xx" />
									</div>
									<div class="col mb-0">
										<label for="dobSlideTop" class="form-label">Password</label>
										<input type="text" value="<?= $value->password ?>" name="password" id="dobSlideTop" class="form-control" placeholder="DD / MM / YY" />
									</div>
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
									Close
								</button>
								<button type="submit" class="btn btn-primary">Save</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	<?php
	}
	?>
	<!-- Slide from Top Modal -->
	<div class="col-lg-4 col-md-6">
		<div class="mt-3">
			<!-- Modal -->
			<div class="modal modal-top fade" id="tambah" tabindex="-1">
				<div class="modal-dialog">
					<form action="<?= base_url('Admin/cAnalisis_member/tambah_pelanggan') ?>" method="POST" class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="modalTopTitle">Kelola Data Pelanggan</h5>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
							<div class="row">
								<div class="col mb-3">
									<label for="nameSlideTop" class="form-label">Nama Pelanggan</label>
									<input type="text" name="nama" id="nameSlideTop" class="form-control" placeholder="Enter Nama" required />
								</div>
							</div>
							<div class="row g-2">
								<div class="col mb-3">
									<label for="emailSlideTop" class="form-label">Alamat</label>
									<input type="text" name="alamat" id="emailSlideTop" class="form-control" placeholder="Enter Alamat" required />
								</div>
								<div class="col mb-3">
									<label for="dobSlideTop" class="form-label">No Telepon</label>
									<input type="text" name="no_hp" id="dobSlideTop" class="form-control" placeholder="Enter No Telepon" required />
								</div>
							</div>
							<div class="row g-2">
								<div class="col mb-3">
									<label for="emailSlideTop" class="form-label">Username</label>
									<input type="text" name="username" id="emailSlideTop" class="form-control" placeholder="Enter Username" required />
								</div>
								<div class="col mb-3">
									<label for="dobSlideTop" class="form-label">Password</label>
									<input type="text" name="password" id="dobSlideTop" class="form-control" placeholder="Enter Password" required />
								</div>
							</div>
							<div class="row">
								<div class="col mb-3">
									<label for="nameSlideTop" class="form-label">Email</label>
									<input type="email" name="email" id="nameSlideTop" class="form-control" placeholder="Enter Email" required />
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
								Close
							</button>
							<button type="submit" class="btn btn-primary">Save</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>