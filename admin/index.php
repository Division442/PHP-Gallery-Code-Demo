<?php 
    include("inc/inc_header.php");

    if(!$session->is_signed_in()) {
        redirect("login.php");
    }

    $mode = $_GET["mode"] ?? "";
    
    // Clear message sessions to ensure it doesn't carry over into other pages
    if(isset($session->message)) {
        unset($_SESSION['message']);
    }
?>




<div class="wrapper ">

    <?php include("inc/inc_side_nav.php"); ?>
    
    <div class="main-panel">
        <?php include("inc/inc_top_nav.php"); ?>

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">

                    <?php
                        switch ($mode) {

                            // View all users
                            case "users": 
                                $users = User::find_all();
                                include "inc/inc_users.php";
                            break;

                            // View all comments
                            case "comments":
                                $comments = Comment::find_all();
                                include "inc/inc_comments.php";
                            break;

                            // View photo comments
                            case "photo_comments":
                                if(empty($_GET['id'])) {
                                    redirect("index.php");
                                }
                                
                                $comment = Comment::find_the_comments($_GET['id']);
                                $photo = Photo::find_by_id($_GET['id']);
                                include "inc/inc_photo_comments.php";
                            break;

                            // View all photos
                            case "photos":
                                $photos = Photo::find_all_user_photos();
                                include "inc/inc_photos.php";
                            break;
                            
                            // Delete comment
                            case "delete_comment":
                                if(empty($_GET['id'])) {
                                    redirect('index.php?mode=comments');
                                } else {
                                    $comment = Comment::find_by_id($_GET['id']);
                            
                                    if($comment) {
                                        $comment->delete();
                                        $session->message("Comment successfully deleted.");
                                        redirect("index.php?mode=comments");
                                    } else {
                                        $session->message("There was a problem when deleting your comment.");
                                        redirect("index.php?mode=comments");
                                    }
                                }
                            break;

                            // Delete photo comments
                            case "delete_photo_comments":
                                if(empty($_GET['id'])) {
                                    redirect('index.php?mode=comments');
                                } else {
                                    $comment = Comment::find_by_id($_GET['id']);
                            
                                    if($comment) {
                                        $comment->delete();
                                        $session->message("Comment successfully deleted.");
                                        redirect("index.php?mode=photo_comments&id={$comment->photo_id}");
                                    } else {
                                        $session->message("An error occurred and the comment was not deleted.");
                                        redirect("index.php?mode=photo_comments&id={$comment->photo_id}");
                                    }
                                }
                            break;

                            // Edit User
                            case "edit_user":
                                
                                if(empty($_GET['id'])) {
                                    redirect("index.php?mode=users");
                                }
                                    
                                $user = User::find_by_id($_GET['id']);

                                if(isset($_POST['update'])) {
                                    
                                    if($user) {
                                        $user->username     = $_POST['username'];
                                        $user->first_name   = $_POST['first_name'];
                                        $user->last_name    = $_POST['last_name'];
                                        $user->user_level   = $_POST['user_level'];
                                        $user->bio          = $_POST['bio'];

                                        if(!empty($_POST['password'])) {
                                            $user->password     = password_hash($_POST['username'], PASSWORD_DEFAULT);
                                        }
                                        
                                        if(empty($_FILES['user_image'])) {
                                        
                                            $user->save();
                                            $session->message("The user has been updated.");
                                            redirect("index.php?mode=users");
                                
                                        } else {
                                            
                                            $user->set_file($_FILES['user_image']);
                                            $user->upload_photo();
                                            $session->message("The user has been updated.");
                                            $user->save();
                                            redirect("index.php?mode=users");
                                        }
                                    
                                    }
                                }
                                
                                $photos = Photo::find_all();
                                include "inc/inc_edit_user.php";
                            break;

                            // Add User
                            case "add_user":
                                $user = new User();

                                if(isset($_POST['create'])) {
                                    if($user) {
                                        // Encrypt password before inserting into database
                                        $user->username     = $_POST['username'];
                                        $user->first_name   = $_POST['first_name'];
                                        $user->last_name    = $_POST['last_name'];
                                        $user->user_level   = $_POST['user_level'];
                                        $user->password     = password_hash($_POST['password'], PASSWORD_DEFAULT);
                                        $user->created      = date("Y-m-d H:i:s");
                                        $user->bio          = $_POST['bio'];
                            
                                        $user->set_file($_FILES['user_image']);
                                        $user->upload_photo();
                                        $session->message("The user <strong>{$user->username}</strong> has been added");
                                        $user->save();
                                        redirect("index.php?mode=users");
                                    }
                                }

                                include "inc/inc_add_user.php";
                            break;

                            // Delete User
                            case "delete_user":
                                if(empty($_GET['id'])) {
                                    redirect('index.php?mode=users');
                                } else {
                                    $user = User::find_by_id($_GET['id']);
                                    $photo = Photo::find_by_user_id($_GET['id']);
                            
                                    if($user) {
                                        $user->delete_user_photo();
                                        $photo->delete_user_content($_GET['id']);
                                        $session->message("User" . " " . $user->first_name . " " . $user->last_name . " " . "has been deleted.");
                                        redirect("index.php?mode=users");
                                    } else {
                                        $session->message("There was an error deleting the selected user," . " " . $user->first_name . " " . $user->last_name);
                                        redirect("index.php?mode=users");
                                    }
                                }
                            break;

                            // Upload new photo
                            case "upload_photo":
                                $message = "";
                                if(isset($_FILES['file'])) { 
                                    $photo = new Photo();
                                    $photo->title       = $_POST['title'];
                                    $photo->caption     = $_POST['caption'];
                                    $photo->alt_text    = $_POST['alt_text'];
                                    $photo->description = $_POST['description'];
                                    $photo->set_file($_FILES['file']);
                                    $photo->user_id     = $_POST['user_id'];
                                    $photo->created     = date("Y-m-d H:i:s");
                            
                                    if($photo->save()) {
                                        $session->message("Photo/s uploaded successfully.");
                                    } else {
                                        $message = join("<br>", $photo->errors);
                                        
                                    }
                                }

                                include "inc/inc_upload.php";
                            break;

                            // Delete photo
                            case "delete_photo":
                                if(empty($_GET['id'])) {
                                    redirect('inc_photos.php');
                                }
                            
                                $photo = Photo::find_by_id($_GET['id']);
                            
                                if($photo) {
                                    $photo->delete_photo();
                                    $session->message("The selected photo has been successfully deleted.");
                                    redirect("index.php?mode=photos");
                                } else {
                                    $session->message("There was an error when deleting the selected photo, please try again or contact technical support.");
                                    redirect("index.php?mode=photos");
                                }
                            break;

                            // Edit photo
                            case "edit_photo":
                                if(empty($_GET['id'])) {
                                    redirect("index.php?mode=photos");
                                } else {
                                    $photo = Photo::find_by_id($_GET['id']);
                                    $session->message("The selected photo has been successfully updated.");
                            
                                    if(isset($_POST['update'])) {
                                        
                                        if($photo) {
                                            $photo->title = $_POST['title'];
                                            $photo->caption = $_POST['caption'];
                                            $photo->alt_text = $_POST['alt_text'];
                                            $photo->description = $_POST['description'];
                                            $photo->save();
                                        }
                            
                                    }
                                }
                                include "inc/inc_edit_photo.php";
                            break;

                            // Logout
                            case "logout":
                                $session->logout();
                                redirect("login.php");
                            break;

                            default:
                                // Include dashboard
                                include "inc/inc_dashboard.php";
                            break;
                            
                        }
                    ?>
                    </div>
                </div>
            </div>
        </div> 
         
<?php include("inc/inc_footer.php"); ?>