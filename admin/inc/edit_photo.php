
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Edit Photo
                <small>Photo Admin</small>
            </h1>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
                </li>
                <li class="active">
                    <i class="fa fa-file"></i> Edit Photo
                </li>
            </ol>
        </div>
    </div>
    <!-- /.row -->

    <form action="index.php?mode=edit_photo&id=<?php echo $photo->id; ?>" method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-8">

                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" class="form-control" value="<?php echo $photo->title; ?>">
                </div>

                <div class="form-group">
                    <label for="alt_text">Alt Text</label>
                    <input type="text" name="alt_text" class="form-control" value="<?php echo $photo->alt_text; ?>">
                </div>

                <div class="form-group">
                    <label for="caption">Caption</label>
                    <input type="text" name="caption" class="form-control" value="<?php echo $photo->caption; ?>">
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" id="mytextarea" cols="30" rows="10" class="form-control"><?php echo $photo->description; ?></textarea>
                </div>

            </div>
        

            <div class="col-md-4" >
                <div  class="photo-info-box">
                    <div class="info-box-header">
                        <h4>Save <span id="toggle" class="glyphicon glyphicon-menu-up pull-right"></span></h4>
                    </div>
                <div class="inside">
                <div class="box-inner">
                    <p class="text">
                        <a href="#" class="thumbnail"><image class="img-responsive" src="<?php echo $photo->picture_path(); ?>"></a>
                    </p>
                    <p class="text">
                        <span class="glyphicon glyphicon-calendar"></span> Uploaded on: How do I pull timestamp
                    </p>
                    <p class="text ">
                        Photo Id: <span class="data photo_id_box"><?php echo $photo->id; ?></span>
                    </p>
                    <p class="text">
                        Filename: <span class="data"><?php echo $photo->filename; ?></span>
                    </p>
                    <p class="text">
                    File Type: <span class="data"><?php echo $photo->type; ?></span>
                    </p>
                    <p class="text">
                        File Size: <span class="data"><?php echo $photo->size; ?></span>
                    </p>
                </div>
                <div class="info-box-footer clearfix">
                    <div class="info-box-delete pull-left">
                        <a  href="index.php?mode=delete_photo&id=<?php echo $photo->id; ?>" class="btn btn-danger btn-md ">Delete</a>   
                    </div>
                    <div class="info-box-update pull-right ">
                        <input type="submit" name="update" value="Update" class="btn btn-primary btn-md ">
                    </div>   
                </div>
                </div>          
            </div>
            </div>
            </div>
        </div>
    </form>
<!-- /.container-fluid -->
</div>