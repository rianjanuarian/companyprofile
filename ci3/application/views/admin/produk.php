<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>List Produk</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/Dashboard') ?>">Home</a></li>
                        <li class="breadcrumb-item active">Kategori</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Data Produk</h3>
                            <button class="btn btn-primary float-right" id="tambah">Tambah Produk</button>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Foto</th>
                                        <th>Nama Produk</th>
                                        <th>Nama Kategori</th>
                                        <th>Merk</th>
                                        <th>Harga</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="mydata">
                                    <?php foreach ($produk as $index => $a) { ?>
                                        <tr>
                                            <td><?= $index + 1; ?></td>
                                            <td></td>
                                            <td><?= $a->nama_produk; ?></td>
                                            <td><?= $a->nama_kategori; ?></td>
                                            <td><?= $a->merk; ?></td>
                                            <td><?= $a->harga; ?></td>
                                            <td class="text-center">
                                                <a href="javascript:;" class="text-right" data-id="<?= $a->kode_produk; ?>" id="tomboledit"><i class="fas fa-edit pr-3"></i></a>
                                                <a href="" class="text-right"><i class="fas fa-trash-alt pl-3"></i></a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Foto</th>
                                        <th>Nama Produk</th>
                                        <th>Nama Kategori</th>
                                        <th>Merk</th>
                                        <th>Harga</th>
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
                    <div class="row">
                        <div class="form-group col-12">
                            <input type="hidden" name="kode" id="kode">
                            <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukkan Nama Produk">
                        </div>
                        <div class="form-group col-6">
                            <select name="kategori" class="form-control" id="kategori">
                                <?php foreach ($kategori as $b) { ?>
                                    <option value="<?= $b->kode_kategori; ?>"><?= $b->nama_kategori; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group col-6">
                            <input type="text" name="merk" id="merk" class="form-control" placeholder="Masukkan Nama Merk">
                        </div>
                        <div class="form-group col-12">
                            <input type="number" name="stok" id="stok" class="form-control" placeholder="Masukkan Stok Produk">
                        </div>
                        <div class="form-group col-12">
                            <input type="number" name="harga" id="harga" class="form-control" placeholder="Masukkan Harga Produk">
                        </div>
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
            $('form').attr('action', '<?= base_url('admin/produk/add') ?>');
            $('#modal-title').empty();
            $('#modal-title').append('Tambah Produk');
            $('#modal').modal('show');
            $('#nama').val('');
            $('#submit').text('Tambah Produk');
        });
        $('#mydata tr').on('click', '#tomboledit', function() {
            $('form').attr('action', '<?= base_url('admin/Produk/update') ?>');
            $('#modal').modal('show');
            $('#modal-title').empty();
            $('#modal-title').append('Edit Produk');
            $('#submit').empty();
            $('#submit').append('Edit Produk');
            var id = $(this).data('id');
            console.log(id);
            $.ajax({
                url: "<?= base_url('admin/Produk') ?>/getproduk",
                dataType: "JSON",
                data: {
                    id: id
                },
                success: function(data) {
                    console.log(data);
                    $('#kode').val(data[0]['kode_produk']);
                    $('#nama').val(data[0]['nama_produk']);
                    $('#kategori').val(data[0]['kode_kategori']);
                    $('#merk').val(data[0]['merk']);
                    $('#stok').val(data[0]['stok']);
                    $('#harga').val(data[0]['harga']);
                }
            });
        })
    });
</script>