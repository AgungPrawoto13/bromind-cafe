                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <div class="row">
                        <div class="card p-4 col-lg-8 shadow-sm rounded text-dark mx-auto">
                            <!-- Page Heading -->
                            <h1 class="h3 mb-5 text-gray-800 text-center">Edit Daily <?= $title; ?></h1>
                            <?php echo form_open_multipart('report/save');?>
                                <input type="hidden" name="id" id="id" value="<?= $report_id; ?>" readonly>
                                <div class="form-group row">
                                    <label for="fav_food" class="col-sm-3 col-form-label">Food List</label>
                                    <div class="col-sm-9">
                                        <select name="fav_food" id="fav_food" class="custom-select">
                                            <option selected value="<?= $food; ?>"><?= $food; ?></option>
                                            <?php foreach ($product_food as $fd) : ?>
                                                <option value="<?= $fd['product_name']; ?>"><?= $fd['product_name']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <?= form_error('fav_food', '<small class="text-danger pl-3">', '</small>');?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="fav_baverg" class="col-sm-3 col-form-label">Baverage List</label>
                                    <div class="col-sm-9">
                                        <select name="fav_baverg" id="fav_baverg" class="custom-select">
                                            <option selected value="<?= $baverg; ?>"><?= $baverg; ?></option>
                                            <?php foreach ($product_baverg as $bvr) : ?>
                                                <option value="<?= $bvr['product_name']; ?>"><?= $bvr['product_name']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <?= form_error('fav_baverg', '<small class="text-danger pl-3">', '</small>');?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="on_income" class="col-sm-3 col-form-label">Online Income</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="on_income" name="on_income" 
                                        value="<?= $on_income; ?>">
                                        <?= form_error('on_income', '<small class="text-danger pl-3">', '</small>');?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="off_income" class="col-sm-3 col-form-label">Offline Income</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="off_income" name="off_income"
                                        value="<?= $off_income; ?>">
                                        <?= form_error('off_income', '<small class="text-danger pl-3">', '</small>');?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="income" class="col-sm-3 col-form-label">Spending</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="spending" name="spending"
                                        value="<?= $spending; ?>">
                                        <?= form_error('spending', '<small class="text-danger pl-3">', '</small>');?>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm">
                                        <a href="<?= base_url('report'); ?>" class="btn btn-outline-secondary">Cancel</a>
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