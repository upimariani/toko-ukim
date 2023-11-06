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
                            <h1 class="mt-3">Chatting Pelanggan</h1>
                            <hr>
                            <div class="comments">

                                <h1 class="comment-title">Chatting</h1>
                                <!-- Single Comment -->
                                <?php
                                foreach ($chat as $key => $value) {

                                    if ($value->pelanggan_send != null) {
                                ?>
                                        <div class="direct-chat-messages">
                                            <div class="single-comment">
                                                <div class="content">
                                                    <h4>Anda <span><?= $value->time ?></span></h4>
                                                    <p><?= $value->pelanggan_send ?></p>
                                                </div>
                                            </div>
                                        </div>

                                    <?php
                                    } else if ($value->admin_send != null) {
                                    ?>

                                        <div class="single-comment left">
                                            <div class="content">
                                                <h4 class="text-danger">Admin <span><?= $value->time ?></span></h4>
                                                <p><?= $value->admin_send ?></p>

                                            </div>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                <?php
                                }
                                ?>

                                <!-- End Single Comment -->
                                <!-- Single Comment -->

                                <!-- End Single Comment -->
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="reply">
                                <div class="reply-head">
                                    <h2 class="reply-title">Balas</h2>
                                    <!-- Comment Form -->
                                    <form class="form" action="<?= base_url('pelanggan/cchatting') ?>" method="POST">
                                        <?php
                                        $id = $this->session->userdata('id');
                                        ?>
                                        <div class="row">
                                            <div class="col-lg-12 col-md-6 col-12">
                                                <div class="form-group">
                                                    <input type="text" name="message" id="text_message_chat" placeholder="Type Message ..." class="form-control">
                                                    <input type="hidden" name="id_pelanggan" value="<?= $id ?>">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group button">
                                                    <button type="submit" class="btn">Kirim</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <!-- End Comment Form -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>