                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <div class="row text-dark">
                        <div class="card shadow-sm px-4 pt-4 mx-auto col-lg-6">
                        <h1 class="h3 mb-4 text-gray-800 text-center"><?= $title; ?></h1>
                            <?= $this->session->flashdata('message'); ?>
                            <form action="<?= base_url('leader/changepassword'); ?>" method="post">
                                <div class="form-group">
                                    <label for="current_password">Current Password</label>
                                    <input type="password" class="form-control" id="current_password" name="current_password">
                                    <?= form_error('current_password', '<small class="text-danger pl-3">', '</small>');?>
                                </div>
                                <div class="form-group">
                                    <label for="new_password1">New Password</label>
                                    <input type="password" class="form-control" id="new_password1" name="new_password1">
                                    <?= form_error('new_password1', '<small class="text-danger pl-3">', '</small>');?>
                                </div>
                                <div class="form-group">
                                    <label for="new_password2">Repeat New Password</label>
                                    <input type="password" class="form-control" id="new_password2" name="new_password2">
                                    <?= form_error('new_password2', '<small class="text-danger pl-3">', '</small>');?>
                                </div>
                                <div class="form-group">
                                    <button type="reset" class="btn btn-outline-secondary">Reset</button>
                                    <button type="submit" class="btn btn-primary float-right">Change Password</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->