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
                                                <a href="<?= base_url('admin/Artikel/edit/') . $artikels->id ?>" class="text-right" data-toggle="tooltip" title="edit" ><i class="fas fa-edit pr-3"></i></a>
                                                <a href="<?= base_url('admin/Artikel/hapus/') . $artikels->id ?>" class="text-right" data-toggle="tooltip" title="Hapus"><i class="fas fa-trash-alt pl-3"></i></a>
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
<!-- Modal -->
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-title">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <input type="hidden" name="kode" id="kode">
                        <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukkan Nama Kategori">
                    </div>
                    <div class="form-group">
                        <input type="text" name="deskripsi" id="deskripsi" class="form-control" placeholder="Masukkan Deskripsi Kategori">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" id="submit" class="btn btn-primary">Save changes</button>
                </div>
        </div>
        </form>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#tambah').click(function() {
            $('form').attr('action', '<?= base_url('admin/KategoriArtikel/add') ?>');
            $('#modal-title').empty();
            $('#modal-title').append('Tambah kategori');
            $('#modal').modal('show');
            $('#nama').val('');
            $('#deskripsi').val('');
            $('#submit').text('Tambah kategori');
        });
        $('#mydata tr').on('click', '#tomboledit', function() {
            $('form').attr('action', '<?= base_url('admin/KategoriArtikel/update') ?>');
            $('#modal').modal('show');
            $('#modal-title').empty();
            $('#modal-title').append('Edit Kategori');
            $('#submit').empty();
            $('#submit').append('Edit');
            var id = $(this).data('id');
            console.log(id);
            $.ajax({
                url: "<?= base_url('admin/KategoriArtikel') ?>/getkategori",
                dataType: "JSON",
                data: {
                    id: id
                },
                success: function(data) {
                    console.log(data);
                    $('#kode').val(data[0]['id']);
                    $('#nama').val(data[0]['CategoryName']);
                    $('#deskripsi').val(data[0]['Description']);
                }
            });
        })
    });
</script>