<?php 
session_start();
error_reporting(0);
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

    <!-- Navigation -->
   <?php include('includes/header2.php');?>

    <!-- Page Content -->
    <div class="container">


     
      <div class="row" style="margin-top: 4%">

        <!-- Blog Entries Column -->
        <div class="post-content" data-aos="zoom-in" data-aos-delay="200">

          <!-- Blog Post -->
<?php 
        if($_GET['catid']!=''){
$_SESSION['catid']=intval($_GET['catid']);
}
             






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


$query=mysqli_query($con,"select tblposts.id as pid,tblposts.PostTitle as posttitle,tblposts.PostImage,tblcategory.CategoryName as category,tblsubcategory.Subcategory as subcategory,tblposts.PostDetails as postdetails,tblposts.PostingDate as postingdate,tblposts.PostUrl as url from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.CategoryId='".$_SESSION['catid']."' and tblposts.Is_Active=1 order by tblposts.id desc LIMIT $offset, $no_of_records_per_page");

$rowcount=mysqli_num_rows($query);
if($rowcount==0)
{
echo "No record found";
}
else {
while ($row=mysqli_fetch_array($query)) {


?>
<h1>Kategori <?php echo htmlentities($row['category']);?> </h1>
<div class="post-image">
                            
                            <div>
                                <img src="admin/postimages/<?php echo htmlentities($row['PostImage']);?>" alt="<?php echo htmlentities($row['posttitle']);?>" class="img" alt="blog1" width="950" height="350">
                            </div>
            <div class="card-body">
            <div class="post-info flex-row">
                                <span><i class="fas fa-user text-gray"></i>&nbsp;&nbsp;Admin</span>
                                <span><i class="fas fa-calendar-alt text-gray"></i> Posted on <?php echo htmlentities($row['postingdate']);?></span>
                                
                            </div>
            </div>
                        <div class="post-title">
                        <h2 class="card-title"><?php echo htmlentities($row['posttitle']);?></h2>
                        <p class="card-text"><?php $pt=$row['postdetails'];echo  (substr($pt,0,500));?></p>
             </p>
                        <a href="news-details2.php?nid=<?php echo htmlentities($row['pid'])?>" class="btn post-btn">Selengkapnya &nbsp; <i class="fas fa-arrow-right"></i></a>
                            
                           
                     
                   
                        </div>
                        <hr>
                    </div>
                    
                    <?php } ?>

  
<?php } ?>
       

      

          <!-- Pagination -->




        </div>

        <!-- Sidebar Widgets Column -->
     
      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

    <!-- Footer -->
      <?php include('includes/footer2.php');?>


      <script src="./js/Jquery3.4.1.min.js"></script>

<!-- --------- Owl-Carousel js ------------------->
<script src="./js/owl.carousel.min.js"></script>

<!-- ------------ AOS js Library  ------------------------- -->
<script src="./js/aos.js"></script>

<!-- Custom Javascript file -->
<script src="./js/main.js"></script>
 
</head>
  </body>

</html>
