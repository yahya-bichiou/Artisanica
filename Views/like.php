<?php
    include $_SERVER['DOCUMENT_ROOT'].'/Projet-Web/controller/newsC.php';

    $c = new NewsC();
    $newsId = $_GET['id'];

    if ($c->likeNews($newsId)) {
        header("Location: {$_SERVER['HTTP_REFERER']}");
    } else {
        echo "An error occurred while liking the news article.";
    }
?>