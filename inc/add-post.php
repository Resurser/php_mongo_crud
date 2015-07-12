<?php
include 'db.class.php';
if(isset($_REQUEST['add_post'])){
    $title = $_REQUEST['title'];
    $content = $_REQUEST['content'];
    
    if(!empty($title) && !empty($content)){
   
    $post = array(
                '_id' => hash('sha1', time() . $title),
                'title' => $title,
                'content' => $content,
                'created_on' => new MongoDate()
            );
    $result = DB::instantiate()->insertDocument('posts',$post);
    header('Location:../dashboard.php');
    }
}
