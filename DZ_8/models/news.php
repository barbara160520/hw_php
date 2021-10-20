<?php

function getNews() {
    return getAssocResult("SELECT * FROM news");
}

function getOneNews($id) {
    return getOneResult("SELECT * FROM news WHERE id = {$id}");
}

if ($_GET['api'] == 'delete') {
    $id = (int)$_GET['id'];
    executeSql("DELETE FROM news WHERE id =" . $id);
    header("Location: /news");
    die();
}

if ($_GET['api'] == 'likes'){
    $id = (int)$_GET['id'];
    executeSql("UPDATE news SET likes = likes + 1 WHERE id = {$id}");
    header('Location: /news');
}