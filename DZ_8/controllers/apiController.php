<?php
function apiController(&$params, $action)
{
    if ($action == 'toggleAdmin') {

        if (is_admin()) {
            if (toggleAdmin($_GET['id']) == 1) {
                $message = "Снять админа";
            } else {
                $message = "Назначить админа";
            };
            echo json_encode(['text' => $message]);
            die();
        }

    }

    if ($action == 'buy') {
        buyProd($_GET['id']);
        echo json_encode(['count' => getBasketCount()]);
        die();
    }
    if ($action == 'delete') {
        deleteFromBasket($_GET['id']);
        echo json_encode(['summ' => getSummBasket(), 'count' => getBasketCount()]);
        die();
    }
}