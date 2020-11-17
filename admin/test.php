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