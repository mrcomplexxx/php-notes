<?php

function showUserNotes($conn, $current_page_num, $page_limit, $page_offset, $condition, $note_count){
  // query of fetching posts
  $query = "SELECT * FROM notes $condition ORDER BY created_at DESC LIMIT $page_limit OFFSET $page_offset";
  // fetching data
  $res = mysqli_query($conn, $query);
  $data = mysqli_fetch_all($res, MYSQLI_ASSOC);

  if (empty($data)) {
    echo "<h1 class='title pb-6 '>No notes to display.</h1>";
    return;
  }

  echo "<div class='columns'>";
  foreach ($data as $noteInfo) {
    include('templates/note.view.php');
  }
  echo "</div>";

  // total number of pages
  $total_page = ceil($note_count / $page_limit);
  // set next page number
  $next_page = $current_page_num+1;
  // set prev page number
  $prev_page = $current_page_num-1;

  if(isset($_GET['user'])){
    $user = "&user=".$_GET['user'];
  }
  else {
    $user = "";
  }

  echo "<nav class='pagination mb-6' role='navigation' aria-label='pagination'>";
  //showing prev button and check current page number is greater than 1
  $prev = "class='pagination-previous' ".(($current_page_num > 1)? 'href=\'?page='.$prev_page.$user.'\'' :'disabled');
  $next = 'class="pagination-next" '.(($total_page+1 != $next_page)? 'href=\'?page='.$next_page.$user.'\'' :'disabled');
  echo '<a '.$prev.'>Previous</a>';
  echo '<a '.$next.'>Next</a>';
  // show all number of pages
  echo "<ul class='pagination-list'>";
  for($i = 1; $i <= $total_page; $i++){
    echo "<li>";
    //highlight the current page number
    if($i == $current_page_num){
      echo '<a href="'.'?page='.$i.$user.'" class="pagination-link is-current">'.$i.'</a>';
    }else{
      echo '<a href="?page='.$i.$user.'" class="pagination-link">'.$i.'</a>';
    }
    echo "</li>";
  }

  // showing next button and check this is last page


  echo "</nav>";
}
