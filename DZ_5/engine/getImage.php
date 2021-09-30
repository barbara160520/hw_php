<?php

function getImages() {
    return getAssocResult("SELECT id, path_small, name, likes FROM images ORDER BY likes DESC ");
}

function getOneImage($id) {
    return getOneResult("SELECT  path_big, name, likes FROM images WHERE id = {$id}");
}