<section id="profil" style="margin-top: 10%;">
<div class="container emp-profile">

           
<?= form_open_multipart('profil/ganti_password'); ?>
                <div class="row">
                
                    <div class="col-md-2">
                    
                        
                    <?php $profil['username'] ?>
                    </div>
                    <div class="col-md-8">
                        <div class="tab-content profile-tab" id="myTabContent">
                        
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <?= $this->session->flashdata('message'); ?>
                                        
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Password</label>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="password" class="form-control" id="current_password" value=""  name="current_password">
                                                <p><?= form_error('current_password', '<small class="text-danger pl-3">', '</small>') ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>New Password</label>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="password" class="form-control" id="password1" value="" name="password1">
                                                <p><?= form_error('password1', '<small class="text-danger pl-3">', '</small>') ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Re type New Password</label>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="password" class="form-control" id="password2" value="" name="password2">
                                                <p><?= form_error('password2', '<small class="text-danger pl-3">', '</small>') ?></p>
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