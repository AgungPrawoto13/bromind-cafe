                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <div class="row text-dark">
                        <div class="card p-4 col-lg-6 shadow-sm rounded mx-auto">
                            <!-- Page Heading -->
                            <h1 class="h3 mb-3 text-gray-800 text-center">Edit <?= $title; ?></h1>
                            <?php echo form_open_multipart('menu/save');?>
                                <input type="hidden" name="id" id="id" value="<?= $id; ?>" readonly>
                                <div class="form-group row">
                                    <label for="menu" class="col-sm-3 col-form-label">Menu Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="menu" name="menu" 
                                        value="<?= $menu; ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm">
                                        <a href="<?= base_url('menu'); ?>" class="btn btn-outline-secondary">Cancel</a>
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