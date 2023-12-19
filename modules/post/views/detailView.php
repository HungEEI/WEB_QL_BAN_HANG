<?php
get_header();
?>

<?php
$post = get_detail_post_by_id();
?>

<div id="main-content-wp" class="clearfix detail-blog-page">
    <div class="wp-inner">
        <div class="secion" id="breadcrumb-wp">
            <div class="secion-detail">
                <ul class="list-item clearfix">
                    <li>
                        <a href="" title="">Trang chủ</a>
                    </li>
                    <li>
                        <a href="" title="">Tin tức</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-content fl-right">         
            <div class="section" id="detail-blog-wp">
                <div class="section-head clearfix">
                    <h3 class="section-title"><?php echo $post['post_title'] ?></h3>
                </div>
                <div class="section-detail">
                    <span class="create-date"><?php echo $post['created_at'] ?></span>
                    <div class="detail">
                        <div class="section" id="detail-blog-wp">
                            <?php echo $post['post_content'] ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section" id="social-wp">
                <div class="section-detail">
                    <div class="fb-like" data-href="" data-layout="button_count" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>
                    <div class="g-plusone-wp">
                        <div class="g-plusone" data-size="medium"></div>
                    </div>
                    <div class="fb-comments" id="fb-comment" data-href="" data-numposts="5"></div>
                </div>
            </div>
        </div>
        <?php get_sidebar('best') ?>
    </div>
</div>
</div>

<?php

get_footer();
?>