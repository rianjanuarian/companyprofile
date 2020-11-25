<section id="profil" style="margin-top: 10%;">
<div class="container emp-profile">

            <form method="post">
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-img">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS52y5aInsxSm31CvHOFHWujqUx_wWTS9iM6s7BAm21oEN_RiGoog" alt=""/>
                            <div class="file btn btn-lg btn-primary">
                                Change Photo
                                <input type="file" name="file"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        
                    </div>
                    <div class="col-md-2">
                       
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        
                    </div>
                    <div class="col-md-8">
                        <div class="tab-content profile-tab" id="myTabContent">
                        <?= form_open_multipart('profil/edit_profil'); ?>
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Username</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><input type="text" class="form-control" id="username" value="<?= $this->session->userdata('username'); ?>" name="username" readonly></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Name</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><input type="text" class="form-control" id="nama" value="<?= $this->session->userdata('nama'); ?>" name="nama"></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Email</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><input type="text" class="form-control" id="email" value="<?= $this->session->userdata('email'); ?>" name="email"></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Phone</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><input type="text" class="form-control" id="nomor_hp" value="<?= $this->session->userdata('nomor_hp'); ?>" name="nomor_hp"></p>
                                            </div>
                                        </div>
                                        <button type="submit">Simpan</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                    
        </div>
        </section>