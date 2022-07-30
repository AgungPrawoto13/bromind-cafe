                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <h1 class="h3 mb-4 text-gray-800 text-center"><?= $title; ?></h1>
                    <div class="row">
                        <?php foreach ($message as $msg) : ?>
                        <div class="col-lg-4">
                            <div class="card shadow-sm mb-3 p-3">
                                <div class="card-body text-dark">
                                    <h5 class="card-title"><?= $msg['name']; ?></h5>
                                    <h5 class="card-title"><?= $msg['email']; ?></h5>
                                    <p class="card-text">
                                        <i>"<?= $msg['comment'] ?>"</i>
                                    </p>
                                </div>
                                <div class="card-footer">
                                    <small class="text-muted"><?= $msg['date_created']; ?></small>
                                </div>
                            </div>
                        </div>
                        <?php endforeach?>
                    </div>
                    <!-- Pagination -->
                    <?= $this->pagination->create_links(); ?>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->