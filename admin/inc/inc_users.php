<div class="container-fluid">

    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title ">Users</h4>
                <p class="card-category"> Viewing all users.</p>
                <p class="bg-success">
                    <?php echo $message?>
                </p>
            </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th><small><a href="index.php?mode=add_user" class="btn btn-primary">Add User</a></small></th>
                                    <th>Username</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($users as $user) : ?>
                                <tr>
                                    <td> <img class="admin-user-thumbnail user_image" src="<?php echo $user->image_path_and_placeholder(); ?>" alt="User image for <?php echo $user->username; ?>"></td>
                                    <td>
                                        <?php echo $user->username; ?>
                                        <div class="pictures_link">
                                            <a href="index.php?mode=delete_user&id=<?php echo $user->id; ?>">Delete</a> | 
                                            <a href="index.php?mode=edit_user&id=<?php echo $user->id; ?>">Edit</a>
                                        </div>
                                    </td>
                                    <td><?php echo $user->first_name; ?></td>
                                    <td><?php echo $user->last_name; ?></td>
                                </tr>

                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
        </div>
    </div>

</div>