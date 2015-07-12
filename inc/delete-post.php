<?php
include 'db.class.php';
if(isset($_REQUEST['id'])){
    $id = $_REQUEST['id'];
    $collection = 'posts';
    $result = DB::instantiate()->deleteDocument($collection,$id);
    header('Location:../dashboard.php');
}
?>