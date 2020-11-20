<?php
    require_once("init.php"); 

    if(isset($_POST['submit'])) {
        $username = trim($_POST['username']); 
        $password = trim($_POST['password']);

        $user_found = User::verify_user($username, $password);   
        //Will always find a user even if password is incorrect - or does it, something odd is happening here. Why does it fail on first incorrect, then pass even if the password is incorrect?    
        
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
  

    <title>Pleae Login to the Gallery PHP Code Demo</title>
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
<div class="wrapper" style="margin: 80px 0 0 0;">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-4">
                        <?php 
                            if($message) {
                                echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>";
                                echo "<strong>{$message}</strong>";
                                echo "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>";
                                echo "<span aria-hidden='true'>&times;</span>";
                                echo "</button>";
                                echo "</div>";
                            }
                        ?>
                            
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header card-header-primary">
                                    <h4 class="card-title">Please Login</h4>
                                    <p class="category">Gallery PHP Code Demo</p>
                                </div>
                                <div class="card-body">
                                    <form id="login-id" action="login.php" method="post">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="material-icons">person</i>
                                                </span>
                                            </div>
                                            <input type="text" class="form-control" name="username" value="" placeholder="Your username" required>
                                        </div>

                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="material-icons">vpn_key</i>
                                                </span>
                                            </div>
                                            <input type="password" class="form-control" id="password" name="password" value="" placeholder="Your password" required>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" onclick="showLoginPassword()"> Show Password
                                                    <span class="form-check-sign">
                                                        <span class="check"></span>
                                                    </span>
                                                </label>
                                            </div>
                                        </div>

                                        <div class="input-group">
                                            <input type="submit" name="submit" value="Submit" class="btn btn-primary pull-right" style="margin: 0 0 0 55px;">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
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
<!--   Core JS Files   -->
<script src="js/core/jquery.min.js"></script>
<script src="js/core/popper.min.js"></script>
<script src="js/core/bootstrap-material-design.min.js"></script>
<script src="js/plugins/perfect-scrollbar.jquery.min.js"></script>
<!-- Plugin for the momentJs  -->
<script src="js/plugins/moment.min.js"></script>
<!--  Plugin for Sweet Alert -->
<script src="js/plugins/sweetalert2.js"></script>
<!-- Forms Validations Plugin -->
<script src="js/plugins/jquery.validate.min.js"></script>
<!-- Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
<script src="js/plugins/jquery.bootstrap-wizard.js"></script>
<!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
<script src="js/plugins/bootstrap-selectpicker.js"></script>
<!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
<script src="js/plugins/bootstrap-datetimepicker.min.js"></script>
<!--  DataTables.net Plugin, full documentation here: https://datatables.net/  -->
<script src="js/plugins/jquery.dataTables.min.js"></script>
<!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
<script src="js/plugins/bootstrap-tagsinput.js"></script>
<!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
<script src="js/plugins/jasny-bootstrap.min.js"></script>
<!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
<script src="js/plugins/fullcalendar.min.js"></script>
<!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
<script src="js/plugins/jquery-jvectormap.js"></script>
<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
<script src="js/plugins/nouislider.min.js"></script>
<!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
<!-- Library for adding dinamically elements -->
<script src="js/plugins/arrive.min.js"></script>
<!-- Chartist JS -->
<script src="js/plugins/chartist.min.js"></script>
<!--  Notifications Plugin    -->
<script src="js/plugins/bootstrap-notify.js"></script>
<!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
<script src="js/material-dashboard.js?v=2.1.2" type="text/javascript"></script>

<!-- Scripts -->
<script type="text/javascript" src="js/tinymce.js"></script>
<script type="text/javascript" src="js/scripts.js"></script>
<script type="text/javascript" src="js/dropzone.js"></script>
</html>
