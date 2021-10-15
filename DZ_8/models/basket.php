<?php
function getBasket($session){    
    return getAssocResult("SELECT basket.id as id,goods_id,session_id,name,price,image FROM basket, goods WHERE basket.goods_id = goods.id AND session_id = '{$session}'");
}

function getBasketCount(){
    $session = session_id();
    $id = (int)$_GET['id'];
    return getAssocResult("SELECT COUNT(id) as count FROM `basket` WHERE `session_id`='{$session}'")[0]['count'];
}

function deleteFromBasket($params,$session) {
    $params['id'] = '';
    $id = $_GET['id'];
    $params['id'] = $id;
    executeSql("DELETE FROM basket WHERE id = {$id}");
    header("Location: /basket");
}

function getSumm($session){
    return getAssocResult( "SELECT SUM(goods.price) as summ FROM basket, goods WHERE basket.goods_id=goods.id AND session_id = '{$session}'")[0]['summ'];
}

function addOrders($params,$session){
    $login = get_user();
    $users_id =  getOneResult("SELECT id FROM users WHERE login = '{$login}'");
    $name = strip_tags(htmlspecialchars(mysqli_real_escape_string(getDb(),$_POST['name'])));
    $phone = strip_tags(htmlspecialchars(mysqli_real_escape_string(getDb(),$_POST['phone'])));
    executeSql("INSERT INTO orders(name, phone, session_id, user_id) VALUES ('{$name}', '{$phone}', '{$session}', '{$users_id['id']}')");
    header("Location: /basket");
}

function doFromBasket($params,$action,$session)
{
    switch ($action) {
        case "order":
            addOrders($params,$session);
            $params['message'] = "Заказ оформлен!";
        case "delete":
            deleteFromBasket($params,$session);
            $params['message'] = "Товар удален!";
    }
    
}