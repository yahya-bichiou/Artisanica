<?php
include $_SERVER['DOCUMENT_ROOT'].'/Projet-Web/controller/forumC.php'; 

$c = new ForumC();
$tab = $c->listForum();

?>

    <?php
    foreach ($tab as $forum) {
    ?>
					    <!-- Comment Item start-->
					    <li class='media'>

					        <a class='pull-left' href='#'>
					            <img class='media-object comment-avatar' src='images/blog/avater-1.jpg' alt='' width='50' height='50'>
					        </a>

					        <div class='media-body'>
					            <div class='comment-info'>
					                <h4 class='comment-author'>
					                    <a href='#'><?= $forum['nom_msg']; ?></a>
					                	
					                </h4>
					                <time><?= $forum['date_msg']; ?></time>
					            </div>

					            <p>
                                    <?= $forum['txt_msg']; ?>
					            </p>

					        </div>

					    </li>
					    <!-- End Comment Item -->
    <?php
    }
    ?>