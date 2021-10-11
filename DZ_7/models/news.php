<?php
$db = getDb();

function getNews() {
    return getAssocResult("SELECT id, title FROM news");
}

function getOneNews($id) {
    return getOneResult("SELECT title, text FROM news WHERE id = {$id}");
}

if ($_GET['api'] == 'delete') {
    $id = (int)$_GET['id'];
    mysqli_query($db, "DELETE FROM news WHERE id =" . $id);
    header("Location: /news");
    die();
}