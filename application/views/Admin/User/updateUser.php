<!-- Content wrapper -->
<div class="content-wrapper">
	<!-- Content -->

	<div class="container-xxl flex-grow-1 container-p-y">
		<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms /</span> Update User</h4>
		<a href="<?= base_url('Admin/cUser') ?>" class="btn btn-danger mb-3"><i class='bx bx-arrow-back'></i> Kembali</a>
		<div class="row">
			<!-- Basic -->
			<?php echo form_open_multipart('Admin/cUser/update/' . $user->id_user); ?>

			<div class="col-md-6">
				<div class="card mb-4">
					<h5 class="card-header">Data User</h5>
					<div class="card-body demo-vertical-spacing demo-only-element">
						<div class="form-password-toggle">
							<label class="form-label" for="basic-default-password12">Nama User</label>
							<div class="input-group">
								<input type="text" name="nama" value="<?= $user->nama_user ?>" class="form-control" />
							</div>
							<?= form_error('nama', '<div id="defaultFormControlHelp" class="form-text">', '</div>') ?>
						</div>
						<div class="form-password-toggle">
							<label class="form-label" for="basic-default-password12">Alamat</label>
							<div class="input-group">
								<input type="text" name="alamat" value="<?= $user->alamat ?>" class="form-control" />
							</div>
							<?= form_error('alamat', '<div id="defaultFormControlHelp" class="form-text">', '</div>') ?>
						</div>
						<div class="form-password-toggle">
							<label class="form-label" for="basic-default-password12">No Telepon</label>
							<div class="input-group">
								<input type="number" name="no_hp" value="<?= $user->no_hp ?>" class="form-control" />
							</div>
							<?= form_error('no_hp', '<div id="defaultFormControlHelp" class="form-text">', '</div>') ?>
						</div>
						<div class="form-password-toggle">
							<label class="form-label" for="basic-default-password12">Username</label>
							<div class="input-group">
								<input type="text" name="username" value="<?= $user->username ?>" class="form-control" />
							</div>
							<?= form_error('username', '<div id="defaultFormControlHelp" class="form-text">', '</div>') ?>
						</div>
						<div class="form-password-toggle">
							<label class="form-label" for="basic-default-password12">Password</label>
							<div class="input-group">
								<input type="text" name="password" value="<?= $user->password ?>" class="form-control" />
							</div>
							<?= form_error('password', '<div id="defaultFormControlHelp" class="form-text">', '</div>') ?>
						</div>
						<div class="form-password-toggle">
							<label class="form-label" for="basic-default-password12">Level User</label>
							<div class="input-group">
								<select class="form-control" name="level">
									<option value="">---Pilih Level User---</option>
									<option value="1" <?php if ($user->level_user == '1') {
															echo 'selected';
														} ?>>Admin</option>
									<option value="2" <?php if ($user->level_user == '2') {
															echo 'selected';
														} ?>>Pemilik</option>
								</select>
							</div>
							<?= form_error('level', '<div id="defaultFormControlHelp" class="form-text">', '</div>') ?>
						</div>

						<button type="submit" class="btn btn-success mb-3"><i class='bx bx-save'></i>Save</button>
					</div>
				</div>
			</div>
			</form>
		</div>
	</div>