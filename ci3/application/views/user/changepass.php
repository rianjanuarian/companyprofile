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
                                                <label>New Password</label>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="password" class="form-control" id="current_password" value=""  name="current_password">
                                                <p><?= form_error('current_password', '<small class="text-danger pl-3">', '</small>') ?></p>
                                            </div>
                                        </div>

                                        
                                        <button type="submit">Simpan</button>
                                        <button type="submit"><a href=".">Kembali</a></button>
                            </div>
                            
                        </div>
                        
                    </div>
                   
                </div>
                    </form>
                    
        </div>
</section>