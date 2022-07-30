                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800 text-center">Daily <?= $title; ?></h1>

                    <div class="row">
                        <div class="col-lg">
                        <!-- Jika error -->
                        <?php if (validation_errors()) : ?>
                            <div class="alert alert-danger" role="alert">
                                <?= validation_errors(); ?>
                            </div>
                        <?php endif; ?>
                        <?= $this->session->role_id == 2 ? '<a href="report/add" class="btn btn-success mb-3">
                            Add new Report</a>' : ''?>

                        <?= $this->session->flashdata('message'); ?>
                        <div class="table-responsive-lg sticky-top">
                            <table class="table table-hover table-bordered text-center">
                                <thead class="thead-dark">
                                    <tr>
                                        <th class="align-middle" scope="col">#</th>
                                        <th class="align-middle" scope="col">Date Created</th>
                                        <th class="align-middle" scope="col">Food List</th>
                                        <th class="align-middle" scope="col">Baverage List</th>
                                        <th class="align-middle" scope="col">Online Income</th>
                                        <th class="align-middle" scope="col">Offline Income</th>
                                        <th class="align-middle" scope="col">Spending</th>
                                        <th class="align-middle" scope="col">Total Income</th>
                                        <th class="align-middle" scope="col">Total Profit</th>
                                        <?= $this->session->role_id == 2 ? '<th class="align-middle" scope="col">Action</th>' : ''?>
                                    </tr>
                                </thead>
                                <tbody class="text-dark">
                                    <?php foreach ($report as $rpt) : ?>
                                    <tr>
                                        <th class="align-middle" scope="row"><?= ++$start; ?></th>
                                        <td class="align-middle"><i><?= $rpt['date_created']; ?></i></td>
                                        <td class="align-middle"><?= $rpt['food']; ?></td>
                                        <td class="align-middle"><?= $rpt['baverg']; ?></td>
                                        <td class="align-middle"><?= 'Rp ' . number_format($rpt['on_income'],0,"","."); ?></td>
                                        <td class="align-middle"><?= 'Rp ' . number_format($rpt['off_income'],0,"","."); ?></td>
                                        <td class="align-middle"><?= 'Rp ' . number_format($rpt['spending'],0,"","."); ?></td>
                                        <td class="align-middle"><?= 'Rp ' . number_format($rpt['income'],0,"","."); ?></td>
                                        <td class="align-middle"><?= 'Rp ' . number_format($rpt['profit'],0,"","."); ?></td>
                                        <?= $this->session->role_id == 2 ? '<td class="align-middle">
                                            <a href="report/edit/'.$rpt['report_id'].'" class="badge badge-info">Edit</a>
                                            <a href="report/delete/'.$rpt['report_id'].'" class="badge badge-danger">Delete</a></td>' : ''
                                        ?>
                                    </tr>
                                    <?php endforeach?>
                                </tbody>
                            </table>
                        </div>
                        <!-- Pagination -->
                        <?= $this->pagination->create_links(); ?>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->