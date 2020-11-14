<div class="container-fluid">

    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title ">Add Users</h4>
                <p class="card-category"> Fill out each field and ensure you select an admin level.</p>
                <p class="bg-success">
                    <?php echo $message?>
                </p>
            </div>
                <div class="card-body">
                    <form action="index.php?mode=add_user" method="post" enctype="multipart/form-data" autocomplete="off">
                        <div>
                            <div class="form-group form-file-upload form-file-multiple">
                                <label for="user_image">User Image</label>
                                <input type="file" multiple="" class="inputFileHidden" name="user_image">
                                <div class="input-group">
                                    <input type="text" class="form-control inputFileVisible">
                                    <span class="input-group-btn">
                                        <button type="button" class="btn btn-fab btn-round btn-primary">
                                            <i class="material-icons">attach_file</i>
                                        </button>
                                    </span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" name="username" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="first_name">First Name</label>
                                <input type="text" name="first_name" class="form-control"  required>
                            </div>

                            <div class="form-group">
                                <label for="last_name">Last Name</label>
                                <input type="text" name="last_name" class="form-control"  required>
                            </div>
                            <div class="form-group">
                                <label for="user_level">User Level</label>
                                <select class="form-control selectpicker" data-style="btn btn-link" name="user_level" required>
                                    <option value=""></option>    
                                    <option value="Administrator">Administrator</option>
                                    <option value="Editor">Editor</option>
                                    <option value="Subscriber">Subscriber</option>
                                    <option value="Guest">Guest</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" class="form-control"  required>
                            </div>

                            <div class="form-group">
                                <input type="submit" value="Add User" name="create" class="btn btn-primary pull-right" >
                            </div>
                        </div>
                    </form>
                </div>
        </div>
    </div>

</div>