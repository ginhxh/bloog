<?php

require_once '../signup/config_seesion.inc.php'; 
require_once 'showposts_model.php'; 
require_once '../signup/dbh.inc.php';
if (isset($_SESSION['user_id'])) {
    include '../signup/header_author.php';

 }
 else {include '../signup/header_public.php';

}

$postes=get_postes($pdo);
?>
<section id="blog">
      <div class="blog-heading">
        <h3>Most Populer</h3>
      </div>

      <div class="blog-container">
        <?php if(!empty($postes)): ?>
            <?php foreach($postes as $post):?>
        <div class="blog-box">
          <div class="blog-img">
            <img src="<?= htmlspecialchars($post['url_img']);?>" alt="post_img" />
          </div>
          <div class="blog-text">
            <span><?= htmlspecialchars($post['created_time']); ?></span>
            <a href="#" class="blog-title"><?=htmlspecialchars($post['title']);?></a>
            <p>
            <?= htmlspecialchars($post['content']); ?>
            </p>
            <form action="../authore/lirpost_model.php" method="get"><a href="../authore/article.php?id=<?= htmlspecialchars($post['id']); ?>">Read More</a>    </form>
          </div>
        </div>
        <?php endforeach; ?>
        <?php else: ?>
            <p>No posts available.</p>

        <?php endif;?>
      </div>
    </section>
</body>
</html>

