<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Add Post</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
</head>

<body class="container">
<h1 align="center">Add New Post</h1>
<form method="post" action="inc/add-post.php">
<div class="form-group">
    <label for="title">Title</label>
    <input type="text" name="title" id="title" required="required" class="form-control">
</div>
<div class="form-group">
    <label for="content">Content</label>
    <textarea name="content" id="content" required="required" class="form-control" cols="80" rows="15"></textarea>
</div>
<div class="form-group">
    <button name="add_post" type="submit" class="btn btn-primary">Add</button>
</div>

</form>
</body>
</html>