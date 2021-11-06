<?php

namespace app\controllers;

use app\interfaces\IRenderer;
use app\models\Basket;
use app\models\Users;

class Controller
{
    private $action;
    private $defaultAction = 'index';
    private $layout = 'main';
    private $useLayout = true;

    protected $render;

    public function __construct(IRenderer $render)
    {
        $this->render = $render;
    }


    public function runAction($action)
    {
        $this->action = $action ?? $this->defaultAction;
        $method = "action" . ucfirst($this->action);
        if (method_exists($this, $method)) {
            $this->$method();
        }
    }

    public function render($template, $params = [])
    {
        //$menu = Controller::getMenu(['menu']);
        
        if ($this->useLayout) {
            
            return $this->renderTemplate('layouts/' . $this->layout, [
                'menu' => $this->renderTemplate( 'menu', [
                    'isAuth' => Users::isAuth(),
                    'isAdmin' => Users::isAdmin(),
                    'username' => Users::getName(),
                    'count' => Basket::getCountWhere('session_id', session_id())
                ]),
                'content' => $this->renderTemplate($template, $params),

            ]);
        } else {
            return $this->renderTemplate($template, $params);
        }


    }

    public function renderTemplate($template, $params = [])
    {
        return $this->render->renderTemplate($template, $params);
    }

    /*public static function getMenu(){
        return [
        'menu' => [
            [
                'name' => 'Главная',
                'href' => "/"
            ],
            [
                'name' => 'Каталог',
                'href' => "/product/catalog"
            ],
            [
                'name' => 'Галерея',
                'href' => "/gallery",
            ],
            [
                'name' => 'Новости',
                'href' => "/news/news",
            ],
            [
                'name' => 'Отзывы',
                'href' => '/feedback/feedback',
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
    }*/
}