<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">

        <h1 class="h3 mb-3">Laporan</h1>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body m-sm-3 m-md-5">


                        <div class="row">
                            <div class="col-md-6">
                                <div class="text-muted">Laporan Transaksi Harian</div>
                            </div>
                            <div class="col-md-6 text-md-right">
                                <div class="text-muted">Date</div>
                                <strong><?= $tanggal ?> / <?= $bulan ?> / <?= $tahun ?></strong>
                            </div>
                        </div>

                        <hr class="my-4" />



                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th>Id Transaksi</th>
                                    <th>Tanggal Transaksi</th>
                                    <th>Atas Nama</th>
                                    <th>Produk</th>
                                    <th>Total Bayar</th>
                                    <th>Point</th>
                                    <th>Member</th>
                                </tr>
                                <?php
                                $total = 0;
                                foreach ($laporan as $key => $value) {
                                    $point = (0.5 / 100) * $value->total_bayar;
                                    $total += $value->harga * $value->qty;
                                ?>

                                    <tr>
                                        <td><?= $value->id_transaksi ?></td>
                                        <td><?= $value->tgl_transaksi ?></td>
                                        <td><?= $value->nm_pel ?></td>
                                        <td><?= $value->nama_produk ?></td>
                                        <td>Rp. <?= number_format($value->total_bayar) ?></td>
                                        <td><?= $point ?></td>
                                        <td><?php
                                            if ($value->level_member == '3') {
                                                echo 'Clasic';
                                            } else if ($value->level_member == '2') {
                                                echo 'Silver';
                                            } else {
                                                echo 'Gold';
                                            }
                                            ?></td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </thead>
                            <tbody>
                                <tr>
                                    <th>&nbsp;</th>
                                    <th>&nbsp;</th>
                                    <th>&nbsp;</th>
                                    <th>&nbsp;</th>
                                    <th>
                                        <h3>Total</h3>
                                    </th>
                                    <th class="text-right">
                                        <h3>Rp. <?= number_format($total) ?></h3>
                                    </th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
    </