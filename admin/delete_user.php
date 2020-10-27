<?php 
    include("includes/init.php");

    if(!$session->is_signed_in()) {
        redirect("login.php");
    }
    
    if(empty($_GET['id'])) {
        redirect('users.php');
    } else {
        $user = User::find_user_by_id($_GET['id']);

        if($user) {
            $user->delete_user_photo();
            redirect("users.php");
        } else {
            redirect("users.php");
        }
    }

    

?>