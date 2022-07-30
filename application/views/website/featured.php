                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <h1 class="h3 mb-4 text-gray-800 text-center"><?= $title; ?></h1>
                    <div class="row">
                        <div class="col-lg-11 mx-auto">
                            <div class="card-deck">
                                <?php foreach ($featured as $ftr) : ?>
                                    <div class="card shadow-sm text-dark text-center">
                                        <img src="<?= base_url('assets/img/product/') . $ftr['product_img'] ?>" class="card-img-top" alt="<?= $ftr['product_name'] ?>">
                                        <div class="card-body">
                                            <h5 class="card-title"><?= $ftr['product_name'] ?></h5>
                                            <p class="card-text"><?= 'Rp ' . number_format($ftr['price'],0,"",".") ?></p>
                                        </div>
                                        <div class="card-footer text-center">
                                            <a href="<?= base_url('website/editfeatured/'.$ftr['id']); ?>" class="btn btn-primary btn-sm mx-auto">Edit</a>
                                        </div>
                                    </div>
                                <?php endforeach?>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->