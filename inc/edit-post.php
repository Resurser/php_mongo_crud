<?php
include 'db.class.php';
if(isset($_REQUEST['update_post'])){
    $id = $_REQUEST['post_id'];
    $title = $_REQUEST['title'];
    $content = $_REQUEST['content'];
    $collection = 'posts';
    
    if(!empty($title) && !empty($content)){
   
    $post = array(
                'title' => $title,
                'content' => $content,               
            );
    $result = DB::instantiate()->updateDocument($collection,$id,$post);
    header('Location:../dashboard.php');
    }
}
?>