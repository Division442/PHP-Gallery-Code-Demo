<div class="container-fluid">

    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title ">Photos</h4>
                <p class="card-category"> Displaying all photos that you uploaded.</p>
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
                                    <th>Photo</th>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>File Name</th>
                                    <th>Original File Name</th>
                                    <th>Size</th>
                                    <th>Comments</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($photos as $photo) : ?>
                                <tr>
                                    <td width="300px">
                                        <image class="img-fluid img-rounded" src="<?php echo $photo->picture_path(); ?>">
                                    </td>
                                    <td><?php echo $photo->id; ?></td>
                                    <td><?php echo $photo->title; ?></td>
                                    <td><?php echo $photo->filename; ?></td>
                                    <td><?php echo $photo->original_file_name; ?></td>
                                    <td><?php echo $photo->size; ?></td>
                                    <td>
                                        <a href="index.php?mode=photo_comments&id=<?php echo $photo->id; ?>">
                                        <?php 
                                            $comments = Comment::find_the_comments($photo->id);
                                            echo count($comments);
                                        ?>
                                        </a>
                                    </td>
                                    <td>
                                        <div class="pictures_link">
                                            <a href="index.php?mode=delete_photo&id=<?php echo $photo->id; ?>"><i class="material-icons delete_link">delete</i></a> | 
                                            <a href="index.php?mode=edit_photo&id=<?php echo $photo->id; ?>"><i class="material-icons">create</i></a> | 
                                            <a href="../photo.php?id=<?php echo $photo->id; ?>"><i class="material-icons">preview</i></a> | 
                                            <a href="index.php?mode=photo_comments&id=<?php echo $photo->id; ?>"><i class="material-icons">speaker_notes</i></a>
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