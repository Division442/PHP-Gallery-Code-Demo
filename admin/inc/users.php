<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                User
                <small><a href="index.php?mode=add_user" class="btn btn-primary">Add User</a></small>
            </h1>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
                </li>
                <li class="active">
                    <i class="fa fa-file"></i> All Users
                </li>
            </ol>

            <p class="bg-success">
                <?php echo $message?>
            </p>
        </div>
    </div>
    <!-- /.row -->

    <div class="col-md-12">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th></th>
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