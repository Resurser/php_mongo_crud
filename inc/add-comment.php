<?php
include 'db.class.php';
if(isset($_REQUEST['add_comment'])){
    $post_id = $_REQUEST['post_id'];
    $name = $_REQUEST['name'];
    $email = $_REQUEST['email'];
    $comment = $_REQUEST['comment'];
    $date = new MongoDate();
    $collection = 'posts';
    
    $comment = array(
                'name' => $name,
                'email' => $email,
                'comment' => $comment,
                'created_on' => $date
            );
    $result = DB::instantiate()->updateMergeDocument($collection,$post_id,$comment);
    header('Location:../view-post.php?id='.$post_id);
}

?>
