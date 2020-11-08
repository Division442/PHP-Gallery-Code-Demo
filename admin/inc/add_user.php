<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-md-6">
            <h1 class="page-header">
                Add User
                <small>Users</small>
            </h1>

            <form action="index.php?mode=add_user" method="post" enctype="multipart/form-data" autocomplete="off">

                <div>
                    <div class="form-group">
                        <input type="file" name="user_image">
                    </div>

                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" class="form-control" >
                    </div>

                    <div class="form-group">
                        <label for="first name">First Name</label>
                        <input type="text" name="first_name" class="form-control" >
                    </div>

                    <div class="form-group">
                        <label for="last name">Last Name</label>
                        <input type="text" name="last_name" class="form-control" >
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" >
                    </div>

                    <div class="form-group">
                        <input type="submit" value="Add User" name="create" class="btn btn-primary pull-right" >
                    </div>
                </div>
            </form>

        </div>
    </div>
    <!-- /.row -->

</div>
<!-- /.container-fluid -->