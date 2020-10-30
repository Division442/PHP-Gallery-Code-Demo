<?php 
    include("includes/header.php");

    if(!$session->is_signed_in()) {
        redirect("login.php");
    }

    if(empty($_GET['id'])) {
        redirect("photos.php");
    }
    
    $comment = Comment::find_the_comments($_GET['id']);
    $photo = Photo::find_by_id($_GET['id']);
    
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
                        Comments
                        <small><a href="add_user.php" class="btn btn-primary">Add Comment</a></small>
                    </h1>
                    <ol class="breadcrumb">
                        <li>
                            <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
                        </li>
                        <li class="active">
                            <i class="fa fa-file"></i> All Comments
                        </li>
                    </ol>
                </div>
            </div>
            <!-- /.row -->

            <div class="col-md-12">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Photo</th>
                            <th>Author</th>
                            <th>Comment</th>
                            <th>Created</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($comment as $comment) : ?>
                        <tr>
                            <td><image style="max-width: 25%; height: auto;" class="img-responsive img-rounded" src="<?php echo $photo->picture_path(); ?>"></td>
                            <td><?php echo $comment->id; ?></td>
                            <td>
                                <?php echo $comment->author; ?>
                                <div class="pictures_link">
                                    <a href="delete_comment_photo.php?id=<?php echo $comment->id; ?>">Delete</a>
                                </div>
                            </td>
                            <td><?php echo $comment->body; ?></td>
                            <td><?php echo $comment->created; ?></td>
                            
                        </tr>

                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>

        </div>
        <!-- /.container-fluid -->
    </div>

  <?php include("includes/footer.php"); ?>