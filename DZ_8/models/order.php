<?php

function getOrders()
{
    return getAssocResult( "SELECT * FROM orders ORDER BY id");
}

function getOneOrder($id){
    return getOneResult("SELECT * FROM orders WHERE id = {$id}");
}

function allBasket($id){    
    return getAssocResult("SELECT g.name,g.price,g.image FROM orders o JOIN basket b ON b.users_id = o.user_id AND b.session_id = o.session_id JOIN goods g ON g.id = b.goods_id WHERE o.id = {$id}");
}

function summOrder($id){
    return getAssocResult("SELECT SUM(g.price) as summ FROM orders o JOIN basket b ON b.users_id = o.user_id AND b.session_id = o.session_id JOIN goods g ON g.id = b.goods_id WHERE o.id = {$id}")[0]['summ'];
}

function deleteOrders(int $id) {
    executeSql("DELETE FROM orders WHERE id =" . $id);
    header("Location: /admin");
}