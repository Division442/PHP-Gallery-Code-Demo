<?php 
    include("inc/inc_header.php");
?>

<script>
var check = function() {
    if (document.getElementById('password').value ==
      document.getElementById('confirm_password').value) {
      document.getElementById('message').style.color = 'green';
      document.getElementById('message').innerHTML = 'matching';
    } else {
      document.getElementById('message').style.color = 'red';
      document.getElementById('message').innerHTML = 'not matching';
    }
  }
</script>

<label>password :
  <input name="password" id="password" type="password" onkeyup='check();' />
</label>
<br>
<label>confirm password:
  <input type="password" name="confirm_password" id="confirm_password"  onkeyup='check();' /> 
  <span id='message'></span>
</label>
<?php



// defined("SITE_ROOT") ? null : define("SITE_ROOT", DS . "Applications" . DS . "MAMP"  . DS .  "htdocs"  . DS .  "udemy-php-oop"  . DS .  "gallery" );
// defined("INCLUDES_PATH") ? null : define("INCLUDES_PATH", SITE_ROOT.DS."admin".DS."inc");
// defined("CLASSES_PATH") ? null : define("CLASSES_PATH", SITE_ROOT.DS."admin".DS."classes");

// echo SITE_ROOT . "<br>";
// echo INCLUDES_PATH . "<br>";
// echo CLASSES_PATH . "<br>";
// echo "<br><br><br>";

// echo (__DIR__) ."<br>";
// echo $siteroot = rtrim($_SERVER['DOCUMENT_ROOT'],'/') ."<br>";
// echo dirname(__FILE__) ."<br>";
// echo dirname("/");

// echo "<br><br><br>";

// $pathInPieces = explode('/', $_SERVER['DOCUMENT_ROOT']);
// echo $pathInPieces[0];
// 

?>

<?php include("inc/inc_footer.php"); ?>



<div class="row" style="padding-bottom: 100px;">
    <!-- Blog Post Content Column -->
    <div class="col-lg-12">

        <!-- Blog Post -->

        <!-- Title -->
        <h1><?php echo $photo->title; ?></h1>

        <!-- Author -->
        <p class="lead">
            by <a href="#"><?php echo $user->first_name . $user->last_name; ?></a>
        </p>

        <hr>

        <!-- Date/Time -->
        <p><span class="glyphicon glyphicon-time"></span> <?php echo $photo->created; ?></p>

        <hr>

        <!-- Preview Image -->
        <img src="admin/<?php echo $photo->picture_path() ?>" alt="<?php echo $photo->alt_text; ?>" class="img-thumbnail">

        <hr>

        <!-- Post Content -->
        <p class="lead"><?php echo $photo->title; ?></p>
        <p><?php echo $photo->description; ?></p>

        <hr>

        <!-- Blog Comments -->

        <!-- Comments Form -->
        <div class="well">
            <h4>Leave a Comment:</h4>
            <form role="form" method="post" action="photo.php?id=<?php echo $photo->id ?>">
                <div class="form-group">
                    <label for="author">Author</label>
                    <input class="form-control" type="text" name="author">
                </div>
                <div class="form-group">
                    <label for="body">Your Comment</label>
                    <textarea class="form-control" rows="3" name="body"></textarea>
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

</div>
<!-- /.row -->