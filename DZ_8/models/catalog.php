<?php
function getGoods() {
    return getAssocResult("SELECT * FROM goods");
}

function getOneProduct($id) {
    return getOneResult("SELECT * FROM goods WHERE id = {$id}");
}

function getProdFeedback($id) {
   return getAssocResult("SELECT * FROM reviews WHERE id_product = {$id}");
}

function buyProd($params,$session){
    $params['id'] = '';
    $id = $_GET['id'];
    $params['id'] = $id;
    $login = get_user();
    $users_id =  getOneResult("SELECT id FROM users WHERE login = '{$login}'");
    executeSql("INSERT INTO basket(goods_id, session_id, users_id) VALUES ('{$id}','{$session}','{$users_id['id']}')");
    header("Location: /catalog");
}

function addLikeGood($params) {
    $params['id'] = '';
    $id = $_GET['id'];
    $params['id'] = $id;
    executeSql("UPDATE `goods` SET likes=likes + 1 WHERE id={$id}");
    header("Location: /catalog");
}

function doFromCatalog($params,$action,$session)
{
    switch ($action) {
        case "buy":
            buyProd($params,$session);
        case "like":
            addLikeGood($params);
    }
    
}
