                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <div class="row">
                        <div class="card p-4 col-lg-8 shadow-sm rounded mx-auto text-dark">
                            <!-- Page Heading -->
                            <h1 class="h3 mb-5 text-gray-800 text-center">Edit <?= $title; ?></h1>
                            <form action="<?= base_url('product/edit/'.$product_id);?>" method="POST" enctype="multipart/form-data">
                                <div class="form-group row">
                                    <div class="col-sm-3">Picture</div>
                                    <div class="col-sm-9">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <img src="<?= base_url('assets/bromind_style/img-product/') . $product_img; ?>" class="img-thumbnail">
                                            </div>
                                            <div class="col-sm-9">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="product_img" name="product_img" value="<?= $product_img;?>">
                                                    <label class="custom-file-label" for="product_img">Choose file</label>
                                                    <?= form_error('product_img','<small class="text-danger pl-3">','</small>');?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="product_id" id="id" value="<?= $product_id; ?>" readonly>
                                <div class="form-group row">
                                    <label for="fav_food" class="col-sm-3 col-form-label">Product Type</label>
                                    <div class="col-sm-9">
                                        <select name="product_type" id="product_type" class="custom-select">
                                            <?php if ($product_type == 'Food') { ?>
                                                <option selected value="Baverage">Baverage</option>
                                            <?php } else { ?>
                                                <option selected value="Food">Food</option>
                                            <?php } ?>
                                            <option selected value="<?= $product_type; ?>"><?= $product_type; ?></option>
                                        </select>
                                        <?= form_error('product_type', '<small class="text-danger pl-3">', '</small>');?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="product_name" class="col-sm-3 col-form-label">Product Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="product_name" name="product_name" 
                                        value="<?= $product_name; ?>">
                                        <?= form_error('product_name', '<small class="text-danger pl-3">', '</small>');?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="name" class="col-sm-3 col-form-label">Price</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="price" name="price" 
                                        value="<?= $price; ?>">
                                        <?= form_error('price', '<small class="text-danger pl-3">', '</small>');?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="description" class="col-sm-3 col-form-label">Description</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" id="description" name="description" 
                                        value="<?= $description; ?>"><?= $description; ?></textarea>
                                        <?= form_error('description', '<small class="text-danger pl-3">', '</small>');?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm">
                                        <a href="<?= base_url('product'); ?>" class="btn btn-outline-secondary">Cancel</a>
                                        <button type="submit" class="btn btn-primary float-right">Save</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->