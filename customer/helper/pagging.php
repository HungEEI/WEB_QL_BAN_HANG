<?php

function get_pagging($num_page, $page, $base_url = ""){
    $str_pagging = "<div class='section' id='paging-wp'>";
    $str_pagging .= "<div class='section-detail'>";
    $str_pagging .= "<ul class='list-item clearfix'>";
    if($page > 1){
        $page_prev = $page - 1;
        $str_pagging .= "<li><a href=\"{$base_url}&page={$page_prev}\"> < </a></li>"; 
    }
    for($i = 1; $i <= $num_page; $i++){
        $active = "";
        if($i == $page)
            $active = "class = 'active'";
        $str_pagging .= "<li {$active}><a href=\"{$base_url}&page={$i}\">{$i}</a></li>";
    }
    if($page < $num_page){
        $page_next = $page + 1;
        $str_pagging .= "<li><a href=\"{$base_url}&page={$page_next}\"> > </a></li>"; 
    }
    $str_pagging .= "</ul>";
    $str_pagging .= "</div>";
    $str_pagging .= "</div>";
    return $str_pagging;
}

?>

<!-- <nav aria-label="Page navigation example">
    <ul class="pagination">
        <li class="page-item">
            <a class="page-link" href="#">Prev</a>
        </li>
        <li class="page-item"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item">
            <a class="page-link" href="#" aria-label="Next">Next</a>
        </li>
    </ul>
</nav> -->
