                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Jika error -->
                    <?php if (validation_errors()) : ?>
                        <div class="alert alert-danger" role="alert">
                            <?= validation_errors(); ?>
                        </div>
                    <?php endif; ?>
                    <?php echo form_open_multipart('website/savestory');?>
                        <div class="row">
                            <input type="hidden" name="id" id="id" value="<?= $id; ?>" readonly>
                            <div class="col-lg-10 card shadow-lg mx-auto py-4 px-5">
                                <h1 class="h3 mb-4 text-gray-800 text-center">Edit <?= $title; ?></h1>

                                <div class="col-lg-6 mx-auto">
                                    <img src="<?= base_url('assets/img/website/') . $image; ?>" 
                                    class="img-fluid mb-2" style="width: fit-content;" />
                                    <div class="custom-file mb-4">
                                        <input type="file" class="custom-file-input" id="image" name="image">
                                        <label class="custom-file-label" for="image">Choose Image</label>
                                    </div>
                                </div>
                                <p>
                                    <label for="p1" class="text-dark font-weight-bold">Paragraph 1</label>
                                    <textarea class="form-control" id="p1" name="p1" rows="10"
                                    value="<?= $p1; ?>"><?= $p1; ?></textarea>
                                    <?= form_error('p1', '<small class="text-danger pl-3">', '</small>');?>
                                </p>
                                <p>
                                    <label for="p2" class="text-dark font-weight-bold">Paragraph 2</label>
                                    <textarea class="form-control" id="p2" name="p2" rows="10"
                                    value="<?= $p2; ?>"><?= $p2; ?></textarea>
                                    <?= form_error('p2', '<small class="text-danger pl-3">', '</small>');?>
                                </p>
                                <div class="col-lg text-center">
                                    <a href="<?= base_url('website/story'); ?>" class="btn btn-outline-secondary">Cancel</a>
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->