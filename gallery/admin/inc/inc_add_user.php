<div class="col-md-12">
    <div class="card">
        <div class="card-header card-header-primary">
            <h4 class="card-title ">Add Users</h4>
            <p class="card-category"> Fill out each field and ensure you select an admin level.</p>
            <p class="bg-success">
                <?php echo $message?>
            </p>
        </div>
            <div class="card-body" style="margin-top:25px;">
                <form action="index.php?mode=add_user" method="post" enctype="multipart/form-data" autocomplete="off">
                    <div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="first_name">First Name</label>
                                    <input type="text" id="first_name" name="first_name" class="form-control" required>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" name="username" id="username" class="form-control" requiredautocomplete="new-username">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                
                                <div class="form-group">
                                    <label for="last_name">Last Name</label>
                                    <input type="text" id="last_name" name="last_name" class="form-control" required>
                                </div>
                          
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" name="email" id="email" class="form-control" required>
                                </div>
                   
                                <div class="form-group">
                                    <label for="user_level">User level</label>
                                    <select class="form-control" id="user_level" data-style="btn btn-link" name="user_level" required>
                                        <option value="">Select User Level</option>    
                                        <option value="Administrator">Administrator</option>
                                        <option value="Editor">Editor</option>
                                        <option value="Subscriber">Subscriber</option>
                                        <option value="Guest">Guest</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" id="password" name="password" class="form-control" onkeyup='checkPassword();' required autocomplete="new-password">
                                    <span id="message"></span>
                                </div>
                                    <div class="form-group">
                                        <label for="confirm_password">Confirm Password</label>
                                        <input type="password" id="confirm_password" name="confirm_password" class="form-control" onkeyup='checkPassword();' required autocomplete="new-password">
                                    
                                    <div class="form-check">
                                        <label class="inlineCheckbox1">
                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" onclick="showPassword()"> Show Passwords
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            
                            <div class="col">
                                <div class="form-group">
                                    <label for="description" style="margin: 0 0 20px 0">Bio</label>
                                    <textarea name="bio" id="mytextarea" cols="30" rows="10" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group form-file-upload form-file-multiple">
                                    <label for="user_image">Profile Image</label>
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
                                </div>
        
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Add User" name="create" class="btn btn-primary pull-right">
                        </div>
                    </div>
                </form>
            </div>
    </div>
</div>


