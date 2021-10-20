<?php
function getReviews($id = 0)
{
    if ($id != 0) {
        return getAssocResult("SELECT * FROM reviews WHERE id_product = '{$id}' order by id DESC");
    } else {
        return getAssocResult("SELECT * FROM reviews order by id DESC");
    }
}

function addReview($name, $comment)
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

function doApiFeedbackAction($action) {
    if ($action == "add") {
        $data = json_decode(file_get_contents('php://input'));

        $id = addReview($data->name, $data->feedback);
        $response = [
            'id' => $id,
            'name' => $data->name,
            'comment' => $data->feedback,
        ];
        echo json_encode($response, JSON_UNESCAPED_UNICODE);
        die();
    }

    if ($action == "delete") {
        deleteReview($_GET['id']);
        echo json_encode(['response' => 1]);
        die();
    }
}

function doReviewsAction(&$params, $action) {
    $params['name'] = '';
    $params['text'] = '';
    $params['button'] = 'Добавить';
    $params['action'] = 'add';
    $params['id'] = '';

    if ($action == "add") {
        addReview($_POST['name'], $_POST['comment']);
        header("Location: /feedback/?message=OK");
    }

    if ($action == "delete") {
        deleteReview($_GET['id']);

        header("Location: /feedback/?message=delete");
    }

    if ($action == "edit") {
        $id = (int)$_GET['id'];
        $result_feedback = getAssocResult("SELECT * FROM `reviews` WHERE id = '{$id}'");
        $params['name'] = $result_feedback[0]['name'];
        $params['text'] = $result_feedback[0]['comment'];
        $params['action'] = 'save';
        $params['id'] = $id;
        $params['button'] = 'Править';
    }

    if ($action == "save") {
        $id = (int)$_GET['id'];
        
        $name = strip_tags(htmlspecialchars(mysqli_real_escape_string(getDb(),$_POST['name'])));
        $comment = strip_tags(htmlspecialchars(mysqli_real_escape_string(getDb(),$_POST['comment'])));
        executeSql("UPDATE `reviews` SET `name` = '{$name}', `comment` = '{$comment}' WHERE `reviews`.`id` = '{$id}'");
        header("Location: /feedback/?message=edit");
    }

    if ($_GET['message'] == 'OK') $params['message'] = "Отзыв добавлен!";
    if ($_GET['message'] == 'edit') $params['message'] = "Отзыв изменен!";
    if ($_GET['message'] == 'delete') $params['message'] = "Отзыв удален!";
    if ($_GET['message'] == 'edit') $params['message'] = "Отзыв изменен!";
}