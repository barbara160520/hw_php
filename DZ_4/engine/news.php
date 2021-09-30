<?php

function getNews() {
    return getAssocResult("SELECT id, title, likes FROM news");
}

function getOneNews($id) {
    return getOneResult("SELECT title, text, likes FROM news WHERE id = {$id}");
}