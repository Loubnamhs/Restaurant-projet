<?php

use App\Helpers\text;
?>

<div class="col-sm-4" style="border:1px solid black;">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title"><?= htmlentities($article->getNom_article()) ?></h5>
                <p><?= nl2br(htmlentities(text::excerpt($article->getDescriptions()))) ?></p>
                <p>
                    <a href="<?= $router->generate('article', ['ArticleID' => $article->getArticleID()]) ?>" class="btn btn-primary">Voir plus</a>
                </p>
           </div>
         </div>
    </div>