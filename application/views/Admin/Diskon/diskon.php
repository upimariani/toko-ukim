<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tables /</span> Diskon</h4>
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

        <a href="<?= base_url('Admin/cDiskon/createDiskon') ?>" class="btn btn-primary mb-3"><i class='bx bxs-pencil'></i>Create Diskon</a>

        <!-- Basic Bootstrap Table -->
        <div class="card">
            <h5 class="card-header">Informasi Diskon Produk</h5>
            <div class="table-responsive text-nowrap">
                <table id="myTable" class="table">
                    <thead>
                        <tr>
                            <th>Nama Produk</th>
                            <th>Harga Sebelumnya</th>
                            <th>Nama Diskon</th>
                            <th>Besar Diskon</th>
                            <th>Tanggal Selesai</th>
                            <th>Level Member</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        <?php
                        foreach ($diskon as $key => $value) {
                        ?>
                            <tr>
                                <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong><?= $value->nama_produk ?></strong></td>
                                <td>Rp. <?= number_format($value->harga, 0) ?></td>
                                <td><?= $value->nama_diskon ?></td>
                                <td><?= $value->diskon ?>%</td>

                                <td><?= $value->tgl_selesai ?></td>
                                <td>
                                    <?php
                                    if ($value->member == '1') {
                                        echo '<span class="badge bg-label-success me-1">Gold</span>';
                                    } else if ($value->member == '2') {
                                        echo '<span class="badge bg-label-primary me-1">Silver</span>';
                                    } else if ($value->member == '3') {
                                        echo '<span class="badge bg-label-danger me-1">Classic</span>';
                                    }
                                    ?>

                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="<?= base_url('Admin/cDiskon/update/' . $value->id_diskon) ?>"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                            <a class="dropdown-item" href="<?= base_url('Admin/cDiskon/delete/' . $value->id_diskon) ?>"><i class="bx bx-trash me-1"></i> Delete</a>
                                        </div>
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
        <!--/ Basic Bootstrap Table -->
    </div>
    <!-- / Content -->