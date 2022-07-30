                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800 text-center"><?= $title; ?> for customers</h1>

                    <div class="row">
                        <div class="col-lg">
                        <!-- Jika error -->
                        <?php if (validation_errors()) : ?>
                            <div class="alert alert-danger" role="alert">
                                <?= validation_errors(); ?>
                            </div>
                        <?php endif; ?>
                        <?= $this->session->flashdata('message'); ?>
                        <div class="table-responsive-lg">
                            <table class="table table-hover table-bordered text-center">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Promo Name</th>
                                        <th scope="col">Promo Details</th>
                                        <th scope="col">Period</th>
                                        <th scope="col">Status</th>
                                        <?= $this->session->role_id == 1 ? '<th scope="col">Action</th>' : ''?>
                                    </tr>
                                </thead>
                                <tbody class="text-dark">
                                    <?php $no = 1; ?>
                                    <?php foreach ($promo as $pm) : ?>
                                    <tr>
                                        <th scope="row"><?= $no++; ?></th>
                                        <td>
                                            <img src="<?= base_url('assets/img/website/') . $pm['promo_img']; ?>" 
                                            class="img-thumbnail" style="height: 100px;max-width: 100px;" />
                                        </td>
                                        <td><?= $pm['promo_name']; ?></td>
                                        <td><?= $pm['promo_detail']; ?></td>
                                        <td><?= $pm['period']; ?></td>
                                        <td><?= $pm['status'] == 1 ? 'Aktif' : 'Tidak aktif' ?></td>
                                        <?= $this->session->role_id == 1 ? '<td><a href="editpromo/'.$pm['id'].'" class="badge badge-info">Edit</a></td>' : ''?>
                                    </tr>
                                    <?php endforeach?>
                                </tbody>
                            </table>
                        </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->