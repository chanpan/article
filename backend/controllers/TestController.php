<?php

namespace backend\controllers;
use Yii;
use yii\web\Controller;
class TestController extends Controller{
    public function actionIndex(){
        return $this->render("index");
    }
    
    public function actionCal(){
        $num1 = 10;
        $num2 = 20;
        $sum = $num1+$num2;
        return $this->render("cal",[
            'sum'=>$sum
        ]);
    }
}
