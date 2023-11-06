<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Pesanan Masuk /</span> Transaksi</h4>
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
        <!-- Basic Bootstrap Table -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <h5 class="card-header">Informasi Transaksi</h5>
                    <div class="table-responsive text-nowrap">
                        <table id="myTable" class="table ">
                            <thead>
                                <tr>
                                    <th>Id Transaksi </th>
                                    <th>Atas Nama</th>
                                    <th>Tanggal Order</th>
                                    <th>Total Bayar</th>
                                    <th>Status Order</th>
                                    <th>Detail</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                <?php
                                foreach ($transaksi['pesanan_masuk'] as $key => $value) {
                                ?>
                                    <tr>
                                        <td><?= $value->id_transaksi ?></td>
                                        <td><?= $value->nm_pel ?></td>
                                        <td><?= $value->tgl_transaksi ?></td>
                                        <td>Rp. <?= number_format($value->total_bayar)  ?></td>
                                        <td><span class="badge bg-danger">Belum Bayar</span></td>
                                        <td><a href="<?= base_url('Admin/cTransaksi/detail_pesanan/' . $value->id_transaksi) ?>"> <i class="bx bx-dots-vertical-rounded"></i></a></td>
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