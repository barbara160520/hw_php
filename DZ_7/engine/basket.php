<?php
function getBasket($session){    
    return getAssocResult("SELECT basket.id as id,goods_id,session_id,name,price,image FROM basket, goods WHERE basket.goods_id = goods.id AND session_id = '{$session}'");
}

function getBasketCount(){
    $session = session_id();
    $id = (int)$_GET['id'];
    return getAssocResult("SELECT COUNT(id) as count FROM `basket` WHERE `session_id`='{$session}'")[0]['count'];
}

function deleteFromBasket($action,$id,$session) {
    if ($action == 'delete'){   
        executeSql("DELETE FROM basket WHERE id = {$id}");
    }
    return 'success_delete';
}

function getSumm($session){
    return getAssocResult( "SELECT SUM(goods.price) as summ FROM basket, goods WHERE basket.goods_id=goods.id AND session_id = '{$session}'")[0]['summ'];
}