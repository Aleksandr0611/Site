<?php
use yii\helpers\Url;
use yii\widgets\LinkPager;

?>
<!--main content start-->
<div class="main-content">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <?php

                foreach($entries as $entry):?>
                    <entry class="post post-list">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="post-thumb">
                                <a href="<?= Url::toRoute(['site/view','id'=>$entry->id]);?>"></a>

                                <a href="<?= Url::toRoute(['site/view','id'=>$entry->id]);?>" class="post-thumb-overlay text-center">
                                    <div class="text-uppercase text-center">View Post</div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="post-content">
                                <header class="entry-header text-uppercase">
                                    <h6><a href="<?= Url::toRoute(['site/category','id'=>$entry->category->id]);?>"> <?= $entry->category->title?></a></h6>

                                    <h1 class="entry-title"><a href="<?= Url::toRoute(['site/view','id'=>$entry->id]);?>">Home is peaceful place</a></h1>
                                </header>
                                <div class="entry-content">
                                    
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </entry>
                <?php endforeach;?>

                <?php
                echo LinkPager::widget([
                    'pagination' => $pagination,
                ]);
                ?>
            </div>
            <?= $this->render('/partials/sidebar', [
                'popular'=>$popular,
                'categories'=>$categories
            ]);?>
        </div>
    </div>
</div>
<!-- end main content-->