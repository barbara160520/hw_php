<?php
/*$db = getDb();
$id = (int)$_GET['id'];*/


function getImages() {
    return getAssocResult("SELECT id, name, likes FROM images ORDER BY likes DESC ");
}

function getOneImage(int $id) {
    return getOneResult("SELECT  name, likes FROM images WHERE id = {$id}");
}

if(isset($_POST['load'])){
    include 'upload.php';
}

function addLikes(int $id){
    executeSql("UPDATE images SET likes = likes + 1 WHERE id = {$id}");
}