                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800 text-center"><?= $title; ?> Access</h1>

                    <div class="row">
                        <div class="col-lg-6 mx-auto">
                            <!-- Jika Success -->
                            <?= $this->session->flashdata('message'); ?>
                            <div class="row mb-2">
                                <div class="col-lg align-middle">
                                    <h5 class="float-right">Role : <?= $role['role']; ?></h5>
                                    <a href="<?= base_url('leader/role'); ?>" class="btn btn-sm btn-outline-dark">Back</a>
                                </div>
                            </div>
                            <table class="table table-hover table-bordered text-center">
                                <thead class="thead-dark">
                                    <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Menu</th>
                                    <th scope="col">Access</th>
                                    </tr>
                                </thead>
                                <tbody class="text-dark">
                                    <?php $i = 1; ?>
                                    <?php foreach ($menu as $m) : ?>
                                    <tr>
                                        <th scope="row"><?= $i; ?></th>
                                        <td><?= $m['menu']?></td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" <?= check_access($role['id'], $m['id']); ?>
                                                data-role="<?= $role['id']; ?>" data-menu="<?= $m['id']; ?>">
                                            </div>
                                        </td>
                                    </tr>
                                    <?php $i++; ?>
                                    <?php endforeach?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->