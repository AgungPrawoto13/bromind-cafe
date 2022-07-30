                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800 text-center">Website <?= $title; ?></h1>

                    <div class="row">
                        <div class="col-lg-11 mx-auto">
                        <!-- Jika error -->
                        <?php if (validation_errors()) : ?>
                            <div class="alert alert-danger" role="alert">
                                <?= validation_errors(); ?>
                            </div>
                        <?php endif; ?>
                        <?= $this->session->flashdata('message'); ?>
                        <div class="table-responsive-lg">
                            <table class="table table-hover table-bordered text-dark">
                                <?php foreach ($website as $web) : ?>
                                <thead class="thead-dark text-center">
                                    <tr>
                                       <th colspan="2">Basic</th> 
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th class="align-middle">Logo</th>
                                        <td class="text-center">
                                            <img src="<?= base_url('assets/img/website/') . $web['logo']; ?>" class="img-thumbnail" style="height: 200px; max-width: 200px;" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Head</th>
                                        <td><?= $web['head']; ?></td>
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
                                            <img src="<?= base_url('assets/img/website/') . $web['loc_img']; ?>" class="img-thumbnail" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Address</th>
                                        <td><?= $web['location']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Maps</th>
                                        <td><?= $web['maps']; ?></td>
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
                                        <td><?= $web['senju']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Sabtu</th>
                                        <td><?= $web['sabtu']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Minggu</th>
                                        <td><?= $web['weekend']; ?></td>
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
                                        <td><?= $web['fb']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Instagram</th>
                                        <td><?= $web['ig']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Youtube</th>
                                        <td><?= $web['yt']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Whatsapp</th>
                                        <td><?= $web['wa']; ?></td>
                                    </tr>
                                </tbody>
                                    <tr class="text-center">
                                        <?= $this->session->role_id == 1 ? '<td colspan="2"><a href="website/edit/'.$web['id'].'" class="btn btn-info">Edit</a></td>' : ''?>
                                    </tr>
                                <?php endforeach?>
                            </table>
                        </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->