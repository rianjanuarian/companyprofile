<section id="profil" style="margin-top: 10%;">
<div class="container emp-profile">

            
                <?= form_open_multipart('profil/edit_profil'); ?>
                <div class="row">
                
                    <div class="col-md-4">
                    
                        <div class="profile-img">
                            <img src="<?= base_url('assets/img/profil/') . $profil['foto']; ?>" alt=""/>
                            
                            <div class="file btn btn-lg btn-primary">
                                Change Photo
                                <input type="file" name="foto" />
                            </div>
                            
                        </div>
                        
                    
                    </div>
                    <div class="col-md-8">
                        <div class="tab-content profile-tab" id="myTabContent">
                        
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Username</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><input type="text" class="form-control" id="username" value="<?= $profil['username']; ?>" name="username" readonly></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Name</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><input type="text" class="form-control" id="nama" value="<?= $profil['nama']; ?>" name="nama"></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Email</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><input type="text" class="form-control" id="email" value="<?= $profil['email']; ?>" name="email"></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Phone</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><input type="text" class="form-control" id="nomor_hp" value="<?= $profil['nomor_hp']; ?>" name="nomor_hp"></p>
                                            </div>
                                        </div>
                                        <button type="submit">Simpan</button>
                            </div>
                            
                        </div>
                    </div>
                   
                </div>
                    </form>
                    
        </div>
        </section>