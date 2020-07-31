<?php
declare(strict_types=1);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>GuestBook</title>
</head>
<body>
<?php

require 'Post.php';
require 'PostLoader.php';
require_once "form.php";

$postloader = new PostLoader('database.txt');
if(!empty($_POST['author']) &&  !empty($_POST['title']) && !empty($_POST['content'])){
    $post = new Post($_POST['author'], $_POST['title'], $_POST['content']);

    $postloader->addPost($post);
    $newStringToAddToDB = $postloader->convertToString($postloader->getPosts());
    file_put_contents('database.txt', $newStringToAddToDB);
}

$postArr = array_reverse($postloader->getPosts());
foreach ($postArr as $item){
    echo "<h2>{$item->getTitle()}</h2> by <h3>{$item->getAuthor()}</h3>";
    echo "<br><hr><br>";
    echo $item->getContent();
}

//image this code could be a complex query
/*$users = ['John Doe', 'Joe Doe', 'John Smith', 'An Onymous', 'lol'];
$articles = ['Terror over london', 'Football: a useless hobby?', 'Economic crisis ahead, says expert', 'Fortis is Fortwas'];*/
//end controller
//start view
?>
</body>
</html>