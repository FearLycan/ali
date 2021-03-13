<?php

use app\models\Product;

/** @var Product $model */


?>


<div class="menu">
    <div class="row">

        <div class="col-md-2">
            <img src="<?= $model->getProductsImages()[0] ?>" class="img-responsive thumbnail">
        </div>

        <div class="col-md-8">
            <h3>
                <?= $model->name ?>
            </h3>
        </div>

    </div>

</div>

