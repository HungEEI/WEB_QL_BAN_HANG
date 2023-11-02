<?php
get_header();
?>

<?php 
$list_post = db_fetch_array("SELECT posts.*, images.image_url
FROM `posts`
JOIN `images` ON posts.image_id = images.image_id");
?>

<div id="main-content-wp" class="clearfix blog-page">
    <div class="wp-inner">
        <div class="secion" id="breadcrumb-wp">
            <div class="secion-detail">
                <ul class="list-item clearfix">
                    <li>
                        <a href="?" title="">Trang chủ</a>
                    </li>
                    <li>
                        <a href="" title="">Tin tức</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-content fl-right">
            <div class="section" id="list-blog-wp">
                <div class="section-head clearfix">
                    <h3 class="section-title">Blog</h3>
                </div>
                <div class="section-detail">
                    <ul class="list-item">
                        <?php
                        foreach($list_post as $post) {
                            ?>
                            <li class="clearfix">
                                <a href="?mod=post&action=detail" title="" class="thumb fl-left">
                                    <img src="../admin/<?php echo $post['image_url'] ?>" alt="">
                                </a>
                                <div class="info fl-right">
                                    <a href="?mod=post&action=detail" title="" class="title"><?php echo $post['post_title'] ?></a>
                                    <span class="create-date"><?php echo $post['created_at'] ?></span>
                                    <p class="desc"><?php echo $post['post_except'] ?></p>
                                </div>
                            </li>
                            <?php
                        }
                        ?>
                    </ul>
                </div>
            </div>
            <div class="section" id="paging-wp">
                <div class="section-detail">
                    <ul class="list-item clearfix">
                        <li>
                            <a href="" title="">1</a>
                        </li>
                        <li>
                            <a href="" title="">2</a>
                        </li>
                        <li>
                            <a href="" title="">3</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <?php get_sidebar('best') ?>
    </div>
</div>

<?php
get_footer();
?>