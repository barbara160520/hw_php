<?php
function getReviews($id = 0)
{
    if ($id != 0) {
        return getAssocResult("SELECT * FROM reviews WHERE id_product = '{$id}' order by id DESC");
    } else {
        return getAssocResult("SELECT * FROM reviews order by id DESC");
    }
}

function addReview($id)
{
    $name = strip_tags(htmlspecialchars(mysqli_real_escape_string(getDb(), $_POST['name'])));
    $comment = strip_tags(htmlspecialchars(mysqli_real_escape_string(getDb(), $_POST['comment'])));
    if ($id == 0) {
        executeSql("INSERT INTO reviews(name, comment, id_product) values('{$name}', '{$comment}', null)");
    } else {
        executeSql("INSERT INTO reviews(name, comment, id_product) values('{$name}', '{$comment}', '{$id}')");
    }
}

function deleteReview($id)
{
    executeSql("DELETE FROM reviews where id='{$id}'");
}

function editReview($id)
{
    return getOneResult("SELECT * FROM reviews WHERE id = {$id}");
}

function saveReview($id)
{
    $name = strip_tags(htmlspecialchars(mysqli_real_escape_string(getDb(), $_POST['name'])));
    $comment = strip_tags(htmlspecialchars(mysqli_real_escape_string(getDb(), $_POST['comment'])));
    executeSql("UPDATE reviews SET name='{$name}', comment='{$comment}' WHERE id = {$id}");
}

function doReviewsAction($action, $id)
{
    switch ($action) {
        case "add":
            addReview($id);
            return "success_add";
        case "edit":
            return editReview($id);
        case "save":
            saveReview($id);
            return "success_edit";
        case "delete":
            deleteReview($id);
            return "success_delete";
    }
}