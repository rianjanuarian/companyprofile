<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Artikel</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/Dashboard') ?>">Home</a></li>
                        <li class="breadcrumb-item "><a href="<?= base_url('admin/Artikel') ?>">Artikel</a></li>
                        <li class="breadcrumb-item active">Edit Artikel</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content bg-white">
        <div class="container-fluid p-5">
            <div class="row">
                <div class="col-md-12 col-md-offset-1">
                    <div class="p-3">
                        <div class="">
                            <form name="addpost" action="<?= base_url('admin/artikel/update') ?>" method="post" enctype="multipart/form-data">
                                <div class="form-group m-b-20">
                                    <label for="exampleInputEmail1">Post Title</label>
                                    <input type="hidden" value="<?= $artikel[0]->id ?>" required>
                                    <input type="text" class="form-control" id="title" name="title" placeholder="Enter title" value="<?= $artikel[0]->PostTitle ?>" required>
                                </div>
                                <div class="form-group m-b-20">
                                    <label for="exampleInputEmail1">Category</label>
                                    <select class="form-control" name="category" id="category" required>
                                        <option value="<?= $artikel[0]->CategoryId ?>"><?= $artikel[0]->CategoryName ?></option>
                                        <?php foreach ($kategori as $kategories) { ?>
                                            <option value="<?= $kategories->CategoryId; ?>"><?= $kategories->CategoryName; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group m-b-20">
                                    <label for="exampleInputEmail1">Sub Category</label>
                                    <select class="form-control" name="subcategory" id="subcategory" required>
                                        <option value="<?= $artikel[0]->SubCategoryId ?>"><?= $artikel[0]->Subcategory ?></option>
                                    </select>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="card p-3">
                                            <h5><b>Post Details</b></h5>
                                            <textarea class="summernote bg-dark" name="postdescription"><?= $artikel[0]->PostDetails ?></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="card p-3">
                                            <h5><b>Feature Image</b></h5>
                                            <input type="file" class="form-control p-1" id="postimage" name="postimage">
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" name="submit" class="btn btn-success waves-effect waves-light">Edit</button>
                                <button type="button" class="btn btn-danger waves-effect waves-light">Discard</button>
                            </form>
                        </div>
                    </div> <!-- end p-20 -->
                </div> <!-- end col -->
            </div>
            <!-- end row -->
        </div> <!-- container -->
    </section>
</div>
<<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js">
    </script>
    <script>
        jQuery(document).ready(function() {

            $('.summernote').summernote({
                height: 240, // set editor height
                minHeight: null, // set minimum height of editor
                maxHeight: null, // set maximum height of editor
                focus: false // set focus to editable area after initializing summernote
            });
            // // Select2
            // $(".select2").select2();

            // $(".select2-limiting").select2({
            //     maximumSelectionLength: 2
            // });
        });
    </script>
    <script>
        $(document).ready(function() {
 $("#category").change(function() {
                var id = $(this).val();
                $("#subcategory").empty();
                $.ajax({
                    url: "<?= base_url('admin/Artikel') ?>/getsubkategori",
                    dataType: "JSON",
                    data: {
                        id: id
                    },
                    success: function(data) {
                        for (i = 0; i < data.length; i++) {
                            $("#subcategory").append('<option value="' + data[i]["SubCategoryId"] + '">' + data[i]["Subcategory"] + '</option>')
                        }
                    }
                });
            });
        });
    </script>