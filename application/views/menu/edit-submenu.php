                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <div class="row">
                        <div class="card p-4 col-lg-6 shadow-sm rounded text-dark mx-auto">
                            <!-- Page Heading -->
                            <h1 class="h3 mb-4 text-gray-800 text-center">Edit <?= $title; ?></h1>
                            <?php echo form_open_multipart('menu/savesub');?>
                                <input type="hidden" name="id" id="id" value="<?= $id; ?>" readonly>
                                <div class="form-group row">
                                    <label for="menu" class="col-sm-3 col-form-label">Menu</label>
                                    <div class="col-sm-9">
                                        <select name="menu" id="menu" class="custom-select">
                                            <!-- <option selected value="<= $menu_id; ?>"><= $menu; ?></option> -->
                                            <?php foreach ($menu as $m) : ?>
                                                <option value="<?= $m['id'] ?>"><?= $m['menu'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <?= form_error('menu', '<small class="text-danger pl-3">', '</small>');?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="head" class="col-sm-3 col-form-label">Submenu Title</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="head" name="head" 
                                        value="<?= $head; ?>">
                                        <?= form_error('head', '<small class="text-danger pl-3">', '</small>');?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="icon" class="col-sm-3 col-form-label">Submenu Title</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="<?= $icon ?>"></i>
                                                </div>
                                            </div>
                                            <input type="text" class="form-control" id="icon" name="icon" 
                                            value="<?= $icon; ?>">
                                            <?= form_error('icon', '<small class="text-danger pl-3">', '</small>');?>
                                            <small id="icon" class="form-text text-muted">
                                                Change text icon with format <i><b>fas fa-fw fas-icon-name ,</b></i>
                                                Get more text icons at <a target="_blank" href="https://fontawesome.com/icons?d=gallery">here</a>
                                            </small>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm">
                                        <a href="<?= base_url('menu/submenu'); ?>" class="btn btn-outline-secondary">Cancel</a>
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