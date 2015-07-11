<?php
include 'db.class.php';
if(isset($_POST['add_post'])){
    $title = $_POST['title'];
    $content = $_POST['content'];
    
    if(!empty($title) && !empty($content)){
   
//    $mongo =  DB::instantiate();
//    $post_collection = $mongo->get_collection('posts');
    $post = array(
                '_id' => hash('sha1', time() . $title),
                'title' => $title,
                'content' => $content,
                'created_on' => new MongoDate()
            );
//    $post_id = $post_collection->insert($post,array('safe'=>true));
    $object = new DB();
    $result = $object->insertDocument('posts',$post);
    header('Location:../dashboard.php');
    }
}
