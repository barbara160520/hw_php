<?php
function getMenu(){
        return [
        'menu' => [
            [
                'name' => 'Главная',
                'href' => "/"
            ],
            [
                'name' => 'Каталог',
                'href' => "/catalog"
            ],
          /*[
                'name' => 'Каталог spa',
                'href' => "/catalogspa"
            ],*/
            [
                'name' => 'Галерея',
                'href' => "/gallery",
            ],
            [
                'name' => 'Новости',
                'href' => "/news",
            ],
            [
                'name' => 'Отзывы',
                'href' => '/feedback',
            ],
            [
                'name' => 'Корзина',
                'href' => '/basket',
            ],
            [
                'name' => 'Заказы',
                'href' => '/admin',
            ],
            [
                'name' => 'Пользователи',
                'href' => '/users',
            ]
        ]
    ];
}