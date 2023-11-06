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
                        <li class="active"><a href="blog-single.html">Contact</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumbs -->

<!-- Start Contact -->
<section id="contact-us" class="contact-us section">
    <div class="container">
        <div class="contact-head">
            <div class="row">
                <div class="col-lg-8 col-12">
                    <div class="form-main">
                        <div class="title">
                            <h4>Profil Pelanggan</h4>
                            <h3>Perbaharui Data Pelanggan</h3>
                        </div>
                        <form class="form" method="post" action="<?= base_url() ?>/pelanggan/cprofil/update_profil">
                            <div class="row">
                                <div class="col-lg-6 col-12">
                                    <div class="form-group">
                                        <label>Nama Pelanggan<span>*</span></label>
                                        <input name="nama" value="<?= $pelanggan->nm_pel ?>" type="text" placeholder="">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12">
                                    <div class="form-group">
                                        <label>No Telepon<span>*</span></label>
                                        <input name="no_hp" value="<?= $pelanggan->no_tlpon ?>" type="number" placeholder="">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group message">
                                        <label>Alamat<span>*</span></label>
                                        <textarea name="alamat" placeholder=""><?= $pelanggan->alamat ?></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12">
                                    <div class="form-group">
                                        <label>Username<span>*</span></label>
                                        <input name="username" value="<?= $pelanggan->username ?>" type="text" placeholder="">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12">
                                    <div class="form-group">
                                        <label>Password<span>*</span></label>
                                        <input name="password" value="<?= $pelanggan->password ?>" type="text" placeholder="">
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group button">
                                        <button type="submit" class="btn ">Send Message</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-4 col-12">
                    <div class="single-head">
                        <div class="single-info">
                            <i class="fa fa-user"></i>
                            <h4 class="title">Member</h4>
                            <ul>
                                <li>Point anda saat ini sebanyak <strong><?= $pelanggan->point ?> point</strong></li>
                                <li class="mt-5">
                                    <h5>Level Member <strong>
                                            <?php
                                            if ($pelanggan->level_member == '3') {
                                                echo 'Classic';
                                            } else if ($pelanggan->level_member == '2') {
                                                echo 'Silver';
                                            } else {
                                                echo 'Gold';
                                            }
                                            ?>
                                        </strong></h5>
                                </li>
                                <li>
                                    <p class="mb-3">Silahkan anda melakukan transaksi lebih banyak agar anda dapat meningkatkan level member anda!</p>
                                    <?php
                                    $vol1 = $pelanggan->point / 10;
                                    $vol2 = $pelanggan->point / 100;
                                    if ($pelanggan->level_member == '3') {
                                    ?>
                                        <div class="progress">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: <?= $vol1 ?>%" aria-valuenow="<?= $pelanggan->point ?>" aria-valuemin="0" aria-valuemax="1000">Silver 1000 point</div>
                                        </div>
                                    <?php
                                    } else if ($pelanggan->level_member == '2') {
                                    ?>
                                        <div class="progress">
                                            <div class="progress-bar bg-warning" role="progressbar" style="width:  <?= $vol2 ?>%" aria-valuenow="<?= $pelanggan->point ?>" aria-valuemin="0" aria-valuemax="10000">Gold 10000 point</div>
                                        </div>
                                    <?php
                                    }
                                    ?>

                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--/ End Contact -->

<!-- Map Section -->
<div class="map-section">
    <div id="myMap"></div>
</div>
<!--/ End Map Section -->

<!-- Start Shop Newsletter  -->
<section class="shop-newsletter section">
    <div class="container">
        <div class="inner-top">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 col-12">
                    <!-- Start Newsletter Inner -->
                    <div class="inner">
                        <h4>Newsletter</h4>
                        <p> Subscribe to our newsletter and get <span>10%</span> off your first purchase</p>
                        <form action="mail/mail.php" method="get" target="_blank" class="newsletter-inner">
                            <input name="EMAIL" placeholder="Your email address" required="" type="email">
                            <button class="btn">Subscribe</button>
                        </form>
                    </div>
                    <!-- End Newsletter Inner -->
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Shop Newsletter -->