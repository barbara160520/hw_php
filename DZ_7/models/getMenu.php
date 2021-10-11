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
            ],
            [
                'name' => 'О нас',
                'href' => "/about",
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
            /*[
                'name' => 'Бугалтеря',
                'href' => "/bux",
            ],
            [
                'name' => 'Калькулятор',
                'href' => '/calc',
            ],*/
            [
                'name' => 'Корзина',
                'href' => '/basket',
            ]
        ]
    ];
}