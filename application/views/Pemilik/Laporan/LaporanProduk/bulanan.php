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
                                <strong> <?= $bulan ?> / <?= $tahun ?></strong>
                            </div>
                        </div>

                        <hr class="my-4" />



                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th>Id Produk</th>
                                    <th>Nama Produk</th>
                                    <th>Quantity</th>
                                    <th>Subtotal</th>
                                </tr>
                                <?php
                                $total = 0;
                                foreach ($laporan as $key => $value) {
                                    $total += $value->harga;
                                ?>

                                    <tr>
                                        <td><?= $value->id_produk ?></td>
                                        <td><?= $value->nama_produk ?></td>
                                        <td><?= $value->qty ?></td>
                                        <td>Rp. <?= number_format($value->harga * $value->qty) ?></td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </thead>
                            <tbody>
                                <tr>
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