<div class="container-fluid">

    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title ">Upload Image</h4>
                <p class="card-category"> <?php echo $message ?></p>
            </div>
                <div class="card-body">
                <form action="index.php?mode=upload_photo" method="post" enctype="multipart/form-data" class="dropzone">
                    <input type="hidden" name="user_id" value="<?php echo $_SESSION['id'] ?>">
                    <div class="form-group">
                        <label for="title">Photo Title</label>
                        <input type="text" name="title" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="caption">Photo Caption</label>
                        <input type="text" name="caption" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="alt_text">Alt Text</label>
                        <input type="text" name="alt_text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label><br>
                        <textarea name="description" cols="30" rows="10" class="form-control"></textarea>
                    </div>
                </form>
                </div>
        </div>
    </div>

</div>