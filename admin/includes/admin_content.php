<div class="container-fluid">

<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Site Statistics
            <small>Dashboard</small>
        </h1>

        <?php 

            //Test user insert and it works, far out!
            // $user = new User();
            // $user->username = "JohnJohn";
            // $user->password = "password";
            // $user->first_name = "John";
            // $user->last_name = "Doe";
            // $user->create();

            // Test user update and it works, far out!
            // $user = User::find_by_id(8);
            // $user->password = "thispassword";
            // $user->update_user();

            // Test user delete and it works, far out!
            // $user = User::find_by_id(7);
            // $user->delete_user();

            // Find all users
            // $users = User::find_all();
            // foreach ($users as $user) {
            //     echo $user->username;
            // }

            // Find all photos
            // $photos = Photo::find_all();
            // foreach ($photos as $photo) {
            //     echo $photo->title . '<br>';
            // }

            //Pull single user
            // $user = User::find_by_id(8);
            // echo $user->username;

            //Test photo insert and it works, far out!
            // $photo = new Photo();
            // $photo->photo_id = "2";
            // $photo->title = "Another Photo";
            // $photo->filename = "photo.jpg";
            // $photo->type = "Image";
            // $photo->size = "333";
            // $photo->create();
            

        ?>


        <ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
            </li>
            <li class="active">
                <i class="fa fa-file"></i> Statistics
            </li>
        </ol>
    </div>



    
</div>
<!-- /.row -->

<!-- Body dashboard content -->
<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-users fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><?php echo $session->count ?></div>
                        <div>New Views</div>
                    </div>
                </div>
            </div>
            <a href="#">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span> 
                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span> 
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>

        <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-photo fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><?php echo Photo::count_all()?></div>
                        <div>Photos</div>
                    </div>
                </div>
            </div>
            <a href="#">
                <div class="panel-footer">
                    <span class="pull-left">Total Photos in Gallery</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>


        <div class="col-lg-3 col-md-6">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-user fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge">
                            <?php echo User::count_all()?>
                        </div>

                        <div>Users</div>
                    </div>
                </div>
            </div>
            <a href="#">
                <div class="panel-footer">
                    <span class="pull-left">Total Users</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>

        <div class="col-lg-3 col-md-6">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-support fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><?php echo Comment::count_all()?></div>
                        <div>Comments</div>
                    </div>
                </div>
            </div>
            <a href="#">
                <div class="panel-footer">
                    <span class="pull-left">Total Comments</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
   



</div> <!--First Row-->
<div class="row">
    <div id="piechart" style="width: 900px; height: 500px;"></div>
</div>


</div>
<!-- /.container-fluid -->