 <link rel="stylesheet" href="<?= base_url('assets/bizpage/') ?>produk.css">
 <section id="produk">
     <div class="container mb-5" data-aos="fade-up">
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
                             <img src="<?= base_url('img/') . $a->foto ?>" alt="" style="height: 18rem;" class="img-thumbnail overflow-hidden">
                         </div>
                         <h2 class="title text-center"><a href="#"><?= $a->nama_produk; ?></a></h2>
                         <p class="text-center">
                             <?= $a->merk; ?>
                         </p>
                         <h6 class="text-center"><strong>Rp. <?= number_format($a->harga, 0, ',', '.'); ?></strong></h6>
                         <div class="col">
                             <div class="row">
                                 <?php if ($this->session->userdata('username') != '') { ?>
                                     <button class="form-control col-12 col-md-12" data-produk="<?= $a->kode_produk ?>" data-nama="<?= $a->nama_produk ?>" data-harga="<?= $a->harga ?>" data-berat="<?= $a->berat ?>" data-gambar="<?= $a->foto ?>" id="addcart">Add to cart</button>
                                 <?php } else { ?>
                                     <button class="form-control col-12 col-md-12" id="tombolcart">Add to cart</button>
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
             var berat = $(this).data('berat');
             var gambar = $(this).data('gambar');
             console.log(produk);
             $.ajax({
                 type: "POST",
                 url: "<?= base_url('produk/addcart') ?>",
                 dataType: "JSON",
                 data: {
                     produk: produk,
                     nama: nama,
                     harga: harga,
                     berat: berat,
                     gambar: gambar
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
                             '<img src="<?= base_url() ?>img/' + data[i]['foto'] + '" alt="" style="height: 18rem;" class="img-thumbnail overflow-hidden">' +
                             ' </div>' +
                             '<h2 class="title text-center"><a href="#">' + data[i]['nama_produk'] + '</a></h2>' +
                             '<p class="text-center">' +
                             data[i]['merk'] +
                             '</p>' +
                             '<div class="col">' +
                             '<div class="row">' +
                             '<button class="form-control col-12 col-md-12" data-produk="' + data[i]['kode_produk'] + '" data-nama="' + data[i]['nama_produk'] + '" data-harga="' + data[i]['harga'] + '" data-berat="' + data[i]['berat'] + '" data-gambar="' + data[i]['foto'] + '" id="addcart">Add to cart</button>' +
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