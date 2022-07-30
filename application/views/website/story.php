                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Jika error -->
                    <?php if (validation_errors()) : ?>
                        <div class="alert alert-danger" role="alert">
                            <?= validation_errors(); ?>
                        </div>
                    <?php endif; ?>
                    <div class="row">
                        <?php foreach ($story as $sr) : ?>
                        <div class="col-lg-10 card shadow mx-auto pt-4 pb-2 px-5 text-dark">
                            <?= $this->session->flashdata('message'); ?>
                            <h1 class="h3 mb-4 text-gray-800 text-center"><?= $title; ?></h1>
                            <img src="<?= base_url('assets/img/website/') . $sr['image']; ?>" class="img-fluid mx-auto mb-4" style="width: fit-content;" />
                            <p><?= $sr['p1']; ?></p>
                            <p><?= $sr['p2']; ?></p>
                            <?= $this->session->role_id == 1 ? '<a href="editstory/'. $sr['id'].'" class="btn btn-info mt-2">Edit</a>' : ''?>
                        </div>
                        <?php endforeach?>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->