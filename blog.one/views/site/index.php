<?php
use yii\helpers\Url;
use yii\widgets\LinkPager;
?>
<!--main content start-->
<div class="main-content">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <?php foreach($entries as $entry):?>
                    <entry class="post">
                        <div class="post-thumb">
                            

                            <a href="<?= Url::toRoute(['site/view', 'id'=>$entry->id]);?>" class="post-thumb-overlay text-center">
                                <div class="text-uppercase text-center">View Post</div>
                            </a>
                        </div>
                        <div class="post-content">
                            <header class="entry-header text-center text-uppercase">
                                <h6><a href="<?= Url::toRoute(['site/category','id'=>$entry->category->id])?>"> <?= $entry->category->title; ?></a></h6>

                                <h1 class="entry-title"><a href="<?= Url::toRoute(['site/view', 'id'=>$entry->id]);?>"><?= $entry->title?></a></h1>


                            </header>
                            <div class="entry-content">
                                

                                <div class="btn-continue-reading text-center text-uppercase">
                                    <a href="<?= Url::toRoute(['site/view', 'id'=>$entry->id]);?>" class="more-link">Continue Reading</a>
                                </div>
                            </div>
                            <div class="social-share">
                                
                                <ul class="text-center pull-right">
                                    <li><a class="s-facebook" href="#"><i class="fa fa-eye"></i></a></li><?= (int) $entry->viewed?>
                                </ul>
                            </div>
                        </div>
                    </entry>
                <?php endforeach; ?>

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
<!--footer start-->