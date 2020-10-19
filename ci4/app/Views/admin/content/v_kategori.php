<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Kategori</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Admin</a></li>
                        <li class="breadcrumb-item active">Kategori</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h2 class="card-title">Data Kategori</h2>
                            <div class="d-flex justify-content-end">
                                <button class="btn btn-primary" data-toggle="modal" data-target="#tambah">Tambah Kategori</button>
                            </div>
                        </div>

                        <!-- Modal Tambah -->
                        <div class="modal fade" id="tambah">
                            <div class="modal-dialog">
                                <form action="/admin/kategori/add" method="POST">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Tambah Kategori</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- form start -->
                                            <div class="form-group">
                                                <label>Nama Kategori</label>
                                                <input type="text" class="form-control" name="kategori" placeholder="Nama Kategori">
                                            </div>
                                        </div>

                                        <div class="modal-footer justify-content-between">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                            <button type="submit" class="btn btn-primary">Tambah </button>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </form>
                            </div>
                            <!-- /.modal-dialog -->
                        </div>
                        <!-- /.modal -->
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="mydata" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Kategori</th>
                                        <th>Nama Kategori</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($kategori as $a) {
                                    ?>
                                        <tr>
                                            <td><?= $no; ?></td>
                                            <td><?= $a->kode_kategori; ?></td>
                                            <td><?= $a->nama_kategori; ?></td>
                                            <td>

                                                <a href="javascript:;" data-toggle="modal" data-target="#modaledit<?= $a->kode_kategori ?>" class="fas fa-edit item_edit"></a>
                                                <a href="javascript:;" data-toggle="modal" data-target="#modalhapus<?= $a->kode_kategori ?>" class="fas fa-trash-alt item_hapus"></a>
                                            </td>
                                        </tr>
                                        <!-- Modal Edit -->
                                        <div class="modal fade" id="modaledit<?= $a->kode_kategori; ?>">
                                            <div class="modal-dialog">
                                                <form action="/admin/kategori/update/" method="POST">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Edit Kategori</h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <!-- form start -->
                                                            <input type="text" name="kode_kategori" hidden value="<?= $a->kode_kategori ?>">
                                                            <div class="form-group">
                                                                <label>Nama kategori</label>
                                                                <input type="text" name="nama_kategori" value="<?= $a->nama_kategori ?>" class="form-control" placeholder="Nama Kategori">
                                                            </div>
                                                        </div>

                                                        <div class="modal-footer justify-content-between">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                                            <button type="submit" class="btn btn-primary">Edit </button>
                                                </form>
                                            </div>
                                        </div>
                                        <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                    <!-- /.modal -->

                    <div class="modal fade" id="modalhapus<?= $a->kode_kategori ?>" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                            <form action="/admin/kategori/hapus" method="post">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Modal title</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <input type="text" hidden name="kode_kategori" value="<?= $a->kode_kategori; ?>">
                                    <div class="modal-body">
                                        <h5>Apakah Anda Yakin akan menghapus data ini?</h5>
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-primary">Hapus</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                <?php $no++;
                                    } ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Kode Kategori</th>
                        <th>Nama Kategori</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
</div>
<!-- /.row -->
</div>
<!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->