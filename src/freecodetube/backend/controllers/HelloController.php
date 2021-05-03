<?php


namespace backend\controllers;


use yii\web\Controller;

class HelloController extends Controller
{
    public function actionIndex(){
        return "Hello World";
    }

    public function actionIndexView(){
        return $this->render("index-view");
    }
}