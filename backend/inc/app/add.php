<?php

require_once 'init.php';

if(!empty($_POST)) {
    if(isset($_POST['title'], $_POST['body'], $_POST['keywords'])) {
        $title = $_POST['title'];
        $body = $_POST['body'];
        $keywords = explode(', ', $_POST['keywords']);

        $indexed = $es->index([
            'index' => 'images',
            'type' => 'image',
            'body' => [
                'title' => $title,
                'body' => $body,
                'keywords' => $keywords
            ]
        ]);

        if($indexed) {
            print_r($indexed);
        }
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Add | Elasticsearch</title>
</head>
<body>
<form action="" method="post" autocomplete="off">
    <label>
        Title
        <input type="text" name="title">
    </label>
    <br>
    <label>
        Body
        <textarea name="body" rows="8"></textarea>
    </label>
    <br>
    <label>
        Keywords
        <input type="text" name="keywords" placeholder="Bruk komma for å skille mellom nøkkelordene"
    </label>
    <input type="submit" value="Legg til">
</form>
</body>
</html>