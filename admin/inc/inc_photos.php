<div class="container-fluid">

    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title ">Photos</h4>
                <p class="card-category"> Displaying all photos that you uploaded.</p>
                <p class="bg-success">
                    <?php echo $message?>
                </p>
            </div>
                <div class="card-body">
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
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($photos as $photo) : ?>
                                <tr>
                                    <td width="300px">
                                        <image style="max-width: 75%; height: auto;" class="img-responsive img-rounded" src="<?php echo $photo->picture_path(); ?>">
                                        <div class="pictures_link">
                                            <a href="index.php?mode=delete_photo&id=<?php echo $photo->id; ?>" class="delete_link">Delete</a> | 
                                            <a href="index.php?mode=edit_photo&id=<?php echo $photo->id; ?>">Edit</a> | 
                                            <a href="../photo.php?id=<?php echo $photo->id; ?>">View</a> | 
                                            <a href="index.php?mode=photo_comments&id=<?php echo $photo->id; ?>">View Comments </a>
                                        </div>
                                    
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
                                </tr>

                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
        </div>
    </div>

</div>