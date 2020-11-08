<?php 
    include "inc/header.php";

    require_once("admin/init.php");

    if(empty($_GET['id'])) {
        redirect("index.php");
    }

    $photo = Photo::find_by_id($_GET["id"]);
    
    if(isset($_POST['submit'])) {
        $author = trim($_POST['author']);
        $body   = trim($_POST['body']);

        $new_comment = Comment::create_comment($photo->id, $author, $body);

        if($new_comment && $new_comment->save()) {
            redirect("photo.php?id={$photo->id}");
        } else {
            $message = "There was an issue saving your comment, sorry about that.";
        }
    } else {
        $author = "";
        $body = "";
    }

    $comments = Comment::find_the_comments($photo->id);

?>

        <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-lg-12">

                <!-- Blog Post -->

                <!-- Title -->
                <h1><?php echo $photo->title; ?></h1>

                <!-- Author -->
                <p class="lead">
                    by <a href="#">Set users first name via session</a>
                </p>

                <hr>

                <!-- Date/Time -->
                <p><span class="glyphicon glyphicon-time"></span> Replace with timestamp from created field.</p>

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

                <hr>

                <!-- Posted Comments -->

                <!-- Comment -->
                <?php foreach($comments as $comment) : ?>
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">Author: <?php echo $comment->author; ?>
                            <small><?php echo $comment->created; ?></small>
                        </h4>
                        <?php echo $comment->body; ?>
                    </div>
                </div>
                <?php endforeach ?>

            </div>

        </div>
        <!-- /.row -->

<?php include "inc/footer.php"; ?>