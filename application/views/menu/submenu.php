                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800 text-center"><?= $title; ?> Management</h1>

                    <div class="row">
                        <div class="col-lg mx-auto">
                        <!-- Jika error -->
                        <?php if (validation_errors()) : ?>
                            <div class="alert alert-danger" role="alert">
                                <?= validation_errors(); ?>
                            </div>
                        <?php endif; ?>
                        <!-- Jika Success -->
                        <!-- <a href="" class="btn btn-success mb-3" data-toggle="modal" data-target="#newSubMenuModal">
                            Add new submenu
                        </a> -->
                        <div class="table-responsive-lg col-lg-10 mx-auto">
                            <?= $this->session->flashdata('message'); ?>
                            <table class="table table-bordered table-hover">
                                <thead class="thead-dark text-center">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Submenu Title</th>
                                        <th class="align-middle" scope="col">Menu</th>
                                        <th class="align-middle" scope="col">Icon</th>
                                        <th class="align-middle" scope="col">Text Icon</th>
                                        <th class="align-middle" scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="text-dark">
                                    <?php $i = 1; ?>
                                    <?php foreach ($subMenu as $sm) : ?>
                                    <tr>
                                        <th class="align-middle" scope="row"><?= $i; ?></th>
                                        <td class="align-middle"><?= $sm['title']?></td>
                                        <td class="align-middle"><?= $sm['menu']?></td>
                                        <td class="text-center align-middle"><i class="<?= $sm['icon']; ?>"></i></td>
                                        <td class="text-center align-middle"><?= $sm['icon']?></td>
                                        <td class="text-center align-middle">
                                            <a href="<?= base_url('menu/subedit/') . $sm['id']; ?>" class="badge badge-info">Edit</a>
                                            <!-- <a href="<= base_url('menu/subdel/') . $sm['id']; ?>" class="badge badge-danger">Delete</a> -->
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

<!-- Modal untuk mennambahkan submenu -->
<!-- <div class="modal fade" id="newSubMenuModal" tabindex="-1" aria-labelledby="newSubMenuModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newSubMenuModalLabel">Add Sub Menu</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<= base_url('menu/submenu'); ?>" method="post">
        <div class="modal-body">
            <div class="form-group">
                <input type="text" class="form-control" id="title" name="title" placeholder="Submenu title">
            </div>
            <div class="form-group">
                <select name="menu_id" id="menu_id" class="form-control">
                    <option value="">Select Menu</option>
                    <php foreach ($menu as $m) : ?>
                        <option value="<= $m['id'] ?>"><= $m['menu'] ?></option>
                    <php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" id="url" name="url" placeholder="Submenu url">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" id="icon" name="icon" placeholder="Submenu icon">
            </div>
            <div class="form-group">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" value="1" name="is_active" id="is_active" checked>
                    <label class="custom-control-label" for="is_active">
                        Active
                    </label>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Add</button>
        </div>
      </form>
    </div>
  </div>
</div> -->