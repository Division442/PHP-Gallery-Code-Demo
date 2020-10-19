<div class="container-fluid">

<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Blank Page
            <small>Subheading</small>
        </h1>

        <?php 

            //Test user insert and it works, far out!
            // $user = new User();
            // $user->username = "TheBlake";
            // $user->password = "password";
            // $user->first_name = "Sebastian";
            // $user->last_name = "Foss";
            // $user->create();

            // Test user update and it works, far out!
            $user = User::find_user_by_id(8);
            $user->password = "thispassword";
            $user->update_user();

            // Test user delete and it works, far out!
            // $user = User::find_user_by_id(7);
            // $user->delete_user();
        ?>


        <ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
            </li>
            <li class="active">
                <i class="fa fa-file"></i> Blank Page
            </li>
        </ol>
        <?php
            $found_user = User::find_user_by_id(1);
            echo $found_user->username;
        ?>
    </div>
</div>
<!-- /.row -->

</div>
<!-- /.container-fluid -->