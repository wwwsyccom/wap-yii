<?php

namespace frontend\controllers;

class FoodController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

}
