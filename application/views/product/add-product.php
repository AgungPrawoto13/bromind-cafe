                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <div class="row">
                        <div class="card p-4 col-lg-8 shadow-sm rounded mx-auto text-dark">
                            <!-- Page Heading -->
                            <h1 class="h3 mb-5 text-gray-800 text-center">Add <?= $title; ?></h1>
                            <form action="<?= base_url ('product/addproduct');?>" method="post" enctype="multipart/form-data">
                                <div class="form-group row">
                                    <div class="col-sm-3">Picture</div>
                                    <div class="col-sm-9">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <img src="<?= base_url('assets/img/product/product.png'); ?>" class="img-thumbnail">
                                            </div>
                                            <div class="col-sm-9">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="product_img" name="product_img">
                                                    <label class="custom-file-label" for="product_img">Choose file</label>
                                                    <?= form_error('product_img','<small class="text-danger pl-3">','</small>');?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="product_type" class="col-sm-3 col-form-label">Product Type</label>
                                    <div class="col-sm-9">
                                        <select name="product_type" id="product_type" class="custom-select">
                                            <option selected disable value="">Select Menu</option>
                                            <option value="Food">Food</option>
                                            <option value="Baverage">Baverage</option>
                                        </select>
                                        <?= form_error('product_type', '<small class="text-danger pl-3">', '</small>');?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="product_name" class="col-sm-3 col-form-label">Product Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="product_name" name="product_name" 
                                        value="<?= set_value('product_name'); ?>" placeholder="Product Name">
                                        <?= form_error('product_name', '<small class="text-danger pl-3">', '</small>');?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="name" class="col-sm-3 col-form-label">Price</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="price" name="price" 
                                        value="<?= set_value('price'); ?>" placeholder="Price">
                                        <?= form_error('price', '<small class="text-danger pl-3">', '</small>');?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="description" class="col-sm-3 col-form-label">Description</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" id="description" name="description" 
                                        value="<?= set_value('description'); ?>" placeholder="Description this for product"><?= set_value('description'); ?></textarea>
                                        <?= form_error('description', '<small class="text-danger pl-3">', '</small>');?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm">
                                        <a href="<?= base_url('product'); ?>" class="btn btn-outline-secondary">Cancel</a>
                                        <button type="submit" class="btn btn-primary float-right">Add</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->