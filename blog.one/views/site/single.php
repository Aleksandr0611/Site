<?php
use yii\helpers\Url;
?>
<!--main content start-->
<div class="main-content">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <entry class="post">
                    
                    <div class="post-content">
                        <header class="entry-header text-center text-uppercase">
                            <h6><a href="<?= Url::toRoute(['site/category','id'=>$entry->category->id])?>"> <?= $entry->category->title?></a></h6>

                            <h1 class="entry-title"><a href="<?= Url::toRoute(['site/view','id'=>$entry->id])?>"><?= $entry->title?></a></h1>


                        </header>
                        <div class="entry-content">
                            <?= $entry->content?>
                        </div>
                        <div class="decoration">
                            <a href="#" class="btn btn-default">Decoration</a>
                            <a href="#" class="btn btn-default">Decoration</a>
                        </div>

                        
                    </div>
                </entry>

             
            </div>
            <?= $this->render('/partials/sidebar', [
                'popular'=>$popular,
                'categories'=>$categories
            ]);?>
        </div>
    </div>
</div>
<!-- end main content-->