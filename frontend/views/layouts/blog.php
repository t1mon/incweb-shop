<?php

/* @var $this \yii\web\View */
/* @var $content string */

use frontend\widgets\Blog\CategoriesWidget;

?>
<?php $this->beginContent('@frontend/views/layouts/main.php') ?>
<section class="section-p-30px blog-page">
    <div class="container">
        <div class="row">

            <!-- Blog Bar -->
            <div class="col-sm-9 animate fadeInLeft" data-wow-delay="0.4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInLeft;">

                <?= $content ?>

            </div>

            <!-- Right Side Bar -->
            <div class="col-sm-3 animate fadeInRight" data-wow-delay="0.4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInRight;">
                <div class="side-bar">

                    <!--  SEARCH -->
                    <!--<div class="search">
                        <form>
                            <input placeholder="SEARCH FAQ" type="text">
                            <button type="submit"> <i class="fa fa-search"></i></button>
                        </form>
                    </div> -->

                    <!-- HEADING -->
                    <div class="heading">
                        <h4>Рубрики</h4>
                    </div>

                    <!-- CATEGORIES -->
                        <?= CategoriesWidget::widget([
                            'active' => $this->params['active_category'] ?? null
                        ]) ?>

                    <!-- HEADING -->
                    <!--<div class="heading">
                        <h4>Latest post</h4>
                    </div> -->
                    <!-- CATEGORIES -->
                   <!-- <ul class="cate latest-post">


                        <li>
                            <div class="media">
                                <div class="media-left"> <a href="#."><img src="/image/post-left-1.jpg" alt=""></a></div>
                                <div class="media-body"> <a href="#.">Pretty in pink</a>
                                    <p>86 View - 03 Comment</p>
                                </div>
                            </div>
                        </li>
                    </ul>  -->


                   <!-- <div class="heading">
                        <h4>Archive</h4>
                    </div>

                    <ul class="cate">
                        <li><a href="#.">March 2015
                                Jan 2015</a></li>
                        <li><a href="#."> December 2014</a></li>
                        <li><a href="#."> November 2014</a></li>
                        <li><a href="#."> July 2014</a></li>
                    </ul>


                    <h4 class="margin-t-40">Product Tags</h4>
                    <ul class="tags">
                        <li><a href="#.">FASHION</a></li>
                        <li><a href="#.">BAGS</a></li>
                        <li><a href="#.">TABLET</a></li>
                        <li><a href="#.">ELECTRONIC</a></li>
                        <li><a href="#.">BEAUTY</a></li>
                        <li><a href="#.">TRtENDING</a></li>
                        <li><a href="#.">SHOES</a></li>
                    </ul> -->
                </div>
            </div>
        </div>
    </div>
</section>


<?php $this->endContent() ?>
