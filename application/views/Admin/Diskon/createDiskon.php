<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms /</span> Create New Diskon</h4>

        <div class="row">
            <!-- Basic -->
            <form action="<?= base_url('Admin/cDiskon/createDiskon') ?>" method="POST">
                <div class="col-md-6">
                    <div class="card mb-4">
                        <h5 class="card-header">Data Diskon</h5>
                        <div class="card-body demo-vertical-spacing demo-only-element">
                            <div class="input-group">
                                <select id="produk-diskon" name="produk" class="form-control">
                                    <option value="">Choose this product...</option>
                                    <?php
                                    foreach ($produk as $key => $value) {
                                    ?>
                                        <option data-harga="<?= number_format($value->harga, 0) ?>" value="<?= $value->id_produk ?>" <?php if (set_value('produk') == $value->id_produk) {
                                                                                                                                            echo 'selected';
                                                                                                                                        } ?>><?= $value->nama_produk ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <?= form_error('produk', '<div id="defaultFormControlHelp" class="form-text">', '</div>') ?>
                            <div class="input-group">
                                <span class="input-group-text">Rp.</span>
                                <input type="text" value="<?= set_value('harga') ?>" name="harga" class="harga form-control" readonly />
                                <span class="input-group-text">.00</span>
                            </div>
                            <?= form_error('harga', '<div id="defaultFormControlHelp" class="form-text">', '</div>') ?>
                            <hr>
                            <div class="form-password-toggle">
                                <label class="form-label" for="basic-default-password12">Nama Diskon</label>
                                <div class="input-group">
                                    <input type="text" value="<?= set_value('nama_diskon') ?>" name="nama_diskon" class="form-control" />
                                </div>
                                <?= form_error('nama_diskon', '<div id="defaultFormControlHelp" class="form-text">', '</div>') ?>
                            </div>
                            <div class="input-group">
                                <input type="number" value="<?= set_value('diskon') ?>" name="diskon" class="form-control" placeholder="Besar Diskon" aria-label="Amount (to the nearest dollar)" />
                                <span class="input-group-text">%</span>

                            </div>
                            <?= form_error('diskon', '<div id="defaultFormControlHelp" class="form-text">', '</div>') ?>
                            <div class="form-password-toggle">
                                <label class="form-label" for="basic-default-password12">Tanggal Selesai</label>
                                <div class="input-group">
                                    <input type="date" value="<?= set_value('tgl') ?>" name="tgl" class="form-control" />
                                </div>
                                <?= form_error('tgl', '<div id="defaultFormControlHelp" class="form-text">', '</div>') ?>
                            </div>
                            <hr>
                            <div class="form-password-toggle">
                                <label class="form-label" for="basic-default-password12">Level Member</label>
                                <div class="input-group">
                                    <select name="level" class="form-control">
                                        <option value="">Choose this Level Member...</option>
                                        <option value="1" <?php if (set_value('level') == '1') {
                                                                echo 'selected';
                                                            } ?>>Gold</option>
                                        <option value="2" <?php if (set_value('level') == '2') {
                                                                echo 'selected';
                                                            } ?>>Silver</option>
                                        <option value="3" <?php if (set_value('level') == '3') {
                                                                echo 'selected';
                                                            } ?>>Clasic</option>
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