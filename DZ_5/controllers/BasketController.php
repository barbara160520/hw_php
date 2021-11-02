<?php

namespace app\controllers;

class BasketController extends Controller
{
    public function actionBasket() {
        $basket = [];
		$summ = 0;
        echo $this->render('basket' , [
            'basket' => $basket,
            'summ' => $summ
        ]);
    }
}