<?php include("includes/header.php"); ?>

<?php if(!$session->is_signed_in()) {redirect("login.php");} ?>

<?php 

    if(empty($_GET['user_id'])) {
        redirect("users.php");
    }
        
    $user = User::find_user_by_id($_GET['user_id']);
        
        
    if(isset($_POST['update'])) {
        
        if($user) {
            $user->username = $_POST['username'];
            $user->first_name =$_POST['first_name'];
            $user->last_name =$_POST['last_name'];
            $user->password =$_POST['password'];
            
            if(empty($_FILES['user_image'])) {
            
                $user->save_user();
                redirect("users.php");
                $session->message("The user has been updated");
                
            } else {
            
                $user->set_file($_FILES['user_image']);
                $user->upload_photo();
                $session->message("The user {$user->username} has been added");
                $user->save_user();
                redirect("users.php");
            }
        
        }
    }
?>

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
        <?php include("includes/top_nav.php") ?>
        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
        <?php include("includes/side_nav.php"); ?>
        </nav>

        <div id="page-wrapper">
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-md-6">
                        <h1 class="page-header">
                            users
                            <small>Subheading</small>
                        </h1>

                    <form action="edit_user.php?id=<?php echo $user->user_id; ?>" method="post" enctype="multipart/form-data" autocomplete="off">

                        <div>
                           <div class="form-group">
                                <input type="file" name="user_image">
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
                                <input type="password" name="password" class="form-control"  value="<?php echo $user->password; ?>">
                           </div>

                            <div class="form-group">
                                <input type="submit" value="Edit User" name="update" class="btn btn-primary pull-right" >
                                <a href="delete_user.php?user_id=<?php echo $user->user_id; ?>" class="btn btn-primary pull-right">Delete</a>
                            </div>
                        </div>
                </form>
  
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

  <?php include("includes/footer.php"); ?>