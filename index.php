<?php 
        include("includes/header.php");
        //$photos = Photo::find_all();

        // Pagination

        $current_page = !empty($_GET['page']) ? (int)($_GET['page']) : 1;
        $items_per_page = 2;
        $items_total_count = Photo::count_all();

        $paginate = new Paginate($current_page, $items_per_page, $items_total_count);

        $sql = "SELECT * FROM photos ";
        $sql .= "limit {$items_per_page} ";
        $sql .= "OFFSET {$paginate->offset()} ";
        $photos = Photo::find_by_query($sql);
        
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
        <!-- Pagination -->
        <ul class="pagination justify-content-end">

            <?php 

                if($paginate->has_previous()) {
                    echo "<li class='page-item'><a href='index.php?page={$paginate->previous()}'>Previous</a></li>";
                }
                
                for($i = 1; $i <= $paginate->page_total() ; $i++) {
                    if($i == $paginate->current_page) {
                        echo "<li class='page-item active'><a href='index.php?page={$i}'>{$i}</a></li>";
                    } else {
                        echo "<li class='page-item'><a href='index.php?page={$i}'>{$i}</a></li>";
                    }
                }

                if($paginate->page_total() > 1) {
                    if($paginate->has_next()) {
                        echo "<li class='page-item'><a href='index.php?page={$paginate->next()}'>Next</a></li>";
                    }
                }

            ?>
        </ul>

    </div>
</div>
<!-- /.row -->

<?php include("includes/footer.php"); ?>