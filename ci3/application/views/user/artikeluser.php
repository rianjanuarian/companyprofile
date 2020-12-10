<link rel="stylesheet" href="<?= base_url('assets/bizpage/') ?>produk.css">
<style>
    #listkategori:hover {
        background-color: #18d26e;
        color: #fff;
    }

    #listkategori {
        background-color: #fff;
        color: #18d26e;
        border-radius: 50px;
    }
</style>
<main>

    <!------------------------ Site Title ---------------------->

    <section class="site-title p-3" style="margin-top:8% ;">
        <div class="site-background" data-aos="fade-up" data-aos-delay="100">
            <h3>Kentang Artikel</h3>
            <h1>Berita Seputar Teknologi</h1>
        </div>
    </section>

    <!------------x----------- Site Title ----------x----------->

    <!-- --------------------- Blog Carousel ----------------- -->
    <!-- ----------x---------- Blog Carousel --------x-------- -->

    <!-- ---------------------- Site Content -------------------------->

    <section class="container-float m-5">
        <div class="site-content">
            <div class="row">
                <div class="posts col-8">
                    <?php foreach ($artikel as $artikels) { ?>
                        <div class="post-content" data-aos="zoom-in" data-aos-delay="200">

                            <div class="post-image">

                                <div>

                                    <img src="<?= base_url() ?>img/postimages/<?php echo htmlentities($artikels->PostImage); ?>" alt="<?php echo htmlentities($artikels->PostTitle); ?>" class="img-fluid" style="border-radius: 10px;" alt="blog1">
                                </div>
                                <div class="post-info flex-row">
                                    <span><i class="fas fa-user text-gray"></i>&nbsp;&nbsp;Admin</span>
                                    <span><i class="fas fa-calendar-alt text-gray"></i> Posted on <?php echo htmlentities($artikels->PostingDate); ?></span>

                                </div>
                            </div>
                            <div class="post-title">
                                <h2 class="card-title"><?php echo htmlentities($artikels->PostTitle); ?></h2>
                                <p class="card-text"><?php $pt = $artikels->PostDetails;
                                                        echo (substr($pt, 0, 500)); ?></p>
                                <a href="news-details2.php?nid=<?php echo htmlentities($artikels->id) ?>" class="btn btn-success"> Selengkapnya &nbsp; <i class="fas fa-arrow-right"></i></a>
                            </div>

                        </div>
                        <hr>
                    <?php } ?>

                    <!-- <div class="pagination flex-row">
                    <li class="page-item"><a href="?pageno=1" class="page-link">First</a></li>
                    <li class="<?php if ($pageno <= 1) {
                                    echo 'disabled';
                                } ?> page-item">
                        <a href="<?php if ($pageno <= 1) {
                                        echo '#';
                                    } else {
                                        echo "?pageno=" . ($pageno - 1);
                                    } ?>" class="page-link">Prev</a>
                    </li>
                    <li class="<?php if ($pageno >= $total_pages) {
                                    echo 'disabled';
                                } ?> page-item">
                        <a href="<?php if ($pageno >= $total_pages) {
                                        echo '#';
                                    } else {
                                        echo "?pageno=" . ($pageno + 1);
                                    } ?> " class="page-link">Next</a>
                    </li>
                    <li class="page-item"><a href="?pageno=<?php echo $total_pages; ?>" class="page-link">Last</a></li>
                </div> -->

                </div>
                <div class="col-4">
                    <aside class="sidebar">
                        <div class="card">
                            <h3 class="card-header">Cari</h3>
                            <div class="card-body">
                                <div class="newsletter pb-3" data-aos="fade-up" data-aos-delay="300">
                                    <div class="form-element col-9">
                                        <form name="search" action="" method="post">
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="search" placeholder="Artikel">
                                                <button class="btn btn-success ml-1" type="submit">Cari</button>
                                            </div>
                                    </div>
                                </div>
                                <!-- <div class="card mb-4">
    <h5 class="card-header">Search</h5>
    <div class="card-body">
           <form name="search" action="search.php" method="post">
      <div class="input-group">
   
<input type="text" name="searchtitle" class="form-control" placeholder="Search for..." required>
        <span class="input-group-btn">
          <button class="btn btn-secondary" type="submit">Go!</button>
        </span>
      </form>
      </div>
    </div>
  </div> -->
                                <div class="category">
                                    <h2>Kategori</h2>
                                    <?php foreach ($kategori as $index) { ?>
                                        <div class="list col-9">
                                            <h5><a href="category2.php?catid=<?php echo htmlentities($index->CategoryId) ?>" class="form-control" id="listkategori"><?php echo htmlentities($index->CategoryName); ?></a></h5>
                                        </div>
                                    <?php } ?>
                                </div>
                                <div class="popular-post">
                                    <h2>Artikel Terbaru</h2>
                                    <div class="post-content" data-aos="flip-up" data-aos-delay="200">
                                        <?php foreach ($terbaru as $index) {
                                        ?>
                                            <div class="post-title">
                                                - <a href="<?= base_url() . 'Artikel/detail/' . $index->PostUrl ?>"><?php echo htmlentities($index->PostTitle); ?></a>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </section>

    <!-- -----------x---------- Site Content -------------x------------>

</main>