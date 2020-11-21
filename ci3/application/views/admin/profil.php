<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Profil Admin</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/Dashboard') ?>">Home</a></li>
                        <li class="breadcrumb-item active">Profil Admin</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
        <form action="<?php echo base_url('admin/Profil') ?>" method="post"  enctype="multipart/form-data" >
            <div class="row">
                <div class="col-8">
                    <div class="card">
                    
                        <div class="card-header">
                            <h3 class="card-title">Data Diri</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                        
       
                        <div class="form-group col-12">
                            <input type="text" class="form-control" name="username" value= "<?php echo $admin['username']?>" placeholder="Username" readonly>
                        </div>
                        
                        <div class="form-group col-12">
                            <input type="text" class="form-control" name="nama" value= "<?php echo $admin['nama']?>" placeholder="Nama" >
                            <?=form_error('nama', '<small class="text-danger pl-3">', '</small>') ?>
                        </div>
                        <div class="form-group col-2">
                                    <div class="file-field">
                                        <div class="z-depth-2-half mb-3 ml-10">
                                        <img src="<?= base_url('assets/img/profil/') .$admin['foto']; ?>" class=" z-depth-1-half avatar-pic"
                                            alt="Tidak Ada Foto Profil" width="150" height="150">
                                        </div>
                                        <div class="d-flex justify-content-center">
                                        
                                        </div>
                                    </div>
                                   
                                    <input type="file" name="foto" > 
                                    
                        </div>
                       
                            <div>
                                <button type="submit" class="btn btn-primary float-right" > Simpan</button>
                            </div>
                    </div>
                        
                        </div>
                        <!-- /.card-body -->
                        
                    </div>
                    <!-- /.card -->
                  
                </div>
                <!-- /.col -->
            </div>
            </form>

            <form action="<?php echo base_url(). 'admin/Profil/ganti_password' ?>" method="post" enctype="multipart/form-data" >
            <div class="row">
                <div class="col-8">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Ganti Password</h3>  
                        </div>
                        <!-- /.card-header -->
                    <div class="card-body">
                        <div class="form-group col-12">
                            <input type="password" name="password" class="form-control"  placeholder="New Password">
                            <?= form_error('password'); ?>

                        </div>
                        
                        <div class="form-group col-12">
                            <input type="password" name="cpw_baru" class="form-control" placeholder="Confirm Password">
                            <?= form_error('cpw_baru'); ?>
                        </div>
                        <button class="btn btn-primary float-right" >Simpan</button>
                    </div>
                    
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                </form>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->


