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

		<a href="<?= base_url('Admin/cUser/createUser') ?>" class="btn btn-primary mb-3"><i class='bx bxs-pencil'></i> Create User</a>
		<!-- Basic Bootstrap Table -->

		<div class="row">
			<div class="col-lg-12">
				<div class="card">
					<h5 class="card-header">Informasi User</h5>
					<div class="table-responsive text-nowrap">
						<table id="myTable" class="table ">
							<thead>
								<tr>
									<th>Nama User </th>
									<th>Alamat</th>
									<th>No Telepon</th>
									<th>Username</th>
									<th>Password</th>
									<th>Level User</th>
									<th>Actions</th>
								</tr>
							</thead>
							<tbody class="table-border-bottom-0">
								<?php
								foreach ($user as $key => $value) {
								?>
									<tr>
										<td><?= $value->nama_user ?></td>
										<td><?= $value->alamat ?></td>
										<td><?= $value->no_hp ?></td>
										<td><?= $value->username ?></td>
										<td><?= $value->password ?></td>
										<td><?php
											if ($value->level_user == '1') {
											?>
												<span class="badge bg-success">Admin</span>
											<?php
											} else {
											?>
												<span class="badge bg-danger">Pemilik</span>
											<?php
											}
											?>
										</td>
										<td>
											<button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
												<i class="bx bx-dots-vertical-rounded"></i>
											</button>
											<div class="dropdown-menu">
												<a class="dropdown-item" href="<?= base_url('Admin/cUser/update/' . $value->id_user) ?>"><i class="bx bx-edit-alt me-1"></i> Edit</a>
												<a class="dropdown-item" href="<?= base_url('Admin/cUser/delete/' . $value->id_user) ?>"><i class="bx bx-trash me-1"></i> Delete</a>
											</div>
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


		<!--/ Basic Bootstrap Table -->
	</div>
	<!-- / Content -->