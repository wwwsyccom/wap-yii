<?php

namespace frontend\controllers;

class IndexController extends \yii\web\Controller
{
	public $layout = false;
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionView()
    {
        return $this->render('view');
    }

}
