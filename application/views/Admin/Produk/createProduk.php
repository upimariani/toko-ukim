<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms /</span> Create New Product</h4>
        <a href="<?= base_url('Admin/cProduk') ?>" class="btn btn-danger mb-3"><i class='bx bx-arrow-back'></i> Kembali</a>
        <div class="row">
            <!-- Basic -->
            <?php echo form_open_multipart('Admin/cProduk/createProduk'); ?>
            <?php $id = random_string('alnum', '5') ?>
            <input type="hidden" name="id" value="<?= $id ?>">
            <div class="col-md-6">
                <div class="card mb-4">
                    <h5 class="card-header">Data Produk</h5>
                    <div class="card-body demo-vertical-spacing demo-only-element">
                        <div class="form-password-toggle">
                            <label class="form-label" for="basic-default-password12">Nama Produk</label>
                            <div class="input-group">
                                <input type="text" name="nama" class="form-control" />
                            </div>
                            <?= form_error('nama', '<div id="defaultFormControlHelp" class="form-text">', '</div>') ?>
                        </div>
                        <div class="form-password-toggle">
                            <label class="form-label" for="basic-default-password12">Kategori</label>
                            <div class="input-group">
                                <select name="kategori" class="form-control">
                                    <option value="">Choose category product...</option>
                                    <?php
                                    foreach ($kategori as $key => $value) {
                                    ?>
                                        <option value="<?= $value->id_kategori ?>"><?= $value->nama_kategori ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <?= form_error('tipe', '<div id="defaultFormControlHelp" class="form-text">', '</div>') ?>
                        </div>
                        <div class="input-group">
                            <span class="input-group-text">Deskripsi</span>
                            <textarea class="form-control" name="deskripsi" aria-label="With textarea" placeholder="Write..."></textarea>
                        </div>
                        <?= form_error('deskripsi', '<div id="defaultFormControlHelp" class="form-text">', '</div>') ?>
                        <div class="form-password-toggle">
                            <label class="form-label" for="basic-default-password12">Tipe</label>
                            <div class="input-group">
                                <select name="tipe" class="form-control">
                                    <option value="">Choose type product...</option>
                                    <option value="1">Single Product</option>
                                    <option value="2">Paket Product</option>
                                </select>
                            </div>
                            <?= form_error('tipe', '<div id="defaultFormControlHelp" class="form-text">', '</div>') ?>
                        </div>

                        <div class="input-group">
                            <span class="input-group-text">$</span>
                            <input type="number" name="harga" class="form-control" placeholder="Harga" />
                            <span class="input-group-text">.00</span>
                        </div>
                        <?= form_error('harga', '<div id="defaultFormControlHelp" class="form-text">', '</div>') ?>
                        <div class="form-password-toggle">
                            <label class="form-label" for="basic-default-password12">Stok Produk</label>
                            <div class="input-group">
                                <input type="text" name="stok" class="form-control" />

                            </div>
                            <?= form_error('stok', '<div id="defaultFormControlHelp" class="form-text">', '</div>') ?>
                        </div>
                        <div class="form-password-toggle">
                            <label class="form-label" for="basic-default-password12">Gambar Produk</label>
                            <div class="input-group">
                                <input type="file" name="gambar" class="form-control" required />
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success mb-3"><i class='bx bx-save'></i>Save</button>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>