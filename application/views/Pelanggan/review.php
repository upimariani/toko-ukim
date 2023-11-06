<!-- Header Inner -->
<div class="header-inner">
    <div class="container">
        <div class="cat-nav-head">
            <div class="row">
                <div class="col-12">
                    <div class="menu-area">
                        <!-- Main Menu -->
                        <nav class="navbar navbar-expand-lg">
                            <div class="navbar-collapse">
                                <div class="nav-inner">
                                    <ul class="nav main-menu menu navbar-nav">
                                        <li class="active"><a href="<?= base_url('pelanggan/ckatalog') ?>">Home</a></li>
                                        <li><a href="<?= base_url('Pelanggan/cShopGrid') ?>">Product</a></li>

                                        <li><a href="<?= base_url('Pelanggan/cProfil') ?>">My Account</a></li>
                                        <li><a href="<?= base_url('Pelanggan/cStatusOrder') ?>">My Order</a></li>
                                        <li><a href="<?= base_url('Pelanggan/cChatting') ?>">Chatting</a></li>
                                        <li><a href="<?= base_url('Pelanggan/cStatusOrder/all_review') ?>">All Kritik Saran</a></li>
                                    </ul>
                                </div>
                            </div>
                        </nav>
                        <!--/ End Main Menu -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ End Header Inner -->
</header>
<!--/ End Header -->
<!-- Breadcrumbs -->
<div class="breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="bread-inner">
                    <ul class="bread-list">
                        <li><a href="index1.html">Home<i class="ti-arrow-right"></i></a></li>
                        <li class="active"><a href="blog-single.html">Chatting</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumbs -->

<!-- Start Blog Single -->
<section class="blog-single section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-12">
                <div class="blog-single-main">
                    <div class="row">
                        <div class="col-12">
                            <h1 class="mt-3">Kritik dan Saran All Pelanggan</h1>
                            <hr>
                            <div class="comments">
                                <?php
                                foreach ($review as $key => $value) {

                                    if ($value->isi_kritik != NULL) {
                                ?>
                                        <div class="direct-chat-messages">
                                            <div class="single-comment">
                                                <div class="content">
                                                    <h4><?= $value->nm_pel ?></h4>
                                                    <p><?= $value->isi_kritik ?></p>
                                                </div>
                                            </div>
                                        </div>

                                    <?php
                                    } else if ($value->jawab_kritik != NULL) {
                                    ?>

                                        <div class="single-comment left">
                                            <div class="content">
                                                <h4 class="text-danger">Admin </h4>
                                                <p><?= $value->jawab_kritik ?></p>
                                            </div>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                <?php
                                }
                                ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>