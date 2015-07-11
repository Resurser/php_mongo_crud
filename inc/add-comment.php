<?php
include 'db.class.php';
if(isset($_POST['add_comment'])){
    $post_id = $_POST['post_id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $comment = $_POST['comment'];
    $date = new MongoDate();
    $collection = 'posts';
    
//    $mongo =  DB::instantiate();
//    $post_collection = $mongo->get_collection('posts');
    $comment = array(
                'name' => $name,
                'email' => $email,
                'comment' => $comment,
                'created_on' => $date
            );
//    $post_collection->update(array('_id' => $post_id), array('$push' => array('comments' => $comment)));
    $result = DB::connect()->updateMergeDocument($collection,$post_id,$comment);
    header('Location:../view-post.php?id='.$post_id);
}

?>
