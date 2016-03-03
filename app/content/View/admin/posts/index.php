<?php
/**
 * Created by PhpStorm.
 * User: jonathan
 * Date: 09/09/15
 * Time: 23:21
 */
?>

<h3>Post Logged</h3>

<div class="row">
    <?php foreach($posts as $post): ?>
        <div class="col s12 section">
            <p class="blue-text right"><?= $post->author; ?></p>
            <h4><?= $post->title; ?></h4>
            <p class="truncate">
                <?= $post->Intro; ?>
            </p>
            <a href="<?= $post->Url; ?>">Voir l'article</a>
            <div class="divider"></div>
        </div>

    <?php endforeach; ?>
</div>
