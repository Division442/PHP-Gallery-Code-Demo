<div class="col-md-12">
    <div class="card">
        <div class="card-header card-header-primary">
            <h4 class="card-title ">Edit User</h4>
            <p class="card-category"> <?php echo $user->first_name . " " . $user->last_name; ?></p>
        </div>
        <div class="card-body" style="margin-top:25px;">
          <div class="row">
            <div class="col-md-6">
              <form action="index.php?mode=edit_user&id=<?php echo $user->id; ?>" method="post" enctype="multipart/form-data" autocomplete="off">
                <div>
                  <div class="form-group">
                    <input type="file" name="user_image">
                    <input type="hidden" value="<?php echo $user->id; ?>" name="user_id">
                  </div>

                  <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" class="form-control" value="<?php echo $user->username; ?>" required>
                  </div>

                  <div class="form-group">
                    <label for="first name">First Name</label>
                    <input type="text" name="first_name" class="form-control" value="<?php echo $user->first_name; ?>" required>
                  </div>

                  <div class="form-group">
                    <label for="last name">Last Name</label>
                    <input type="text" name="last_name" class="form-control" value="<?php echo $user->last_name; ?>" required>
                  </div>
                    <div class="form-group">
                        <label for="description">Bio</label>
                        <textarea name="bio" id="mytextarea" cols="30" rows="10" class="form-control"><?php echo $user->bio; ?></textarea>
                    </div>
                  <div class="form-group">
                    <label for="user_level">User Level</label>
                    <select class="form-control" data-style="btn btn-link" name="user_level" required>
                        <option value=""></option>    
                        <option value="Administrator"<?php if($user->user_level == "Administrator") {echo " selected";} ?>>Administrator</option>
                        <option value="Editor"<?php if($user->user_level == "Editor") {echo " selected";} ?>>Editor</option>
                        <option value="Subscriber"<?php if($user->user_level == "Subscriber") {echo " selected";} ?>>Subscriber</option>
                        <option value="Guest"<?php if($user->user_level == "Guest") {echo " selected";} ?>>Guest</option>
                    </select>
                    </div>

                    <div class="form-group">
                        <label for="password">Update Password</label>
                        <input type="password" id="password" name="password" class="form-control" onkeyup='checkPassword();'>
                        <span id="message"></span>
                    </div>
                    <div class="form-group">
                        <label for="password">Confirm Updated Password</label>
                        <input type="password" id="confirm_password" name="confirm_password" class="form-control" onkeyup='checkPassword();'>
                        <div class="form-check form-check-inline">
                            <label class="form-check-label">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" onclick="showPassword()"> Show Passwords
                                <span class="form-check-sign">
                                    <span class="check"></span>
                                </span>
                            </label>
                        </div>
                    </div>

                  
                </div>
              
            </div>
            <div class="col-md-6 user_image_box">
                
                <img class="img-fluid img-rounded" src="<?php echo $user->image_path_and_placeholder(); ?>" alt="<?php echo $user->username; ?>">
                <p style="margin: 30px 0 0 0;"></p>
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
                    </div><div class="form-group">
                    <a id="user-id" href="index.php?mode=delete_user?id=<?php echo $user->id; ?>" class="btn btn-primary pull-left">Delete</a>
                    <input type="submit" value="Edit User" name="update" class="btn btn-primary pull-right" >
                  </div>
                </div>
                
            </div>
            </form>
          </div>
        </div>
    </div>
</div>

</div>