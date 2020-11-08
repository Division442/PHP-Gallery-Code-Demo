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
                            <a href="index.php?mode=delete_comment&id=<?php echo $comment->id; ?>">Delete</a>
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