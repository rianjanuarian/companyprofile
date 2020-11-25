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