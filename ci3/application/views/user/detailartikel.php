<!-- Page Content -->
<section class="detail p-3" style="margin-top:8% ;">
    <div class="container">
        <div class="row" style="margin-top: 4%">
            <!-- Blog Entries Column -->
            <div class="col-md-8">
                <!-- Blog Post -->
                <div class="card mb-4">

                    <div class="card-body">
                        <h2 class="card-title"><?php echo htmlentities($artikel[0]->PostTitle); ?></h2>
                        <p><b>Category : </b> <a href="category.php?catid=<?php echo htmlentities($artikel[0]->CategoryId) ?>"><?php echo htmlentities($artikel[0]->CategoryName); ?></a> |
                            <b>Sub Category : </b><?php echo htmlentities($artikel[0]->SubCategoryId); ?> <b> Posted on </b><?php echo htmlentities($artikel[0]->PostingDate); ?></p>
                        <hr />
                        <img class="img-fluid rounded" src="admin/postimages/<?php echo htmlentities($artikel[0]->PostImage); ?>">
                        <p class="card-text"><?php
                                                $pt = $artikel[0]->PostDetails;
                                                echo (substr($pt, 0)); ?></p>
                    </div>
                    <div class="card-footer text-muted">
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
        <!---Comment Section --->

        <div class="row mt-3">
            <div class="col-md-8">
                <div class="card my-4">
                    <h5 class="card-header">Leave a Comment:</h5>
                    <div class="card-body">
                        <form name="Comment" method="post">
                            <div class="form-group">
                                <input type="text" name="name" class="form-control" placeholder="Enter your fullname" required>
                            </div>

                            <div class="form-group">
                                <input type="email" name="email" class="form-control" placeholder="Enter your Valid email" required>
                            </div>


                            <div class="form-group">
                                <textarea class="form-control" name="comment" rows="3" placeholder="Comment" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                        </form>
                    </div>
                </div>
                <!---Comment Display Section --->
                <?php foreach ($komen as $komens) { ?>
                    <div class="media mb-4">
                        <img class="d-flex mr-3 rounded-circle" src="images/usericon.png" alt="">
                        <div class="media-body">
                            <h5 class="mt-0"><?php echo htmlentities($komens->name); ?> <br />
                                <span style="font-size:11px;"><b>at</b> <?php echo htmlentities($komens->postingDate); ?></span>
                            </h5>

                            <?php echo htmlentities($komens->comment); ?>
                        </div>
                    </div>
                <?php } ?>

            </div>
        </div>
    </div>
</section>