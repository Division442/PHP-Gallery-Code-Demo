<?php 

    include("includes/header.php");

    if(!$session->is_signed_in()) {
        redirect("login.php");
    }

    $message = "";
    if(isset($_POST['submit'])) { 
        $photo = new Photo();
        $photo->title = $_POST['title'];
        $photo->set_file($_FILES['file']);

        if($photo->save()) {
            $message = "Photo uploaded successfully";
        } else {
            $message = join("<br>", $photo->errors);
            
        }
    }

?>


    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <?php include("includes/top_nav.php"); ?>
        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
        <?php include("includes/side_nav.php"); ?>
        
    </nav>
    <div id="page-wrapper">
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
                            <i class="fa fa-file"></i> Upload images template
                        </li>
                    </ol>
                </div>
            </div>
            <!-- /.row -->
            <!-- BEGIN: Body content -->
            <div class="row">
                <div class="col-md-6">
                    <?php echo "<h2>" . $message . "</h2>" ?>
                    <form action="upload.php" method="post" enctype="multipart/form-data">
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
                </div>
            
            
            </div>
            <!-- END: Body content -->


            </div>
            <!-- /.container-fluid -->
    </div>

  <?php include("includes/footer.php"); ?>