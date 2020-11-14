<div class="container-fluid">

    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title ">Comments</h4>
                <p class="card-category"> Select comment to moderate.</p>
                <p class="bg-success">
                    <?php echo $message?>
                </p>
            </div>
                <div class="card-body">
                    <div class="table-responsive">
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
        </div>
    </div>

</div>