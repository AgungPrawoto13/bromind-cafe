                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800 text-center">List <?= $title; ?></h1>

                    <div class="row">
                        <div class="col-lg">
                        <!-- Jika error -->
                        <?php if (validation_errors()) : ?>
                            <div class="alert alert-danger" role="alert">
                                <?= validation_errors(); ?>
                            </div>
                        <?php endif; ?>
                        <?= $this->session->flashdata('message'); ?>

                        <?= $this->session->role_id == 1 ? '<a href="product/addproduct" class="btn btn-success mb-3">Add Product</a>' : '' ?>

                        <div class="row mb-2">
                            <div class="col-sm-3 col-lg-6">
                                <span class="align-text-bottom">
                                    Total products : <?= $total_rows; ?>
                                </span>
                            </div>
                            <div class="col-sm-9 col-lg-6">
                                <form action="<?= base_url('product') ?>" method="post">
                                    <div class="form-inline float-right">
                                        <div class="col-auto">
                                            <select name="product_type" id="product_type" class="custom-select">
                                                <option value="">All Product</option>
                                                <option value="Food" >Food</option>
                                                <option value="Baverage">Baverage</option>
                                            </select>
                                        </div>
                                        <div class="col-auto">
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="keyword" name="keyword" 
                                                placeholder="Search here" style="width: 120px; border-radius: 30px 0 0 30px;">
                                                <div class="input-group-append">
                                                    <input class="btn btn-primary font-weight-bold" type="submit" value="GO" 
                                                    name="submit" style="border-radius: 0 30px 30px 0;"></input>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="table-responsive-lg">
                            <table class="table table-hover table-bordered text-center text-dark">
                                <thead class="thead-dark">
                                    <tr>
                                        <th class="align-middle" scope="col">#</th>
                                        <th class="align-middle" scope="col">Photo</th>
                                        <th class="align-middle" scope="col">Product Name</th>
                                        <th class="align-middle" scope="col">Price</th>
                                        <th class="align-middle" scope="col">Type</th>
                                        <th class="align-middle" scope="col">Description</th>
                                        <?= $this->session->role_id == 1 ? '<th class="align-middle" scope="col">Action</th>' : ''?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($product as $pd) : ?>
                                    <tr>
                                        <th class="align-middle" scope="row"><?= ++$start; ?></th>
                                        <td class="align-middle">
                                            <img src="<?= base_url('assets/img/product/') . $pd['product_img']; ?>" 
                                            class="img-thumbnail" style="height: 80px; max-width: 80px;" />
                                        </td>
                                        <td class="align-middle"><?= $pd['product_name']; ?></td>
                                        <td class="align-middle"><?= 'Rp ' . number_format($pd['price'],0,"","."); ?></td>
                                        <td class="align-middle"><?= $pd['product_type']; ?></td>
                                        <td class="align-middle"><?= $pd['description']; ?></td>
                                        <?= $this->session->role_id == 1 ? '<td class="align-middle">
                                            <a href="product/edit/'.$pd['product_id'].'" class="badge badge-info">Edit</a>
                                            <a href="product/delete/'.$pd['product_id'].'" class="badge badge-danger">Delete</a></td>' : ''?>
                                    </tr>
                                    <?php endforeach?>
                                </tbody>
                            </table>

                            <?php if (count($product) < 1) { ?>
                                <div class="text-center my-5">
                                    <i>There is no corresponding product name or product price</i>
                                </div>
                            <?php } else { ?>
                                <div class="text-right">
                                    <i>Found <?= $total_rows ?> matching products</i><br>
                                </div>
                            <?php } ?>

                            <!-- Pagination -->
                            <?= $this->pagination->create_links(); ?>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->