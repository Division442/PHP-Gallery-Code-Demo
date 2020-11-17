<div class="container-fluid">

    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title ">Comments</h4>
                <p class="card-category"> Select comment to moderate.</p>
            </div>
                <div class="card-body">
                    <?php 
                        if($message) {
                            echo "<div class='alert alert-info alert-dismissible fade show' role='alert'>";
                            echo "<strong>{$message}</strong>";
                            echo "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>";
                            echo "<span aria-hidden='true'>&times;</span>";
                            echo "</button>";
                            echo "</div>";
                        }
                    ?>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Author</th>
                                    <th>Comment</th>
                                    <th>Created</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($comments as $comment) : ?>
                                <tr>
                                    <td>
                                        <?php echo $comment->author; ?>
                                    </td>
                                    <td><?php echo $comment->body; ?></td>
                                    <td><?php echo $comment->created; ?></td>
                                    <td>
                                        <div class="pictures_link">
                                            <a href="index.php?mode=delete_comment&id=<?php echo $comment->id; ?>"><i class="material-icons delete_link">delete</i></a>
                                        </div>
                                    </td>
                                </tr>

                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
        </div>
    </div>

</div>