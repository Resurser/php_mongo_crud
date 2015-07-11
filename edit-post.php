<?php 
include 'inc/db.class.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $collection = 'posts';

//    $mongo = DB::instantiate();
    $post = new DB();
    $post = $post->selectDocument($collection,$id);
//    $post_collection = $mongo->get_collection('posts');
//
//    $post = $post_collection->findOne(array('_id' => $id));
}
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Edit Post</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
</head>

<body class="container">
<h1 align="center">Edit Post</h1>
<form method="post" action="inc/edit-post.php">
<div class="form-group">
    <label for="title">Title</label>
    <input type="text" name="title" id="title" required="required" size="100" value="<?php echo $post['title'];?>" class="form-control">
</div>
<div class="form-group">
    <label for="content">Content</label>
    <textarea name="content" id="content" required="required" cols="80" rows="15" class="form-control"><?php echo $post['content'];?></textarea>
</div>
<div class="form-group">
    <button name="update_post" type="submit" class="btn btn-primary">Update</button>
</div>
<input type="hidden" name="post_id" value="<?php echo $id;?>">
</form>
</body>
</html>