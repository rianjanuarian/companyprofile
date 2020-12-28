<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>List Komen</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/Dashboard') ?>">Home</a></li>
                        <li class="breadcrumb-item active">List Komen</li>
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
                            <h3 class="card-title">List Komen</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="dataTable" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Comment</th>
                                        <th>Post</th>
                                        <th>Comment Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="mydata">
                                    <?php foreach ($komen as $index => $komens) { ?>
                                        <tr>
                                            <td><?= $index + 1; ?></td>
                                            <td><?= $komens->name; ?></td>
                                            <td><?= $komens->email; ?></td>
                                            <td><?= $komens->comment; ?></td>
                                            <td><?= $komens->PostTitle; ?></td>
                                            <td><?= $komens->postingDate; ?></td>
                                            <td class="text-center">
                                                <a href="<?= base_url('admin/Komen/setuju/') . $komens->no ?>" class="text-right pr-3"><i class="fas fa-check"></i></a>
                                                <a href="<?= base_url('admin/Komen/delete/') . $komens->no ?>" class="text-right pl-3"><i class="fas fa-times"></i></a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Comment</th>
                                        <th>Post</th>
                                        <th>Comment Date</th>
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