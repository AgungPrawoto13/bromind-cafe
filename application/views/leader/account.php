                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800 text-center"><?= $title; ?></h1>

                    <div class="row">
                        <div class="col-sm-10 mx-auto">
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
                                        <th scope="col">Photo</th>
                                        <th scope="col">Full Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Joined</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="text-dark">
                                    <?php $no = 1; ?>
                                    <?php foreach ($leader as $ldr) : ?>
                                    <tr>
                                        <th class="align-middle" scope="row"><?= $no++; ?></th>
                                        <td class="align-middle">
                                            <img src="<?= base_url('assets/img/profile/') . $ldr['image']; ?>" class="img-thumbnail" style="height: 30px;" />
                                        </td>
                                        <td class="align-middle"><?= $ldr['name']; ?></td>
                                        <td class="align-middle"><?= $ldr['email']; ?></td>
                                        <td class="align-middle">
                                            <?= date('d F Y', $ldr['date_created']); ?></td>
                                        <td class="align-middle">
                                            <a href="<?= base_url('leader/delaccount/'.$ldr['id']); ?>" class="badge badge-danger">Delete</a>
                                        </td>
                                    </tr>
                                    <?php endforeach?>
                                </tbody>
                            </table>
                            <div class="text-center mt-5">
                                <?php if (count($leader) < 1) { ?>
                                    <i class="bg-success text-white font-weight-bold">=> You're site is Save <=</i><br>
                                    <i>~ There is no potential for fake leader accounts ~</i>
                                <?php } else { ?>
                                    <i class="bg-danger text-white">~ There are <?= count($leader) ?> potential fake leader accounts ~</i>
                                <?php } ?>
                            </div>
                        </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->