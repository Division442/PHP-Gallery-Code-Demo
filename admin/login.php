<?php
    require_once("init.php"); 

    if(isset($_POST['submit'])) {
        $username = trim($_POST['username']); 
        $password = trim($_POST['password']);

        $user_found = User::verify_user($username, $password);        
        
        if($user_found) {
            $session->login($user_found);
            redirect('index.php');
        } else {
            $message = "Your password or username is incorrect.";
        }

    } else {
        $message = "";
        $username = "";
        $password = "";
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <meta name="description" content="">
    <meta name="author" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  

    <title>Gallery Admin Code Demo</title>
    <link href="css/material-dashboard.css" rel="stylesheet">
    <link href="css/dropzone.css" rel="stylesheet">
    <!-- Custom styles specific to app -->
    <link href="css/styles.css" rel="stylesheet">
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
<?php include("../inc/navigation.php"); ?>
<div class="wrapper ">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-4">
                        <?php 
                            if($message) {
                                echo "<div class='alert alert-info alert-dismissible fade show' role='alert'>";
                                echo "<strong>{$message}</strong>";
                                echo "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>";
                                echo "<span aria-hidden='true'>&times;</span>";
                                echo "</button>";
                                echo "</div>";
                            }
                        ?>
                            <form id="login-id" action="login.php" method="post">
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" class="form-control" name="username" value="<?php echo htmlentities($username); ?>" >
                                </div>

                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" name="password" value="<?php echo htmlentities($username); ?>">
                                </div>

                                <div class="form-group">
                                    <input type="submit" name="submit" value="Submit" class="btn btn-primary">
                                </div>
                            </form>
                        <div class="col-md-4"></div>

                    </div>
                </div>
            </div>
        </div>                        
            <footer class="footer fixed-bottom">
                <div class="container-fluid">
                    <nav class="float-left">
                        <ul>
                            <li>
                                <a href="https://division442.com">
                                Division | 442
                                </a>
                            </li>
                            <li>
                                <a href="mailto://blake@division442.com"><i class="material-icons footer_icons">email</i> blake@division442.com</a>
                            </li>
                            <li>
                                <a href="tel://415 238-8090"><i class="material-icons footer_icons">perm_phone_msg</i> 415 238-8090</a>
                            </li>
                        </ul>
                    </nav>
                    <div class="copyright float-right">
                        &copy;
                        <script>
                        document.write(new Date().getFullYear())
                        </script>,
                        <a href="https://division442.com" target="_blank">Blake Foss</a> Backend Developer PHP, MySQL, SQLServer, ColdFusion, Web Developer (Full Stack) and WordPress.
                    </div>
                </div>
            </footer>               
</div>
</body>

</html>
