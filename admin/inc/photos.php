
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Photos
                <small>Review Photos</small>
            </h1>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
                </li>
                <li class="active">
                    <i class="fa fa-file"></i> All Photos
                </li>
            </ol>
        </div>
    </div>
    <!-- /.row -->

    <div class="col-md-12">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Photo</th>
                    <th>ID</th>
                    <th>File Name</th>
                    <th>Title</th>
                    <th>Size</th>
                    <th>Comment Count</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($photos as $photo) : ?>
                <tr>
                    <td>
                        <image style="max-width: 25%; height: auto;" class="img-responsive img-rounded" src="<?php echo $photo->picture_path(); ?>">
                        <div class="pictures_link">
                            <a href="index.php?mode=delete_photo_comment&id=<?php echo $photo->id; ?>" class="delete_link">Delete</a> | 
                            <a href="index.php?mode=edit_photo&id=<?php echo $photo->id; ?>">Edit</a> | 
                            <a href="../photo.php?id=<?php echo $photo->id; ?>">View</a> | 
                            <a href="index.php?mode=photo_comments&id=<?php echo $photo->id; ?>">View Comments </a>
                        </div>
                    
                    </td>
                    <td><?php echo $photo->id; ?></td>
                    <td><?php echo $photo->filename; ?></td>
                    <td><?php echo $photo->title; ?></td>
                    <td><?php echo $photo->size; ?></td>
                    <td>
                        <a href="photo_comment.php?id=<?php echo $photo->id; ?>">
                        <?php 
                            $comments = Comment::find_the_comments($photo->id);
                            echo count($comments);

                        ?>
                        </a>
                    </td>
                </tr>

                <?php endforeach ?>
            </tbody>
        </table>
    </div>

</div>