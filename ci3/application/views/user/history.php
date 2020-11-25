<section id="tabs" class="project-tab" style="margin-top: 8%;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <nav>
                    <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">
                            <h6><strong>Dalam Proses</strong></h6>
                        </a>
                        <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">
                            <h6><strong>Tidak berhasil</strong></h6>
                        </a>
                        <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">
                            <h6><strong>Selesai</strong></h6>
                        </a>
                    </div>
                </nav>
                <div class="tab-content mb-5" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                        <?php foreach ($proses as $prs) { ?>
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $prs->kode_penjualan; ?></h5>
                                    Nama Penerima : <?= $prs->username; ?> <br>
                                    Alamat : <?= $prs->alamat; ?>,<?= $prs->kabupaten; ?><br>
                                    Kode Pos : <?= $prs->kode_pos; ?>
                                    <br> Total :<?= $prs->total; ?>
                                    <a href="<?= base_url('History/detail/') . $prs->kode_penjualan; ?>" class="float-right">Detail</a>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="tab-pane fade mb-5" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                        <?php foreach ($gagal as $ggl) { ?>
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $ggl->kode_penjualan; ?></h5>
                                    Nama Penerima : <?= $ggl->username; ?> <br>
                                    Alamat : <?= $ggl->alamat; ?>,<?= $ggl->kabupaten; ?><br>
                                    Kode Pos : <?= $ggl->kode_pos; ?>
                                    <br> Total :<?= $ggl->total; ?>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="tab-pane fade mb-5" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                        <?php foreach ($selesai as $sls) { ?>
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $sls->kode_penjualan; ?></h5>
                                    Nama Penerima : <?= $sls->username; ?> <br>
                                    Alamat : <?= $sls->alamat; ?>,<?= $sls->kabupaten; ?><br>
                                    Kode Pos : <?= $sls->kode_pos; ?>
                                    <br> Total :<?= $sls->total; ?>
                                    <a href="#"></a>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>