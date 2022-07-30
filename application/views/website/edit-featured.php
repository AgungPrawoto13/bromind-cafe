                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <div class="row text-dark">
                        <div class="card p-4 col-lg-6 shadow-sm rounded mx-auto">
                            <!-- Page Heading -->
                            <h1 class="h3 mb-4 text-gray-800 text-center">Edit <?= $title; ?></h1>
                            <?php echo form_open_multipart('website/saveftr');?>
                                <input type="hidden" name="id" id="id" value="<?= $id; ?>" readonly>
                                <div class="form-group row">
                                    <label for="list" class="col-sm-4 col-form-label">Featured Product</label>
                                    <div class="col-sm-8">
                                        <select name="list" id="list" class="custom-select">
                                            <?php foreach ($list as $ls) : ?>
                                                <option value="<?= $ls['id'] ?>"><?= $ls['product_name'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm">
                                        <a href="<?= base_url('website/featured'); ?>" class="btn btn-outline-secondary">Cancel</a>
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