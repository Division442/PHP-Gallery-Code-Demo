<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header card-header-warning card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">preview</i>
                        </div>
                        <p class="card-category">New Views</p>
                        <h3 class="card-title"><?php echo $session->count ?>
                            <small>Views</small>
                        </h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <i class="material-icons">info</i>
                            since last login
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header card-header-success card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">monochrome_photos</i>
                        </div>
                        <p class="card-category">Photos</p>
                        <h3 class="card-title"><?php echo Photo::count_all_user_photos($_SESSION['id'])?>
                            <small>in total</small>
                        </h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <i class="material-icons">date_range</i>
                            <a href="index.php?mode=photos">uploaded by <?php echo $_SESSION['name']?></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header card-header-danger card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">group</i>
                        </div>
                        <p class="card-category">Users</p>
                        <h3 class="card-title"><?php echo User::count_all()?>
                            <small>active users</small>
                        </h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <i class="material-icons">info</i>
                            <a href="index.php?mode=users">active users only</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header card-header-info card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">library_books</i>
                        </div>
                        <p class="card-category">Comments</p>
                        <h3 class="card-title"><?php echo Comment::count_all()?>
                            <small>in total</small>
                        </h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <i class="material-icons">info</i>
                            <a href="index.php?mode=comments">total comments for all users.</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>