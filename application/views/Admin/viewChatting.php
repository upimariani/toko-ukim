<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <!-- Order Statistics -->
            <div class="col-md-4 col-lg-4 col-xl-4 order-0 mb-4">
                <div class="card h-100">
                    <div class="card-header d-flex align-items-center justify-content-between pb-0">
                        <div class="card-title mb-0">
                            <h5 class="m-0 me-2">Chatting</h5>
                        </div>

                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                        </div>
                        <?php
                        foreach ($chatting as $key => $value) {

                            if ($value->pelanggan_send != null) {
                        ?>
                                <div class="toast-container mb-3">
                                    <div class="bs-toast toast fade show" role="alert" aria-live="assertive" aria-atomic="true">
                                        <div class="toast-header">
                                            <i class="bx bx-mail-send me-2"></i>
                                            <div class="me-auto fw-semibold"><?= $value->nm_pel ?></div>
                                            <small><?= $value->time ?></small>
                                        </div>
                                        <div class="toast-body">
                                            <?= $value->pelanggan_send ?>
                                        </div>
                                    </div>
                                </div>

                            <?php
                            } else if ($value->admin_send != null) {
                            ?>

                                <div class="bs-toast toast fade show bg-success mb-3" role="alert" aria-live="assertive" aria-atomic="true">
                                    <div class="toast-header">
                                        <i class="bx bx-mail-send me-2"></i>
                                        <div class="me-auto fw-semibold">Admin</div>
                                        <small><?= $value->time ?></small>
                                    </div>
                                    <div class="toast-body">
                                        <?= $value->admin_send ?>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                        <?php
                        }
                        ?>


                        <h4>Balasan Chatting</h4>
                        <form action="<?= base_url('Admin/cDashboard/balas/' . $id) ?>" method="POST">
                            <textarea class="form-control" name="pesan" placeholder="Tuliskan pesan anda..."></textarea>
                            <button type="submit" class="btn btn-warning mt-3">Send</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- / Content -->