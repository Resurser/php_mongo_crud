<?php
include 'inc/db.class.php';
$collection = 'posts';
$cursor = DB::connect()->allDocument($collection);
//$mongo = DB::instantiate();
//$post_collection = $mongo->get_collection('posts');

//Get all posts
//$cursor = $post_collection->find();

//cursor can be converted to an associative array
//$post_array = iterator_to_array($cursor);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>Dashboard</title>
        <link rel="stylesheet" href="css/styles.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    </head>

    <body class="container">
        <h1 align="center">Blog Dashboard</h1>
        <p><a href="add-post.php" class="btn btn-primary">New Post</a></p>

        <table class="table table-bordered table-striped">
            <?php foreach($cursor as $post):?>
                <tr>
                    <td>
                        <?php echo $post['title'];?>
                        <br/>
                        <small><?php echo $post['content'] ?></small>
                    </td>
                    <td>Comment: <?php if(isset($post['comments'])){ echo count($post['comments']);}else{echo 0;}?></td>
                    <td><a href="view-post.php?id=<?php echo $post['_id'];?>">View</a></td>
                    <td><a href="edit-post.php?id=<?php echo $post['_id'];?>">Edit</a></td>
                    <td><a href="inc/delete-post.php?id=<?php echo $post['_id'];?>">Delete</a></td>
                </tr>

            <?php endforeach; ?>
        </table>
    </body>
</html>
