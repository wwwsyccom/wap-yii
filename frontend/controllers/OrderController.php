<?php

namespace frontend\controllers;

class OrderController extends \yii\web\Controller
{
    public function actionChosen()
    {
        return $this->render('chosen');
    }

    public function actionCreate()
    {
        return $this->render('create');
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionPayment()
    {
        return $this->render('payment');
    }

    public function actionView()
    {
        return $this->render('view');
    }

}
