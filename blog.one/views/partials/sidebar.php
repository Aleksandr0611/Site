<?php
use yii\helpers\Url;
?>
<div class="col-md-4" data-sticky_column>
    <div class="primary-sidebar">

        <aside class="widget">
            <h3 class="widget-title text-uppercase text-center">Popular Posts</h3>
            <?php

            foreach($popular as $entry):?>
                <div class="popular-post">
                    <a href="<?= Url::toRoute(['site/view','id'=>$entry->id]);?>" 

                        <div class="p-overlay"></div>
                    </a>

                    <div class="p-content">
                        <a href="<?= Url::toRoute(['site/view','id'=>$entry->id]);?>" class="text-uppercase"><?= $entry->title?></a>
                    </div>
                </div>
            <?php endforeach;?>

        </aside>

        <aside class="widget border pos-padding">
            <h3 class="widget-title text-uppercase text-center">Categories</h3>
            <ul>
                <?php foreach($categories as $category):?>
                    <li>
                        <a href="<?= Url::toRoute(['site/category','id'=>$category->id]);?>"><?= $category->title?></a>
                       
                    </li>
                <?php endforeach;?>

            </ul>
        </aside>
    </div>
</div>