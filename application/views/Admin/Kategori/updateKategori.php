<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms /</span> Update Category</h4>
        <a href="<?= base_url('Admin/cKategori') ?>" class="btn btn-danger mb-3"><i class='bx bx-undo'></i>Kembali</a>
        <div class="row">
            <!-- Basic -->
            <div class="col-md-6">
                <div class="card mb-4">
                    <form action="<?= base_url('Admin/cKategori/update/' . $kategori->id_kategori) ?>" method="POST">
                        <h5 class="card-header">Data Kategori</h5>
                        <div class="card-body demo-vertical-spacing demo-only-element">

                            <div class="form-password-toggle">
                                <label class="form-label" for="basic-default-password12">Nama Kategori</label>
                                <div class="input-group">
                                    <input type="text" name="kategori" value="<?= $kategori->nama_kategori ?>" class="form-control" />

                                </div>
                                <?= form_error('kategori', '<div id="defaultFormControlHelp" class="form-text">', '</div>') ?>
                            </div>
                            <button type="submit" class="btn btn-success mb-3"><i class='bx bx-save'></i>Update</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>