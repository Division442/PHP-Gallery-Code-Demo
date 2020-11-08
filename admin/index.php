<?php 
    include("inc/header.php");

    if(!$session->is_signed_in()) {
        redirect("login.php");
    }

    if(!isset($_GET['mode'])) {
        $mode = "";
    }
    
?>

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <?php include("inc/top_nav.php"); ?>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <?php include("inc/side_nav.php"); ?>
            
        </nav>

        <div id="page-wrapper">

            <?php 
                switch ($_GET['mode']) {

                    // View all users
                    case "users":
                        if(!$session->is_signed_in()) {
                            redirect("login.php");
                        }
                    
                        $users = User::find_all();
                        include "inc/users.php";
                    break;

                    // Upload new photo
                    case "upload_photo":
                        $message = "";
                        if(isset($_FILES['file'])) { 
                            $photo = new Photo();
                            $photo->title = $_POST['title'];
                            $photo->set_file($_FILES['file']);
                    
                            if($photo->save()) {
                                $message = "Photo uploaded successfully";
                            } else {
                                $message = join("<br>", $photo->errors);
                                
                            }
                        }

                        include "inc/upload.php";
                    break;

                    // View all comments
                    case "comments":
                        $comments = Comment::find_all();
                        include "inc/comments.php";
                    break;

                    // Delete comment
                    case "delete_comment":
                        if(empty($_GET['id'])) {
                            redirect('comments.php');
                        } else {
                            $comment = Comment::find_by_id($_GET['id']);
                    
                            if($comment) {
                                $comment->delete();
                                $message = "Comment successfully deleted.";
                                redirect("index.php?mode=comments");
                            } else {
                                $message = "There was a problem when deleting your comment.";
                                redirect("index.php?mode=comments");
                            }
                        }
                    break;

                    // Delete photo comments
                    case "delete_photo_comments":
                        if(empty($_GET['id'])) {
                            redirect('comments.php');
                        } else {
                            $comment = Comment::find_by_id($_GET['id']);
                    
                            if($comment) {
                                $comment->delete();
                                redirect("index.php?mode=photo_comments&id{$comment->photo_id}");
                            } else {
                                redirect("index.php?mode=photo_comments&id{$comment->photo_id}");
                            }
                        }
                    break;

                    // View photo comments
                    case "photo_comments":
                        if(empty($_GET['id'])) {
                            redirect("photos.php");
                        }
                        
                        $comment = Comment::find_the_comments($_GET['id']);
                        $photo = Photo::find_by_id($_GET['id']);
                        include "inc/photo_comments.php";
                    break;

                    // View all photos
                    case "photos":
                        $photos = Photo::find_all();
                        include "inc/photos.php";
                    break;

                    // Edit User
                    case "edit_user":
                        
                        if(empty($_GET['id'])) {
                            redirect("index.php?mode=users");
                        }
                            
                        $user = User::find_user_by_id($_GET['id']);
                            
                            
                        if(isset($_POST['update'])) {
                            
                            if($user) {
                                $user->username = $_POST['username'];
                                $user->first_name =$_POST['first_name'];
                                $user->last_name =$_POST['last_name'];
                                $user->password =$_POST['password'];
                                
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
                        include "inc/photo_modal.php";
                        include "inc/edit_user.php";
                    break;

                    // Add User
                    case "add_user":
                        $user = new User();

                        if(isset($_POST['create'])) {
                            if($user) {
                                $user->username = $_POST['username'];
                                $user->first_name =$_POST['first_name'];
                                $user->last_name =$_POST['last_name'];
                                $user->password =$_POST['password'];
                    
                                $user->set_file($_FILES['user_image']);
                                $user->upload_photo();
                                $session->message("The user {$user->username} has been added");
                                $user->save();
                                redirect("index.php?mode=users");
                            }
                        }

                        include "inc/add_user.php";
                    break;

                    // Delete User
                    case "delete_user":
                        if(empty($_GET['id'])) {
                            redirect('index.php?mode=users');
                        } else {
                            $user = User::find_user_by_id($_GET['id']);
                    
                            if($user) {
                                $user->delete_user_photo();
                                $session->message("The user has been deleted.");
                                redirect("index.php?mode=users");
                            } else {
                                redirect("index.php?mode=users");
                            }
                        }
                    break;

                    // Delete photo
                    case "delete_photo":
                        if(empty($_GET['id'])) {
                            redirect('photos.php');
                        }
                    
                        $photo = Photo::find_by_id($_GET['id']);
                    
                        if($photo) {
                            $photo->delete_photo();
                            redirect("index.php?mode=photos");
                        } else {
                            redirect("index.php?mode=photos");
                        }
                    break;

                    // Edit photo
                    case "edit_photo":
                        if(empty($_GET['id'])) {
                            redirect("photos.php");
                        } else {
                            $photo = Photo::find_by_id($_GET['id']);
                    
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

                        include "inc/edit_photo.php";
                    break;

                    // Logout
                    case "logout":
                        $session->logout();
                        redirect("login.php");
                    break;
                    
                    default:
                        // Include dashboard
                        include "inc/admin_content.php";
                    
                }
            ?>
        </div>
        <!-- /#page-wrapper -->

  <?php include("inc/footer.php"); ?>