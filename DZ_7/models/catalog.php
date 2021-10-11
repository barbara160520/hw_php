<?php
/*function getCatalog()
{
    return [
        'catalog' => [
            [
                'name' => 'Пицца',
                'price' => 24,
                'image' => 'pizza.jpeg'
            ],
            [
                'name' => 'Чай',
                'price' => 1,
                'image' => 'tea.png'
            ],
            [
                'name' => 'Яблоко',
                'price' => 12,
                'image' => 'apple.jpg'
            ],
        ]
    ];

}*/

function getGoods() {
    return getAssocResult("SELECT id, name,price,image FROM goods");
}

function getOneProduct($id) {
    return getOneResult("SELECT * FROM goods WHERE id = {$id}");
}

function getProdFeedback($id) {
   return getAssocResult("SELECT * FROM reviews WHERE id_product = {$id}");
}

function buyProd($id,$session){
    executeSql("INSERT INTO `basket`(`goods_id`, `session_id`) VALUES ({$id},'{$session}')");
}

function doFromBasket($action, $id,$session)
{
    switch ($action) {
        case "buy":
            buyProd($id,$session);
            return "success_buy";
    }
}