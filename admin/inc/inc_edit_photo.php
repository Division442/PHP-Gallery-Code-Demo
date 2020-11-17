<div class="container-fluid">

    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title ">Edit Photo</h4>
                <p class="card-category"> <?php echo $photo->title; ?></p>
            </div>
            <div class="card-body">
            <div class="card-body">
                    <?php 
                        if($message) {
                            echo "<div class='alert alert-info alert-dismissible fade show' role='alert'>";
                            echo "<strong>{$session->message}</strong>";
                            echo "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>";
                            echo "<span aria-hidden='true'>&times;</span>";
                            echo "</button>";
                            echo "</div>";
                        }
                    ?>
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
                        <div class="col-md-4">
                            <div  class="photo-info-box">
                                <div class="info-box-header">
                                    <h4>Save <span id="toggle" class="glyphicon glyphicon-menu-up pull-right"></span></h4>
                                </div>
                                <div class="inside">
                                    <div class="box-inner">
                                        <p class="text">
                                            <a href="#"><image class="img-fluid" src="<?php echo $photo->picture_path(); ?>"></a>
                                        </p>
                                        <p class="text">
                                            <span class="glyphicon glyphicon-calendar"></span> Uploaded on: <?php echo $photo->created; ?>
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
                </form>
            </div>
        </div>
    </div>

</div>