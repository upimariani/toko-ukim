<!-- Header Inner -->
<div class="header-inner">
    <div class="container">
        <div class="cat-nav-head">
            <div class="row">
                <div class="col-12">
                    <div class="menu-area">
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
                        <li class="active"><a href="blog-single.html">Shop Grid</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumbs -->
<?php
if ($this->session->userdata('success')) {
?>
    <div class="alert alert-success alert-dismissible" role="alert">
        <?= $this->session->userdata('success') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php
}
?>


<!-- Product Style -->
<section class="product-area shop-sidebar shop section">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-4 col-12">
                <div class="shop-sidebar">
                    <!-- Single Widget -->
                    <div class="single-widget category">
                        <h3 class="title">Food List</h3>
                        <ul class="categor-list">
                            <?php
                            foreach ($produk['menu'] as $key => $value) {
                            ?>
                                <li><a href="#"><?= $value->nama_produk ?></a></li>
                            <?php
                            }
                            ?>

                        </ul>
                    </div>
                    <!--/ End Single Widget -->
                </div>
            </div>
            <div class="col-lg-9 col-md-8 col-12">
                <div class="row">
                    <div class="col-12">
                        <!-- Shop Top -->
                        <div class="shop-top">
                            <div class="shop-shorter">
                                <div class="single-shorter">
                                    <label>Show :</label>
                                    <select>
                                        <option selected="selected">09</option>
                                        <option>15</option>
                                        <option>25</option>
                                        <option>30</option>
                                    </select>
                                </div>
                                <div class="single-shorter">
                                    <label>Sort By :</label>
                                    <select>
                                        <option selected="selected">Name</option>
                                        <option>Price</option>

                                    </select>
                                </div>
                            </div>
                            <ul class="view-mode">
                                <li class="active"><a href="shop-grid.html"><i class="fa fa-th-large"></i></a></li>
                                <li><a href="shop-list.html"><i class="fa fa-th-list"></i></a></li>
                            </ul>
                        </div>
                        <!--/ End Shop Top -->
                    </div>
                </div>
                <div class="row">
                    <?php
                    foreach ($produk['menu'] as $key => $value) {
                    ?>

                        <div class="col-lg-4 col-md-6 col-12">
                            <form action="<?= base_url('Pelanggan/cCart/add_cart') ?>" method="POST">
                                <input type="hidden" name="name" value="<?= $value->nama_produk ?>">
                                <input type="hidden" name="id" value="<?= $value->id_diskon ?>">
                                <input type="hidden" name="price" value="<?= $value->harga - ($value->harga * $value->diskon / 100) ?>">
                                <input type="hidden" name="stok" value="<?= $value->stok ?>">
                                <input type="hidden" name="picture" value="<?= $value->gambar ?>">
                                <input type="hidden" name="qty" value="1">
                                <input type="hidden" name="diskon" value="<?= $value->diskon ?>">
                                <div class="single-product">
                                    <div class="product-img">
                                        <a>
                                            <img class="default-img" style="width: 550px; height: 350px;" src="<?= base_url('asset/foto-produk/' . $value->gambar) ?>" alt="#">
                                            <img class="hover-img" style="width: 550px; height: 350px;" src="<?= base_url('asset/foto-produk/' . $value->gambar) ?>" alt="#">
                                            <?php
                                            if ($value->diskon != '0') {
                                            ?>
                                                <span class="price-dec"><?= $value->diskon ?>% Off <br> This <?= $value->nama_diskon ?></span>
                                            <?php
                                            }
                                            ?>

                                        </a>
                                        <div class="button-head">
                                            <div class="product-action">

                                                <a data-toggle="modal" data-target="#exampleModal<?= $value->id_diskon ?>" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
                                            </div>
                                            <div class="product-actio-2">

                                                <button type="submit" class="btn btn-light" title="Add to cart">Add to cart</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <h3><a><?= $value->nama_produk ?></a></h3>
                                        <div class="product-price">
                                            <span>Rp. <?= number_format($value->harga - ($value->harga * $value->diskon / 100), 0) ?></span>
                                            <?php
                                            if ($value->diskon != '0') {
                                                echo '<del><span> Rp. ' . number_format($value->harga, 0) . '</span></del>';
                                            }
                                            ?>

                                        </div>
                                    </div>
                                </div>

                            </form>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!--/ End Product Style 1  -->

<!-- Start Shop Newsletter  -->

</div>
</div>
</div>
</div>
</section>
<!-- End Shop Newsletter -->


<?php
foreach ($produk['menu'] as $key => $value) {
?>
    <form action="<?= base_url('Pelanggan/cCart/add_cart') ?>" method="POST">
        <input type="hidden" name="name" value="<?= $value->nama_produk ?>">
        <input type="hidden" name="id" value="<?= $value->id_diskon ?>">
        <input type="hidden" name="price" value="<?= $value->harga - ($value->harga * $value->diskon / 100) ?>">
        <input type="hidden" name="stok" value="<?= $value->stok ?>">
        <input type="hidden" name="picture" value="<?= $value->gambar ?>">
        <input type="hidden" name="qty" value="1">
        <input type="hidden" name="diskon" value="<?= $value->diskon ?>">
        <!-- Modal -->
        <div class="modal fade" id="exampleModal<?= $value->id_diskon ?>" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="ti-close" aria-hidden="true"></span></button>
                    </div>
                    <div class="modal-body">
                        <div class="row no-gutters">
                            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                <!-- Product Slider -->
                                <div class="product-gallery">
                                    <div class="quickview-slider-active">
                                        <div class="single-slider">
                                            <img src="<?= base_url('asset/foto-produk/' . $value->gambar) ?>" alt="#">
                                        </div>
                                        <div class="single-slider">
                                            <img src="<?= base_url('asset/foto-produk/' . $value->gambar) ?>" alt="#">
                                        </div>
                                        <div class="single-slider">
                                            <img src="<?= base_url('asset/foto-produk/' . $value->gambar) ?>" alt="#">
                                        </div>
                                        <div class="single-slider">
                                            <img src="<?= base_url('asset/foto-produk/' . $value->gambar) ?>" alt="#">
                                        </div>
                                    </div>
                                </div>
                                <!-- End Product slider -->
                            </div>
                            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                <div class="quickview-content">
                                    <h2><?= $value->nama_produk ?></h2>
                                    <div class="quickview-ratting-review">
                                        <div class="quickview-ratting-wrap">
                                            <div class="quickview-ratting">
                                                <i class="yellow fa fa-star"></i>
                                                <i class="yellow fa fa-star"></i>
                                                <i class="yellow fa fa-star"></i>
                                                <i class="yellow fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <a href="#"> (1 customer review)</a>
                                        </div>
                                        <div class="quickview-stock">
                                            <span><i class="fa fa-check-circle-o"></i> <?= $value->stok ?></span>
                                        </div>
                                    </div>
                                    <h3>Rp. <?= number_format($value->harga - ($value->harga * $value->diskon / 100), 0) ?></h3>
                                    <div class="quickview-peragraph">
                                        <p><?= $value->deskripsi ?></p>

                                    </div>

                                    <div class="add-to-cart">
                                        <button type="submit" class="btn">Add to cart</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal end -->
    </form>
<?php
}
?>