<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">

        <h1 class="h3 mb-3">Invoice</h1>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body m-sm-3 m-md-5">


                        <div class="row">
                            <div class="col-md-6">
                                <div class="text-muted">Payment No.</div>
                                <strong><?= $detail['transaksi']->id_transaksi ?></strong>
                            </div>
                            <div class="col-md-6 text-md-right">
                                <div class="text-muted">Payment Date</div>
                                <strong><?= $detail['transaksi']->tgl_transaksi ?></strong>
                            </div>
                        </div>

                        <hr class="my-4" />

                        <!-- <div class="row mb-4">
                            <div class="col-md-6">
                                <div class="text-muted">Client</div>
                                <strong>
                                    <?= $detail['transaksi']->nm_pel ?>
                                </strong>
                                <p>
                                    Level Member <?php
                                                    if ($detail['transaksi']->level_member == '1') {
                                                        echo '<span class="badge bg-warning">Gold</span>';
                                                    } else if ($detail['transaksi']->level_member == '2') {
                                                        echo '<span class="badge bg-success">Silver</span>';
                                                    } else if ($detail['transaksi']->level_member == '3') {
                                                        echo '<span class="badge bg-danger">Classic</span>';
                                                    }
                                                    ?>

                                </p>
                            </div>
                        </div> -->

                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th>Quantity</th>
                                    <th>Nama Produk</th>
                                    <th>Harga</th>
                                    <th>Diskon</th>
                                    <th class="text-right">Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($detail['pesanan'] as $key => $value) {
                                ?>
                                    <tr>
                                        <td><?= $value->qty ?></td>
                                        <td><?= $value->nama_produk ?></td>
                                        <td>Rp. <?= number_format($value->harga, 0)  ?></td>
                                        <td><?= $value->diskon ?>%</td>
                                        <td class="text-right">Rp.<?= number_format(($value->harga - (($value->diskon / 100) * $value->harga)) *  $value->qty) ?></td>
                                    </tr>
                                <?php
                                }
                                ?>

                                <tr>
                                    <th>&nbsp;</th>
                                    <th>&nbsp;</th>
                                    <th>&nbsp;</th>
                                    <th>Subtotal </th>
                                    <th class="text-right">Rp. <?= number_format($detail['transaksi']->total_bayar)  ?></th>
                                </tr>
                            </tbody>
                        </table>
                        <?php
                        if ($detail['transaksi']->status_order == 0) {
                        ?>
                            <?php echo form_open('Admin/cTransaksiLangsung/konfirmasi_selesai/' . $detail['transaksi']->id_transaksi); ?>
                            <input type="hidden" name="pelanggan" value="<?= $detail['transaksi']->id_pelanggan ?>">
                            <input type="hidden" name="total_belanja" value="<?= $detail['transaksi']->total_bayar ?>">
                            <?php
                            $point = 0;
                            $point = (0.5 / 100) * $detail['transaksi']->total_bayar;

                            ?>
                            <input type="hidden" name="point" value="<?= $point ?>">
                            <button type="submit" class="btn btn-success mt-3">Konfirmasi</button>
                            </form>
                        <?php
                        }
                        ?>

                    </div>
                </div>
            </div>
        </div>

    </div>
    </