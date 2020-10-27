<?php 
    include("includes/header.php");

    if(!$session->is_signed_in()) {
        redirect("login.php");
    }

    $users = User::find_all();
    
?>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <?php include("includes/top_nav.php"); ?>
        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
        <?php include("includes/side_nav.php"); ?>
        
    </nav>
    <div id="page-wrapper">
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        User
                        <small><a href="add_user.php" class="btn btn-primary">Add User</a></small>
                    </h1>
                    <ol class="breadcrumb">
                        <li>
                            <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
                        </li>
                        <li class="active">
                            <i class="fa fa-file"></i> All Users
                        </li>
                    </ol>
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
                                    <a href="delete_user.php?id=<?php echo $user->id; ?>">Delete</a> | 
                                    <a href="edit_user.php?id=<?php echo $user->id; ?>">Edit</a> | 
                                    <a href="#">View</a>
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
        <!-- /.container-fluid -->
    </div>

  <?php include("includes/footer.php"); ?>