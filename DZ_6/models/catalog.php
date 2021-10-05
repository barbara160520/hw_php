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

function getCatalog() {
    return getAssocResult("SELECT id, name,price,image FROM catalog");
}

function getOneProduct($id) {
    return getOneResult("SELECT name,price,image FROM catalog WHERE id = {$id}");
}

function getProdFeedback($id) {
    return getAssocResult("SELECT * FROM feedback WHERE prod_id = {$id}");
}