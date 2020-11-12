 <link rel="stylesheet" href="<?= base_url('assets/bizpage/') ?>produk.css">
 <section id="produk">
     <div class="container" data-aos="fade-up">
         <div class="row p-3">
             <div class="col-12">
                 <div class="input-group">
                     <input class="form-control border-secondary py-2" type="search" placeholder="search">
                     <div class="input-group-append">
                         <div class="btn btn-outline-success">
                             <i class="fa fa-search"></i>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
         <div class="row about-cols ">
             <div class="col-md-4 p-3" data-aos="fade-up" data-aos-delay="100">
                 <div class="about-col">
                     <div class="img">
                         <img src="<?= base_url('assets/bizpage/') ?>assets/img/about-mission.jpg" alt="" class="img-fluid">
                     </div>
                     <h2 class="title"><a href="#">hai</a></h2>
                     <p>
                         Lorem ipsum dolor sit amet, consectetur elit, sed do eiusmod tempor ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                     </p>
                     <div class="col">
                         <div class="row">
                             <button class=" form-control col-12 col-md-6" id="detail">Detail</button>
                             <button class="form-control col-12 col-md-6" id="addcart">Add to cart</button>
                         </div>
                     </div>

                 </div>
             </div>

             <div class="col-md-4 p-3" data-aos="fade-up" data-aos-delay="100">
                 <div class="about-col">
                     <div class="img">
                         <img src="<?= base_url('assets/bizpage/') ?>assets/img/about-mission.jpg" alt="" class="img-fluid">
                     </div>
                     <h2 class="title"><a href="#">halo</a></h2>
                     <p>
                         Lorem ipsum dolor sit amet, consectetur elit, sed do eiusmod tempor ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                     </p>
                     <div class="col">
                         <div class="row">
                             <button class="btn btn-outline-success form-control col-12 col-md-6" id="show">Detail</button>
                             <button class="form-control col-12 col-md-6" id="addcart">Add to cart</button>
                         </div>
                     </div>

                 </div>
             </div>
             <?php foreach ($produk as $a) { ?>
                 <div class="col-md-4 p-3" data-aos="fade-up" data-aos-delay="100">
                     <div class="about-col">
                         <div class="img">
                             <img src="<?= base_url('img/') . $a->foto_produk ?>" alt="" style="width: 18rem;" class="img-thumbnail overflow-hidden">
                         </div>
                         <h2 class="title"><a href="#"><?= $a->nama_produk; ?></a></h2>
                         <p>
                             Lorem ipsum dolor sit amet, consectetur elit, sed do eiusmod tempor ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                         </p>
                         <div class="col">
                             <div class="row">
                                 <button class="form-control col-12 col-md-6" id="show">Detail</button>
                                 <button class="form-control col-12 col-md-6" id="addcart">Add to cart</button>
                             </div>
                         </div>

                     </div>
                 </div>
             <?php } ?>

         </div>
     </div>
     </div>
 </section><!-- End About Us Section -->