<?php

namespace app\controllers;

use app\interfaces\IRenderer;
use app\models\repositories\{BasketRepository,OrdersRepository,UserRepository};

abstract class Controller
{
    private $action;
    private $defaultAction = 'index';
    public $layout = 'main';
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
        if ($this->useLayout) {
            return $this->renderTemplate('layouts/' . $this->layout, [
                'menu' => $this->renderTemplate('menu', [
                    'isAuth' => (new UserRepository())->isAuth(),
                    'isAdmin' => (new UserRepository())->isAdmin(),
                    'username' => (new UserRepository())->getName(),
                    'count' => (new BasketRepository())->getCountWhere('session_id', session_id()),
                    'cnt_order' => (new OrdersRepository())->getCount()
                    
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

}