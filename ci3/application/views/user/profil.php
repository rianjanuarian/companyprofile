<section id="profil" style="margin-top: 10%;">
  <div class="container mt-3">
    <?= form_open_multipart('Profil') ?>
    <div class="row">

      <div class="col-4">

        <div class="file-field">
          <div class="z-depth-1-half mb-4 ml-2">
            <img src="" class=" z-depth-1-half avatar-pic" alt="example placeholder" width="300" height="250">
          </div>
          <div class="d-flex justify-content-center">
            <div class="btn btn-mdb-color btn-rounded float-left">
              <input type="file" name="foto">
            </div>
          </div>
        </div>
      </div>
      <div class="col-8">
        <div class="form-row">
          <!-- Grid column -->
          <div class="col-md-6">
            <!-- Material input -->
            <?= $this->session->flashdata('message'); ?>
            <div class="md-form form-group">
              <label for="username">username</label>
              <input type="text" class="form-control" id="username" value="<?= $profil[0]->username; ?>" name="username" readonly>
            </div>
          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-md-6">
            <!-- Material input -->
            <div class="md-form form-group">
              <label for="nama">Nama</label>
              <input type="text" class="form-control" id="nama" value="<?= $profil[0]->nama ?>" name="nama">
              <?= form_error('nama', '<small class="text-danger pl-3">', '</small>') ?>
            </div>
          </div>
          <!-- Grid column -->
        </div>
        <!-- Grid row -->

        <!-- Grid column -->
        <div class="col-md-6">
          <!-- Material input -->
          <div class="md-form form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control" id="email" value="<?= $profil[0]->email; ?>" name="email">
            <?= form_error('email', '<small class="text-danger pl-3">', '</small>') ?>
          </div>
        </div>
        <!-- Grid column -->
      </div>

      <!-- Grid column -->
      <div class="col-md-6">
        <!-- Material input -->
        <div class="md-form form-group">
          <label for="nomor_hp">nomor_hp</label>
          <input type="text" class="form-control" id="nomor_hp" value="<?= $profil[0]->nomor_hp ?>" name="nomor_hp">
          <?= form_error('nomor_hp', '<small class="text-danger pl-3">', '</small>') ?>
        </div>
      </div>
      <!-- Grid column -->
    </div>


    <button type="submit" class="btn btn-primary btn-md mb-2">Ganti</button>

  </div>
  </div>
  </form>
  </div>
</section>