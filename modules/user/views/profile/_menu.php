<?php

use yii\helpers\Url;

?>
<section class="module-small" style="padding-bottom: 0;">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
            <div class="btn-group" role="group" aria-label="...">
                <div class="btn-group" role="group">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-fw"></i> Favorite
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a href="#"><i class="fa fa-fw"></i> Images</a></li>
                        <li><a href="#"><i class="fa fa-fw"></i> Members</a></li>
                        <li><a href="#"><i class="fa fa-fw"></i> Products</a></li>
                    </ul>
                </div>
                <a href="<?= Url::to(['/user/products']) ?>" type="button" class="btn btn-default"><i class="fa fa-fw"></i> Products</a>
                <a href="<?= Url::to(['/user/urls']) ?>" type="button" class="btn btn-default"><i class="fa fa-fw"></i> URLs</a>
            </div>


        </div>

    </div>
</section>
