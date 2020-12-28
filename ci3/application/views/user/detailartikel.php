<head>
  <style>
    * {
      box-sizing: border-box;
    }

    input[type=text],
    select,
    textarea {
      width: 100%;
      padding: 12px;
      border: 1px solid #ccc;
      border-radius: 4px;
      resize: vertical;
    }

    label {
      padding: 12px 12px 12px 0;
      display: inline-block;
    }

    input[type=submit] {
      background-color: #4CAF50;
      color: white;
      padding: 12px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      float: right;
    }

    input[type=submit]:hover {
      background-color: #45a049;
    }

    .containera {
      border-radius: 5px;
      background-color: #f2f2f2;
      padding: 20px;
    }

    .col-25 {
      float: left;
      width: 25%;
      margin-top: 6px;
    }

    .col-75 {
      float: left;
      width: 75%;
      margin-top: 6px;
    }

    /* Clear floats after the columns */
    .row:after {
      content: "";
      display: table;
      clear: both;
    }

    /* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
    @media screen and (max-width: 600px) {

      .col-25,
      .col-75,
      input[type=submit] {
        width: 100%;
        margin-top: 0;
      }
    }
  </style>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Artikel</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="./assets/css/all.css">


  <!-- --------- Owl-Carousel ------------------->
  <link rel="stylesheet" href="./assets/css/owl.carousel.min.css">
  <link rel="stylesheet" href="./assets/css/owl.theme.default.min.css">

  <!-- ------------ AOS Library ------------------------- -->
  <link rel="stylesheet" href="./assets/css/aos.css">

  <!-- Custom Style   -->
  <link rel="stylesheet" href="./assets/css/Style.css">

</head>
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
            <img class="img-fluid rounded" src="<?= base_url('img/postimages/') . htmlentities($artikel[0]->PostImage); ?>">
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
        <?= $this->session->flashdata('msg'); ?>
        <div class="card my-4">
          <h5 class="card-header">Leave a Comment:</h5>
          <div class="card-body">
            <form action="" name="Comment" method="post">
              <?php if ($this->session->userdata('username') != '') {

              ?>
                <div class="form-group">
                  <input type="hidden" name="kode" value="<?= $artikel[0]->id ?>">
                  <input type="hidden" name="url" value="<?= $artikel[0]->PostUrl ?>">
                  <input type="text" name="nama" class="form-control" value="<?= $this->session->userdata('nama') ?>" readonly placeholder="Enter your fullname" required>
                </div>
                <div class="form-group">
                  <input type="email" name="email" class="form-control" value="<?= $this->session->userdata('email') ?>" readonly placeholder="Enter your Valid email" required>
                </div>
              <?php } else { ?>
                <div class="form-group">
                  <input type="hidden" name="kode" value="<?= $artikel[0]->id ?>">
                  <input type="hidden" name="url" value="<?= $artikel[0]->PostUrl ?>">
                  <input type="text" name="nama" class="form-control" placeholder="Enter your fullname" required>
                </div>
                <div class="form-group">
                  <input type="email" name="email" class="form-control" placeholder="Enter your Valid email" required>
                </div>
              <?php } ?>
              <div class="form-group">
                <textarea class="form-control" name="komen" rows="3" placeholder="Comment" required></textarea>
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

<script src="./assets/js/Jquery3.4.1.min.js"></script>

<!-- --------- Owl-Carousel js ------------------->
<script src="./assets/js/owl.carousel.min.js"></script>

<!-- ------------ AOS js Library  ------------------------- -->
<script src="./assets/js/aos.js"></script>

<!-- Custom Javascript file -->
<script src="./assets/js/main.js"></script>
<!-- Bootstrap core JavaScript -->