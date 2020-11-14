<!-- Page Heading -->
    <div class="row">
        <div class="col-md-6">
                <form action="index.php?mode=edit_user&id=<?php echo $user->id; ?>" method="post" enctype="multipart/form-data" autocomplete="off">
                    <div>
                        <div class="form-group">
                            <input type="file" name="user_image">
                            <input type="hidden" value="<?php echo $user->id; ?>" name="user_id">
                        </div>

                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" name="username" class="form-control"  value="<?php echo $user->username; ?>">
                        </div>

                        <div class="form-group">
                            <label for="first name">First Name</label>
                            <input type="text" name="first_name" class="form-control"  value="<?php echo $user->first_name; ?>">
                        </div>

                        <div class="form-group">
                            <label for="last name">Last Name</label>
                            <input type="text" name="last_name" class="form-control"  value="<?php echo $user->last_name; ?>">
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" id="myInput" name="password" class="form-control"  value="<?php echo $user->password; ?>">
                            <input type="checkbox" onclick="myFunction()">Show
                        </div>

                        <div class="form-group">
                            <input type="submit" value="Edit User" name="update" class="btn btn-primary pull-left" >
                            <a id="user-id" href="index.php?mode=delete_user?id=<?php echo $user->id; ?>" class="btn btn-primary pull-right">Delete</a>
                        </div>
                    </div>
                </form>

        </div>
        <div class="col-md-6 user_image_box">
                <a href="#" data-toggle="modal" data-target="#photo-modal"> <img class="img-responsive" src="<?php echo $user->image_path_and_placeholder(); ?>" alt="<?php echo $user->username; ?>"></a>

        </div>
    </div>
    <!-- /.row -->

</div>