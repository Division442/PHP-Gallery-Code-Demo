<?php 
    include "inc/header.php";

    require_once("admin/init.php");

    if(empty($_GET['id'])) {
        redirect("index.php");
    }

    $photo = Photo::find_by_id($_GET["id"]);
    $user = User::find_by_id($photo->user_id);
    
    
    if(isset($_POST['submit'])) {
        $author     = trim($_POST['author']);
        $body       = trim($_POST['body']);
        $created    = date("Y-m-d H:i:s");

        $new_comment = Comment::create_comment($photo->id, $author, $body, $created);

        if($new_comment && $new_comment->save()) {
            redirect("photo.php?id={$photo->id}");
        } else {
            $message = "There was an issue saving your comment.";
        }
    } else {
        $author = "";
        $body = "";
        $created = "";
    }

    //$comments = Comment::find_the_comments($_GET["id"]);

?>
<div class="wrapper">
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
</div>

<?php include("inc/footer.php"); ?>