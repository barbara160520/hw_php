<?php
/*$db = getDb();
$id = (int)$_GET['id'];*/

function addLikes(int $id){
    executeSql("UPDATE images SET likes = likes + 1 WHERE id = {$id}");
}

function getImages() {
    $message = "";
    $result = getAssocResult("SELECT id, name, likes FROM images ORDER BY likes DESC ");
    if ($result->num_rows != 0) $filename = mysqli_fetch_assoc($result);
    else $message = "Not image";
     
    return $result;
}

function getOneImage(int $id) {
    return getOneResult("SELECT  name, likes FROM images WHERE id = {$id}");
}

if(isset($_POST['load'])){
    include 'upload.php';
}

