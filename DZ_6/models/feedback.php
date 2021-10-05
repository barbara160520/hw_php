<?php

function getAllFeedback() {
    return getAssocResult("SELECT * FROM feedback ORDER BY id DESC");
}

$row = '';

if ($_GET['api'] == 'add') {
    $name = strip_tags(htmlspecialchars(mysqli_real_escape_string(getDb(), $_POST['name'])));
    $feedback = strip_tags(htmlspecialchars(mysqli_real_escape_string(getDb(), $_POST['feedback'])));
    executeSql("INSERT INTO feedback(name, feedback) VALUES ('{$name}','{$feedback}')");

    header('Location: /feedback');
    die();

}

if ($_GET['api'] == 'delete') {
    $id = (int)$_GET['id'];
    executeSql( "DELETE FROM feedback WHERE id =" . $id);

    header('Location: /feedback');
    die();
}
if ($_GET['api'] == 'edit') {
    $id = (int)$_GET['id'];
    $result = mysqli_query(getDb(), "SELECT * FROM feedback WHERE id = {$id}");
    if ($result) $row = mysqli_fetch_assoc($result);
    $buttonText = "Править";
    $api = "save";

}

if ($_GET['api'] == 'save') {
    $id = (int)$_POST['id'];
    $name = strip_tags(htmlspecialchars(mysqli_real_escape_string(getDb(), $_POST['name'])));
    $feedback = strip_tags(htmlspecialchars(mysqli_real_escape_string(getDb(), $_POST['feedback'])));
    executeSql("UPDATE feedback SET name='{$name}', feedback='{$feedback}' WHERE id = {$id}");

    header('Location: /feedback');
    die();
}

/*function addFeedBack() {
    $name = strip_tags(htmlspecialchars(mysqli_real_escape_string(getDb(), $_POST['name'])));
    $feedback = strip_tags(htmlspecialchars(mysqli_real_escape_string(getDb(), $_POST['feedback'])));
    executeSql("INSERT INTO feedback(name, feedback) VALUES ('{$name}','{$feedback}')");
}

function deleteFeedBack($id) {
    executeSql( "DELETE FROM feedback WHERE id =" . $id);
}

function editFeedBack($id);{
    $result = mysqli_query(getDb(), "SELECT * FROM feedback WHERE id = {$id}");
    if ($result) $row = mysqli_fetch_assoc($result);
    $buttonText = "Править";
    $api = "save";
}

function saveFeedBack($id){
    $name = strip_tags(htmlspecialchars(mysqli_real_escape_string(getDb(), $_POST['name'])));
    $feedback = strip_tags(htmlspecialchars(mysqli_real_escape_string(getDb(), $_POST['feedback'])));
    executeSql("UPDATE feedback SET name='{$name}', feedback='{$feedback}' WHERE id = {$id}");
}*/



/*function doFeebackAction($api) {
$id = (int)$_POST['id'];

    if ($api == "add") {
        addFeedBack();
        header('Location: /feedback');
        die();
    }
    if ($api == "edit") {
        editFeedBack($id);
    }
    if ($api == "delete") {
        deleteFeedBack($id);
        header('Location: /feedback');
        die();
    }
    if ($api == "save") {
        saveFeedBack($id);
        header('Location: /feedback');
        die();
    }
}*/


