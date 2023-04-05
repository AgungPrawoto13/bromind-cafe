                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <div class="row">
                        <div class="card p-4 col-lg-8 shadow-sm rounded mx-auto text-dark">
                            <!-- Page Heading -->
                            <h1 class="h3 mb-5 text-gray-800 text-center">Edit <?= $title; ?></h1>
                            <?php echo form_open_multipart('website/savepromo');?>
                                <div class="form-group row">
                                    <div class="col-sm-3">Image</div>
                                    <div class="col-sm-9">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <img src="<?= base_url('assets/img/website/') . $promo_img; ?>" class="img-thumbnail">
                                            </div>
                                            <div class="col-sm-9">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="promo_img" name="promo_img">
                                                    <label class="custom-file-label" for="promo_img">Choose image</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="id" id="id" value="<?= $id; ?>" readonly>
                                <div class="form-group row">
                                    <label for="promo_name" class="col-sm-3 col-form-label">Promo Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="promo_name" name="promo_name" 
                                        value="<?= $promo_name; ?>">
                                        <?= form_error('promo_name', '<small class="text-danger pl-3">', '</small>');?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="promo_detail" class="col-sm-3 col-form-label">Promo Details</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="promo_detail" name="promo_detail" 
                                        value="<?= $promo_detail; ?>">
                                        <?= form_error('promo_detail', '<small class="text-danger pl-3">', '</small>');?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="period" class="col-sm-3 col-form-label">Period</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="period" name="period" 
                                        value="<?= $period; ?>">
                                        <?= form_error('period', '<small class="text-danger pl-3">', '</small>');?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="status" class="col-sm-3 col-form-label">Status</label>
                                    <div class="col-sm-9">
                                        <select name="status" id="status" class="form-control text-center">
                                            <option value="1">Aktif</option>
                                            <option value="0">Tidak Aktif</option>
                                        </select>
                                        <?= form_error('status', '<small class="text-danger pl-3">', '</small>');?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm">
                                        <a href="<?= base_url('website/promo'); ?>" class="btn btn-outline-secondary">Cancel</a>
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