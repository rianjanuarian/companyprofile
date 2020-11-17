 <link rel="stylesheet" href="<?= base_url('assets/bizpage/') ?>produk.css">
 <section id="produk">
     <div class="container" data-aos="fade-up">
         <div class="row p-3">
             <div class="col-12">
                 <div class="input-group">
                     <input class="form-control border-secondary py-2" id="search" type="search" placeholder="search">
                     <div class="input-group-append">
                         <div class="btn btn-outline-success">
                             <i class="fa fa-search"></i>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
         <div class="row about-cols " id="tampil">
             <?php foreach ($produk as $a) { ?>
                 <div class="col-md-4 p-3" id="card" data-aos="fade-up" data-aos-delay="100">
                     <div class="about-col">
                         <div class="img">
                             <img src="<?= base_url('img/') . $a->foto_produk ?>" alt="" style="height: 18rem;" class="img-thumbnail overflow-hidden">
                         </div>
                         <h2 class="title text-center"><a href="#"><?= $a->nama_produk; ?></a></h2>
                         <p class="text-center">
                             <?= $a->merk; ?>
                         </p>
                         <h6 class="text-center"><strong>Rp. <?= number_format($a->harga, 0, ',', '.'); ?></strong></h6>
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
                 url: "<?= base_url('produk/getproduk') ?>",
                 dataType: "JSON",
                 data: {
                     produk: produk
                 },
                 success: function(data) {
                     console.log(data);
                     $('#tampil').empty();
                     for (i = 0; i < data.length; i++) {
                         $('#tampil').append('<div class="col-md-4 p-3" id="card">' +
                             '<div class="about-col">' +
                             '<div class="img">' +
                             '<img src="./img/' + data[i]['foto_produk'] + '" alt="" style="height: 18rem;" class="img-thumbnail overflow-hidden">' +
                             ' </div>' +
                             '<h2 class="title"><a href="#">' + data[i]['nama_produk'] + '</a></h2>' +
                             '<p>' +
                             ' Lorem ipsum dolor sit amet, consectetur elit, sed do eiusmod tempor ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.' +
                             '</p>' +
                             '<div class="col">' +
                             '<div class="row">' +
                             '<button class="form-control col-12 col-md-6" id="show">Detail</button>' +
                             '<button class="form-control col-12 col-md-6" data-produk="' + data[i]['kode_produk'] + '" data-nama="' + data[i]['nama_produk'] + '" data-harga="' + data[i]['harga'] + '" id="addcart">Add to cart</button>' +
                             '</div>' +
                             '</div>' +
                             '</div>' +
                             '</div>');
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