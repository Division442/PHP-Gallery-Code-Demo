<?php 
    include("includes/header.php");

    if(!$session->is_signed_in()) {
        redirect("login.php");
    }

    $comments = Comment::find_all();

    
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
                        <small>Photo Comments</small>
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
                            <th>Author</th>
                            <th>Comment</th>
                            <th>Created</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($comments as $comment) : ?>
                        <tr>
                            <td><?php echo $comment->id; ?></td>
                            <td>
                                <?php echo $comment->author; ?>
                                <div class="pictures_link">
                                    <a href="delete_comment.php?id=<?php echo $comment->id; ?>">Delete</a>
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