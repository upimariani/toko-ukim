<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tables /</span> Produk</h4>
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

        <a href="<?= base_url('Admin/cProduk/createProduk') ?>" class="btn btn-primary mb-3"><i class='bx bxs-pencil'></i>Create Produk</a>
        <!-- Basic Bootstrap Table -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <h5 class="card-header">Informasi Produk</h5>
                    <div class="table-responsive text-nowrap">
                        <table id="myTable" class="table ">
                            <thead>
                                <tr>
                                    <th>Nama Produk </th>
                                    <th>Deskripsi</th>
                                    <th>Gambar</th>
                                    <th>Tipe</th>
                                    <th>Harga</th>
                                    <th>Stok</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                <?php
                                foreach ($produk as $key => $value) {
                                ?>
                                    <tr>
                                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong><?= $value->nama_produk ?></strong></td>
                                        <td><?= $value->deskripsi ?></td>
                                        <td>
                                            <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                                                <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" title="Lilian Fuller">
                                                    <img src="<?= base_url('asset/foto-produk/' . $value->gambar) ?>" alt="Avatar" class="rounded-circle" />
                                                </li>

                                            </ul>
                                        </td>
                                        <td>
                                            <?php
                                            if ($value->tipe == '1') {
                                                echo '<span class="badge bg-label-primary me-1">Single Product</span>';
                                            } else {
                                                echo '<span class="badge bg-label-secondary me-1">Paket Product</span>';
                                            }
                                            ?>
                                        </td>
                                        <td>Rp. <?= number_format($value->harga, 0) ?></td>
                                        <td><?= $value->stok ?></td>
                                        <td>
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                <i class="bx bx-dots-vertical-rounded"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="<?= base_url('Admin/cProduk/update/' . $value->id_produk) ?>"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                                <a class="dropdown-item" href="<?= base_url('Admin/cProduk/delete/' . $value->id_produk) ?>"><i class="bx bx-trash me-1"></i> Delete</a>
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