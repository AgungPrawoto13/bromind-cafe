                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800 text-center"><?= $title; ?></h1>

                    <div class="row">
                        <div class="col-lg">
                        <!-- Jika error -->
                        <?php if (validation_errors()) : ?>
                            <div class="alert alert-danger" role="alert">
                                <?= validation_errors(); ?>
                            </div>
                        <?php endif; ?>
                        <?= $this->session->flashdata('message'); ?>
                        <?= '<div class="mb-2">There are ' . count($employe) . ' admins here</div>' ?>
                        <div class="table-responsive-lg">
                            <table class="table table-hover table-bordered text-center">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Photo</th>
                                        <th scope="col">Full Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Position</th>
                                        <th scope="col">Joined</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="text-dark">
                                    <?php $i = 1; ?>
                                    <?php foreach ($employe as $em) : ?>
                                    <tr>
                                        <th class="align-middle" scope="row"><?= $i; ?></th>
                                        <td>
                                            <img src="<?= base_url('assets/img/profile/') . $em['image']; ?>" class="img-thumbnail rounded-circle" style="max-width: 40px;" />
                                        </td>
                                        <td class="align-middle"><?= $em['name']; ?></td>
                                        <td class="align-middle"><?= $em['email']; ?></td>
                                        <td class="align-middle"><?= $em['is_active'] == 1 ? 'Aktif' : 'Tidak Aktif' ?></td>
                                        <td class="align-middle"><?= $em['role_id'] == 2 ? 'Kasir' : 'Customer' ?></td>
                                        <td class="align-middle"><?= $em['date_created']; ?></td>
                                        <td class="align-middle">
                                            <a href="<?= base_url('leader/delemployee/'.$em['kd_user']); ?>" class="badge badge-danger">Delete</a>
                                        </td>
                                    </tr>
                                    <?php $i++; ?>
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