<?php 
        include("includes/header.php");
        $photos = Photo::find_all();
        
?>


<div class="row">
    <!-- Blog Entries Column -->
    <div class="col-md-12">
        <div class="thumbnails row">
            <?php foreach($photos as $photo): ?>
                <div class="col-xs-6 col-md-3">
                    <a href="photo.php?id=<?php echo $photo->id; ?>">
                        <img src="admin/<?php echo $photo->picture_path() ?>" alt="<?php echo $photo->alt_text; ?>" class="img-thumbnail">
                    </a>

                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<!-- /.row -->

<?php include("includes/footer.php"); ?>