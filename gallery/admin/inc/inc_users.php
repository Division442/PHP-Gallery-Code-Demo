<div class="container-fluid">

    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title ">Users</h4>
                <p class="card-category"> Viewing all users.</p>
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
                                    <th width="300px"><small><a href="index.php?mode=add_user" class="btn btn-primary">Add User</a></small></th>
                                    <th>Username</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>User Level</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($users as $user) : ?>
                                <tr>
                                    <td><img class="img-fluid img-rounded" src="<?php echo $user->image_path_and_placeholder(); ?>" alt="User image for <?php echo $user->username; ?>"></td>
                                    <td>
                                        <?php echo $user->username; ?>
                                    </td>
                                    <td><?php echo $user->first_name; ?></td>
                                    <td><?php echo $user->last_name; ?></td>
                                    <td><?php echo $user->user_level; ?></td>
                                    <td>
                                        <div class="pictures_link">
                                            <a href="index.php?mode=delete_user&id=<?php echo $user->id; ?>"><i class="material-icons delete_link">delete</i></a> | 
                                            <a href="index.php?mode=edit_user&id=<?php echo $user->id; ?>"><i class="material-icons">create</i></a>
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