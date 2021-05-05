<div class="sidebar" data-color="purple" data-background-color="white">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
    <div class="logo">
        <a href="index.php" class="simple-text logo-normal">Gallery Code Demo</a>
    </div>

    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="nav-item<?php if ($_GET["mode"] == "") { echo " active"; } ?>">
                <a class="nav-link" href="index.php">
                    <i class="material-icons">dashboard</i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="nav-item<?php if ($_GET["mode"] == "users") { echo " active"; } ?>">
                <a class="nav-link" href="index.php?mode=users">
                    <i class="material-icons">person</i>
                    <p>Users</p>
                </a>
            </li>
            <li class="nav-item<?php if ($_GET["mode"] == "add_user") { echo " active"; } ?>">
                <a class="nav-link" href="index.php?mode=add_user">
                    <i class="material-icons">person_add</i>
                    <p>Add User</p>
                </a>
            </li>
            <li class="nav-item<?php if ($_GET["mode"] == "upload_photo") { echo " active"; } ?>">
                <a class="nav-link" href="index.php?mode=upload_photo">
                    <i class="material-icons">backup</i>
                    <p>Upload</p>
                </a>
            </li>
            <li class="nav-item<?php if ($_GET["mode"] == "photos") { echo " active"; } ?>">
                <a class="nav-link" href="index.php?mode=photos">
                    <i class="material-icons">monochrome_photos</i>
                    <p>Photos</p>
                </a>
            </li>
            <li class="nav-item<?php if ($_GET["mode"] == "comments" || $_GET["mode"] == "photo_comments") { echo " active"; } ?>">
                <a class="nav-link" href="index.php?mode=comments">
                    <i class="material-icons">library_books</i>
                    <p>Comments</p>
                </a>
            </li>
        </ul>
    </div>
</div>