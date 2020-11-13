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
                 <div class="col-md-4 p-3" id="card" data-aos="fade-up" data-aos-delay="100">
                     <div class="about-col">
                         <div class="img">
                             <img src="<?= base_url('img/') . $a->foto_produk ?>" alt="" style="height: 18rem;" class="img-thumbnail overflow-hidden">
                         </div>
                         <h2 class="title"><a href="#"><?= $a->nama_produk; ?></a></h2>
                         <p>
                             Lorem ipsum dolor sit amet, consectetur elit, sed do eiusmod tempor ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                         </p>
                         <div class="col">
                             <div class="row">
                                 <button class="form-control col-12 col-md-6" id="show">Detail</button>
                                 <?php if ($this->session->userdata('username') != '') { ?>
                                     <button class="form-control col-12 col-md-6" data-produk="<?= $a->kode_produk ?>" data-nama="<?= $a->nama_produk ?>" data-harga="<?= $a->harga ?>" id="addcart">Add to cart</button>
                                 <?php } else { ?>
                                     <button class="form-control col-12 col-md-6" id="tombolcart">Add to cart</button>
                                 <?php } ?>
                             </div>
                         </div>

                     </div>
                 </div>
             <?php } ?>

         </div>
     </div>
     </div>
 </section><!-- End About Us Section -->
 <script>
     $(document).ready(function() {
         $("#card #addcart").click(function() {
             var produk = $(this).data('produk');
             var nama = $(this).data('nama');
             var harga = $(this).data('harga');
             console.log(produk);
             $.ajax({
                 type: "POST",
                 url: "<?= base_url('produk/addcart') ?>",
                 dataType: "JSON",
                 data: {
                     produk: produk,
                     nama: nama,
                     harga: harga,
                 },
                 success: function(data) {
                     console.log(data);
                     $("#mycart").html(data);
                     Swal.fire({
                         icon: "success",
                         title: "Berhasil Add to cart",
                         showConfirmButton: false,
                         timer: 1500,
                     });
                 },
             });
         });
         $('#search').keyup(function() {
             var produk = $(this).val();
             $.ajax({
                 type: "POST",
                 url: "<?= base_url('pelanggan/produk/getproduk') ?>",
                 dataType: "JSON",
                 data: {
                     produk: produk
                 },
                 success: function(data) {
                     console.log(data);
                     $('.row').empty();
                     for (i = 0; i < data.length; i++) {
                         $('.row').append('<div class="card col-6 col-md-3 p-2">' +
                             '<div class="card-body">' +
                             '<h5 class="card-title" id="nama_produk">' + data[i]['nama_produk'] + '</h5>' +
                             '<p class="card-text" id="harga_produk">' + data[i]['harga_produk'] + '</p>' +
                             '<p class="card-text">' + data[i]['nama_bs'] + '</p>' +
                             '<a href = "javascript:;"' +
                             ' id = "addcart"' +
                             '  class = "btn text-center open-submit col-12 col-md-12"' +
                             ' data - produk = "' + data[i]['kode_produk'] + '"' +
                             ' data - harga = "' + data[i]['harga_produk'] + '"' +
                             ' data - nama = "' + data[i]['nama_produk'] + '" > Add to cart </a>' +
                             '</div></div>');
                     }
                 },
             });
         });
         $("#card #tombolcart").click(function() {
             Swal.fire({
                 icon: "warning",
                 title: "Anda Harus login terlebih dahulu",
                 showConfirmButton: false,
                 timer: 1500,
             });
         });
     })
 </script>