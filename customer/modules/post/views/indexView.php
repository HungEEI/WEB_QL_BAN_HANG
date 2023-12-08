<?php
get_header();
?>

<?php 
$list_post = get_all_post();
$num_row = count(get_all_post());
// Số lượng bản ghi trên trang
$num_per_page = 3;
//Tổng số bản ghi
$total_row = $num_row;
// Tính tổng số trang   
$num_page = ceil($total_row / $num_per_page);
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$start = ($page - 1) * $num_per_page;
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
                    <h3 class="section-title">Tin tức</h3>
                </div>
                <div class="section-detail">
                    <ul class="list-item">
                        <?php
                        for($i = $start; $i < min($start + $num_per_page, $num_row); $i++){
                            $post = get_all_post($i); 
                            if($post[$i]['status'] == 'active'){
                                ?>
                                <li class="clearfix img-radius">
                                    <a href="<?php echo $post[$i]['url'] ?>" title="" class="thumb fl-left">
                                        <img src="../admin/<?php echo $post[$i]['image_url'] ?>" alt="">
                                    </a>
                                    <div class="info fl-right">
                                        <a href="?mod=post&controller=index&action=detail&id=<?php echo $post[$i]['post_id'] ?>" title="" class="title"><?php echo $post[$i]['post_title'] ?></a>
                                        <span class="create-date"><?php echo $post[$i]['created_at'] ?></span>
                                        <p class="desc"><?php echo $post[$i]['post_except'] ?></p>
                                    </div>
                                </li>
                                <?php
                            }
                        }
                        ?>
                    </ul>
                </div>
            </div>
            <?php 
            if($num_page >= 2) {
                echo get_pagging($num_page, $page, $base_url = "?mod=post&controller=index&action=index");
            }
            ?>
        </div>
        <?php get_sidebar('best') ?>
    </div>
</div>

<?php
get_footer();
?>