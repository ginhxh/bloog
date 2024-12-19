<?php 
include '../signup/header_author.php';
require_once 'add_view.php';

if (isset($_SESSION['errors_post'])) {
    foreach ($_SESSION['errors_post'] as $error) {
        echo "<p style='color: red;'>$error</p>";
    }
    unset($_SESSION['errors_post']);
}
?>

<form class="form-post" action="add.inc.php" method="POST">

<input type="text" name="title" placeholder="Title">
<input type="text" name="url_img" placeholder="enter url img">

<textarea name="content" placeholder="Enter your content here"></textarea>
 <button class="vv" type="submit">Post</button>
</form>
