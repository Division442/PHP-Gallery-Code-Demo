<div class="container-fluid">

    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title ">Comments</h4>
                <p class="card-category"> All comments added to your photo.</p>
            </div>
                <div class="card-body">
                    <div class="table-responsive">
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
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th style="width:200px"></th>
                                    <th>Author</th>
                                    <th>Comment</th>
                                    <th>Created</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($comment as $comments) : ?>
                                    <tr>
                                        <td><image style="max-width: 75%; height: auto;" class="img-responsive img-rounded" src="<?php echo $photo->picture_path(); ?>"></td>
                                        <td>
                                            <?php echo $comments->author; ?>
                                        </td>
                                        <td><?php echo $comments->body; ?></td>
                                        <td><?php echo $comments->created; ?></td>
                                        <td>
                                            <div class="pictures_link">
                                                <a href="index.php?mode=delete_photo_comments&id=<?php echo $comments->id; ?>&photo_id=<?php echo $comments->photo_id; ?>"><i class="material-icons delete_link">delete</i></a>
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