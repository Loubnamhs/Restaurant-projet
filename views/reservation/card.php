<?php

use App\Helpers\text;
?>

<div class="col-sm-2" style="border:1px solid black;border-radius:10px; margin:10px;">
        <div class="card">
            <h4 class="card-title center"><?= $reservation->getHeure() ?>:<?=$reservation->getMin() ?></h5>

            <div class="card-body">
                <p><?= nl2br(htmlentities(text::excerpt($reservation->getdate()))) ?></p>
                <p>
                    <a href="<?= $router->generate('reservation_id', ['id' => $reservation->getID()]) ?>" class="btn btn-primary">Réserver</a>
                </p>
           </div>
         </div>
    </div>