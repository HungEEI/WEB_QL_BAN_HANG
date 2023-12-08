<?php

function get_pugging($num_page, $page, $base_url = ""){
    $str_pagging = "<nav aria-label='Page navigation example'>";
    $str_pagging .= "<ul class='pagination'>";
    if($page > 1){
        $page_prev = $page - 1;
        $str_pagging .= "<li class='page-item'><a class='page-link' href=\"{$base_url}&page={$page_prev}\"> Prev </a></li>"; 
    }
    for($i = 1; $i <= $num_page; $i++){
        $active = "";
        if($i == $page)
            $active = "class = 'active'";
        $str_pagging .= "<li class='page-item'><a {$active} class='page-link' href=\"{$base_url}&page={$i}\">{$i}</a></li>";
    }
    if($page < $num_page){
        $page_next = $page + 1;
        $str_pagging .= "<li class='page-item'><a class='page-link' href=\"{$base_url}&page={$page_next}\"> Next </a></li>"; 
    }
    $str_pagging .= "</ul>";
    $str_pagging .= "</nav>";
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
