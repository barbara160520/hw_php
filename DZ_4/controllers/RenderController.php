<?php

namespace app\controllers;

class RenderController
{
    private $action;
    private $defaultAction = 'index';
    private $layout = 'main';
    private $useLayout = true;

    public function runAction($action)
    {
        $this->action = $action ?? $this->defaultAction;
        $method = "action" . ucfirst($this->action);
        if (method_exists($this, $method)) {
            $this->$method();
        }
    }

    public function actionIndex()
    {
        echo $this->render('index');
    }

    public function render($template, $params = [])
    {
        //$params = ['menu' => getMenu()['menu']];
        if ($this->useLayout) {
            return $this->renderTemplate('layouts/' . $this->layout, [
                'menu' => $this->renderTemplate('menu'),
                'content' => $this->renderTemplate($template, $params)
            ]);

        } else {
            return $this->renderTemplate($template, $params);
        }
    }

    public function renderTemplate($template, $params = [])
    {
        ob_start();
        extract($params);
        $templatePath = VIEWS_DIR . $template . ".php";
        include $templatePath;
        return ob_get_clean();
    }

}

/*  function getMenu(){
    return [
    'menu' => [
        [
            'name' => 'Главная',
            'href' => "/"
        ],
        [
            'name' => 'Каталог',
            'href' => "/?c=product&a=catalog"
        ],
        [
            'name' => 'Галерея',
            'href' => "/",
        ],
        [
            'name' => 'Новости',
            'href' => "/",
        ],
        [
            'name' => 'Отзывы',
            'href' => '/',
        ],
        [
            'name' => 'Корзина',
            'href' => '/?c=basket&a=basket',
        ],
        [
            'name' => 'Пользователи',
            'href' => '/',
        ]
        ]
    ];
}*/