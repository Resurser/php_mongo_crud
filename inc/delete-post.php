<?php
include 'db.class.php';
if(isset($_GET['id'])){
    $id = $_GET['id'];   
//    $mongo =  DB::instantiate();
//    $post_collection = $mongo->get_collection('posts');
//    $post_id = $post_collection->remove(array('_id' =>$id), array('safe'=>TRUE));
    $collection = 'posts';
    $post = new DB();
    $result = $post->deleteDocument($collection,$id);
    header('Location:../dashboard.php');
    
}
?>