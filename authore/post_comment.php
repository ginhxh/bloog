<?php
require_once '../signup/dbh.inc.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['article_id'], $_POST['comment'])) {
    $article_id = (int)$_POST['article_id'];
    $comment = htmlspecialchars($_POST['comment']);

    $stmt = $pdo->prepare("INSERT INTO commentes (article_id, comment) VALUES (:article_id, :comment)");
    $stmt->bindParam(':article_id', $article_id, PDO::PARAM_INT);
    $stmt->bindParam(':comment', $comment, PDO::PARAM_STR);

    if ($stmt->execute()) {
        header("Location: article.php?id=" . $article_id);
        exit();
    } else {
        echo "Failed to post comment.";
    }
} else {
    header("Location: ../main_page.php");
    exit();
}
