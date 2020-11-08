<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Upload
                <small>Photo Management</small>
            </h1>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                </li>
                <li class="active">
                    <i class="fa fa-file"></i> Upload images
                </li>
            </ol>
        </div>
    </div>
    <!-- /.row -->
    <!-- BEGIN: Body content -->
    <div class="row">
        <div class="col-md-6">
            <?php echo "<h2>" . $message . "</h2>" ?>
            <form action="index.php?mode=upload_photo" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <input type="text" name="title" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="file" name="file">
                        </div>

                        <div class="form-group">
                            <input type="submit" name="submit" value="Submit" class="btn btn-sm">
                        </div>


                    </form>



            <form action="index.php?mode=upload_photo" class=dropzone></form>
        </div>            
    </div>
    <!-- END: Body content -->


</div>