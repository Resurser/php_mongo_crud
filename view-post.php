<?php
include 'inc/db.class.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $mongo = DB::instantiate();
    $post_collection = $mongo->get_collection('posts');

    $post = $post_collection->findOne(array('_id' => $id));
}
?>

<!DOCTYPE HTML>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>View Post</title>
        <link rel="stylesheet" href="css/styles.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    </head>

    <body class="container">
        <h1><?php echo $post['title']; ?></h1>
        <p class="well"><?php echo $post['content']; ?></p>

        <h3>Comments</h3>
        <?php if(!empty($post['comments'])):?>
        
        <?php foreach ($post['comments'] as $comment):;?>
        <div class="comment-wrapper">
            <div class="comment">
                <div class="comment-header">
                    <span class="name"><?php echo $comment['name'];?>,</span>
                    <span class="date"><?php echo date('Y-m-d H:i:s A',$comment['created_on']->sec);?></span>
                </div>
                <div class="comment-body"><?php echo $comment['comment'];?></div>
            </div>
        </div>
        <?php endforeach;?>
        <?php endif;?>
        


        <div class="panel panel-default">
            <div class="panel-heading">
                <h3>Leave a comment</h3>
            </div>
            <div class="panel-body">
                <form method="post" action="inc/add-comment.php">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" required="required" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" name="email" id="email" required="required" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="comment">Comment</label>
                        <textarea name="comment" id="comment" required class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <button name="add_comment" type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    <input type="hidden" name="post_id" value="<?php echo $id;?>">
                </form>
            </div>
        </div>
    </body>
</html>