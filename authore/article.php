<?php



require_once '../signup/config_seesion.inc.php'; 
require_once 'showposts_model.php'; 
require_once '../signup/dbh.inc.php';
if (isset($_SESSION['user_id'])) {
    include '../signup/header_author.php';

 }
 else {include '../signup/header_public.php';

}
if (isset($_GET['id'])) {
    $article_id = (int)$_GET['id'];

    $stmt = $pdo->prepare("SELECT * FROM article WHERE id = :id");
    $stmt->bindParam(':id', $article_id, PDO::PARAM_INT);
    $stmt->execute();
    $article = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($article) {
        $title = htmlspecialchars($article['title']);
        $content = htmlspecialchars($article['content']);
        $image_url = htmlspecialchars($article['url_img']);
    } else {
        $title = "Article not found";
        $content = "The article you are looking for does not exist.";
        $image_url = "https://imgs.search.brave.com/YF64GA-Q-WdfKq1A1nHbJUV5-6wQU8gDxQZiEvIniD4/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9maW5k/bmVyZC5jb20vaW1h/Z2VzL2RlZmF1bHRw/cm9maWxlaW1hZ2Uu/anBn";
    }
} else {
    header("Location: ../authore/index.php"); 
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <section>
        <div class="post_detail">
            <div class="img_read">
                <img src="<?= $image_url ?>" alt="<?= $title ?>">
            </div>
            <div class="contint">
                <h1 class="title_read"><?= $title ?></h1>
                <p class="content_read"><?= $content ?></p>
            </div>
            <div class="likk">
                <button>Like</button>
                <span>0</span>
            </div>
            <form class="form_comment" action="post_comment.php" method="POST">
                <input type="hidden" name="article_id" value="<?= $article_id ?>">
                <input class="comment_plc" type="text" name="comment" placeholder="Comment here" required>
                <button class="enter_comment" type="submit">Comment</button>
            </form>
        </div>
    </section>
    <section>
        <div class="comment_comt">
            <ul class="comment_lis">
                <?php
$stmt = $pdo->prepare("SELECT comment FROM commentes WHERE article_id = :id ORDER BY created_time DESC");
$stmt->bindParam(':id', $article_id, PDO::PARAM_INT);
                $stmt->execute();
                $comments = $stmt->fetchAll(PDO::FETCH_ASSOC);

                if ($comments) {
                    foreach ($comments as $comment) {
                        echo '<li>';
                        echo '<p>' . htmlspecialchars($comment['comment']) . '</p>';
                        echo '</li>';
                    }
                } else {
                    echo '<li>No comments yet.</li>';
                }
                ?>
            </ul>
        </div>
    </section>
</body>
</html>
