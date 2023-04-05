                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800 text-center">Edit Website <?= $title; ?></h1>

                    <div class="row">
                        <div class="col-lg-11 mx-auto">
                        <!-- Jika error -->
                        <?php if (validation_errors()) : ?>
                            <div class="alert alert-danger" role="alert">
                                <?= validation_errors(); ?>
                            </div>
                        <?php endif; ?>
                        <div class="table-responsive-lg">
                        <?php echo form_open_multipart('website/save');?>
                        <input type="hidden" name="id" id="id" value="<?= $id; ?>" readonly>
                            <table class="table table-hover table-bordered text-dark">
                                <thead class="thead-dark text-center">
                                    <tr>
                                       <th colspan="2">Basic</th> 
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th class="align-middle">Logo</th>
                                        <td class="text-center">
                                            <img src="<?= base_url('assets/img/website/') . $logo; ?>" 
                                            class="img-thumbnail" style="height: 200px; max-width: 200px;" />
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="logo" name="logo">
                                                <label class="custom-file-label" for="logo">Choose file</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Head</th>
                                        <td>
                                            <input type="text" class="form-control" id="head" name="head" 
                                            value="<?= $head; ?>">
                                            <?= form_error('head', '<small class="text-danger pl-3">', '</small>');?>
                                        </td>
                                    </tr>
                                </tbody>
                                <thead class="thead-dark text-center">
                                    <tr>
                                       <th colspan="2">Location</th> 
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th class="align-middle">Location</th>
                                        <td class="text-center">
                                            <img src="<?= base_url('assets/img/website/') . $loc_img; ?>" 
                                            class="img-thumbnail" />
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="loc_img" name="loc_img">
                                                <label class="custom-file-label" for="loc_img">Choose file</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Address</th>
                                        <td>
                                            <input type="text" class="form-control" id="location" name="location" 
                                            value="<?= $location; ?>">
                                            <?= form_error('location', '<small class="text-danger pl-3">', '</small>');?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Maps</th>
                                        <td>
                                            <input type="text" class="form-control" id="maps" name="maps" 
                                            value="<?= $maps; ?>">
                                            <?= form_error('maps', '<small class="text-danger pl-3">', '</small>');?>
                                        </td>
                                    </tr>
                                </tbody>
                                <thead class="thead-dark text-center">
                                    <tr>
                                       <th colspan="2">Open Hours</th> 
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th>Senin - jum'at</th>
                                        <td>
                                            <input type="text" class="form-control" id="senju" name="senju" 
                                            value="<?= $senju; ?>">
                                            <?= form_error('senju', '<small class="text-danger pl-3">', '</small>');?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Sabtu</th>
                                        <td>
                                            <input type="text" class="form-control" id="sabtu" name="sabtu" 
                                            value="<?= $sabtu; ?>">
                                            <?= form_error('sabtu', '<small class="text-danger pl-3">', '</small>');?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Minggu</th>
                                        <td>
                                            <input type="text" class="form-control" id="weekend" name="weekend" 
                                            value="<?= $weekend; ?>">
                                            <?= form_error('weekend', '<small class="text-danger pl-3">', '</small>');?>
                                        </td>
                                    </tr>
                                </tbody>
                                <thead class="thead-dark text-center">
                                    <tr>
                                       <th colspan="2">Media Social</th> 
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th>Facebook</th>
                                        <td>
                                            <input type="text" class="form-control" id="fb" name="fb" 
                                            value="<?= $fb; ?>">
                                            <?= form_error('fb', '<small class="text-danger pl-3">', '</small>');?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Instagram</th>
                                        <td>
                                            <input type="text" class="form-control" id="ig" name="ig" 
                                            value="<?= $ig; ?>">
                                            <?= form_error('ig', '<small class="text-danger pl-3">', '</small>');?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Youtube</th>
                                        <td>
                                            <input type="text" class="form-control" id="yt" name="yt" 
                                            value="<?= $yt; ?>">
                                            <?= form_error('yt', '<small class="text-danger pl-3">', '</small>');?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Whatsapp</th>
                                        <td>
                                            <input type="text" class="form-control" id="wa" name="wa" 
                                            value="<?= $wa; ?>">
                                            <?= form_error('wa', '<small class="text-danger pl-3">', '</small>');?>
                                        </td>
                                    </tr>
                                </tbody>
                                    <tr class="text-center">
                                        <td colspan="2">
                                            <a href="<?= base_url('website'); ?>" class="btn btn-outline-secondary mr-3">Cancel</a>
                                            <button type="submit" class="btn btn-primary">Save</button>
                                        </td>
                                    </tr>
                            </table>
                        </form>
                        </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->