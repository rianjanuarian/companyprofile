<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>List Artikel</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/Dashboard') ?>">Home</a></li>
                        <li class="breadcrumb-item active">Artikel</li>
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
                            <h3 class="card-title">List Artikel</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="dataTable" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Title</th>
                                        <th>Category</th>
                                        <th>Subcategory</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="mydata">
                                    <?php foreach ($artikel as $index => $artikels) { ?>
                                        <tr>
                                            <td><?= $index + 1; ?></td>
                                            <td><?= $artikels->PostTitle; ?></td>
                                            <td><?= $artikels->CategoryName; ?></td>
                                            <td><?= $artikels->Subcategory; ?></td>
                                            <td class="text-center">
                                                <a href="<?= base_url('admin/Artikel/restore/') . $artikels->id ?>" class="text-right" data-toggle="tooltip" title="Restore" id="tomboledit"><i class="fas fa-trash-restore pr-3"></i></a>
                                                <a href="<?= base_url('admin/Artikel/delete/') . $artikels->id ?>" class="text-right" data-toggle="tooltip" title="Hapus"><i class="fas fa-trash-alt pl-3"></i></a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Title</th>
                                        <th>Category</th>
                                        <th>Subcategory</th>
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