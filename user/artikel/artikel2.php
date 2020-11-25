<?php 
session_start();
include('includes/config.php');

    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Artikel</title>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="./css/all.css">


    <!-- --------- Owl-Carousel ------------------->
    <link rel="stylesheet" href="./css/owl.carousel.min.css">
    <link rel="stylesheet" href="./css/owl.theme.default.min.css">

    <!-- ------------ AOS Library ------------------------- -->
    <link rel="stylesheet" href="./css/aos.css">

    <!-- Custom Style   -->
    <link rel="stylesheet" href="./css/Style.css">

</head>

<body>

    <!-- ----------------------------  Navigation ---------------------------------------------- -->

    <?php include('includes/header2.php');?>

    <!-- ------------x---------------  Navigation --------------------------x------------------- -->

    <!----------------------------- Main Site Section ------------------------------>

    <main>

        <!------------------------ Site Title ---------------------->

        <section class="site-title">
            <div class="site-background" data-aos="fade-up" data-aos-delay="100">
                <h3>Kentang Artikel</h3>
                <h1>Berita Seputar Teknologi</h1>
                
            </div>
        </section>

        <!------------x----------- Site Title ----------x----------->

        <!-- --------------------- Blog Carousel ----------------- -->

     

        <!-- ----------x---------- Blog Carousel --------x-------- -->

        <!-- ---------------------- Site Content -------------------------->

        <section class="container">
     
            <div class="site-content">
                
                <div class="posts">
                <?php 
                 if (isset($_GET['pageno'])) {
            $pageno = $_GET['pageno'];
           } else {
            $pageno = 1;
             }
              $no_of_records_per_page = 8;
             $offset = ($pageno-1) * $no_of_records_per_page;


              $total_pages_sql = "SELECT COUNT(*) FROM tblposts";
              $result = mysqli_query($con,$total_pages_sql);
             $total_rows = mysqli_fetch_array($result)[0];
              $total_pages = ceil($total_rows / $no_of_records_per_page);


                $query=mysqli_query($con,"select tblposts.id as pid,tblposts.PostTitle as posttitle,tblposts.PostImage,tblcategory.CategoryName as category,tblcategory.id as cid,tblsubcategory.Subcategory as subcategory,tblposts.PostDetails as postdetails,tblposts.PostingDate as postingdate,tblposts.PostUrl as url from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.Is_Active=1 order by tblposts.id desc  LIMIT $offset, $no_of_records_per_page");
                  while ($row=mysqli_fetch_array($query)) {
                    ?>
                    <div class="post-content" data-aos="zoom-in" data-aos-delay="200">
                        
                        <div class="post-image">
                            
                            <div>
                                
                                <img src="admin/postimages/<?php echo htmlentities($row['PostImage']);?>" alt="<?php echo htmlentities($row['posttitle']);?>" class="img" alt="blog1" width="950" height="350">
                            </div>
                            <div class="post-info flex-row">
                                <span><i class="fas fa-user text-gray"></i>&nbsp;&nbsp;Admin</span>
                                <span><i class="fas fa-calendar-alt text-gray"></i> Posted on <?php echo htmlentities($row['postingdate']);?></span>
                                
                            </div>
                        </div>
                        <div class="post-title">
                        <h2 class="card-title"><?php echo htmlentities($row['posttitle']);?></h2>
                        <p class="card-text"><?php $pt=$row['postdetails'];echo  (substr($pt,0,500));?></p>
             </p>
                        <a href="news-details.php?nid=<?php echo htmlentities($row['pid'])?>" class="btn post-btn">Selengkapnya &nbsp; <i class="fas fa-arrow-right"></i></a>
                            
                           
                     
                   
                        </div>
                        <hr>
                    </div>
                    
                    <?php } ?>
                    
                    <div class="pagination flex-row">
                    <li class="page-item"><a href="?pageno=1"  class="page-link">First</a></li>
                              <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?> page-item">
                    <a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>" class="page-link">Prev</a>
                           </li>
                                   <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?> page-item">
                           <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?> " class="page-link">Next</a>
                             </li>
                                  <li class="page-item"><a href="?pageno=<?php echo $total_pages; ?>" class="page-link">Last</a></li>
                    </div>
                    
                </div>
                
                <aside class="sidebar">
                <div class="newsletter" data-aos="fade-up" data-aos-delay="300">
                        <h2>Cari</h2>
                        <div class="form-element">
                        <form name="search" action="search.php" method="post">
                            <div class="input-group">

                           
                            <input type="text" class="input-element" name="searchtitle" placeholder="Artikel">
                            <span class="input-group-btn">
                            <button class="btn form-btn" type="submit">Cari</button>
                            </span>
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
                        <ul class="category-list">
                        <?php $query=mysqli_query($con,"select id,CategoryName from tblcategory");
while($row=mysqli_fetch_array($query))
{
?>
                            <li class="list-items" data-aos="fade-left" data-aos-delay="100">
                            <a href="category.php?catid=<?php echo htmlentities($row['id'])?>"><?php echo htmlentities($row['CategoryName']);?></a>
                             
                            </li>
                            <?php } ?>
                           
                        </ul>
                    </div>
                    <div class="popular-post">
                        <h2>Artikel Terbaru</h2>
                        <div class="post-content" data-aos="flip-up" data-aos-delay="200">
                        <?php
$query=mysqli_query($con,"select tblposts.id as pid,tblposts.PostTitle as posttitle from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId limit 8");
while ($row=mysqli_fetch_array($query)) {

?>
                            <div class="post-title">
                            - <a href="news-details.php?nid=<?php echo htmlentities($row['pid'])?>"><?php echo htmlentities($row['posttitle']);?></a>
                            </div>
                            <?php } ?>
                        </div>
</div>
                   
               
                </aside>
            </div>
           
        </section>

        <!-- -----------x---------- Site Content -------------x------------>

    </main>

    <!---------------x------------- Main Site Section ---------------x-------------->


    <!-- --------------------------- Footer ---------------------------------------- -->
    <?php include('includes/footer2.php');?>

    <!-- -------------x------------- Footer --------------------x------------------- -->

    <!-- Jquery Library file -->
    <script src="./js/Jquery3.4.1.min.js"></script>

    <!-- --------- Owl-Carousel js ------------------->
    <script src="./js/owl.carousel.min.js"></script>

    <!-- ------------ AOS js Library  ------------------------- -->
    <script src="./js/aos.js"></script>

    <!-- Custom Javascript file -->
    <script src="./js/main.js"></script>
</body>

</html>