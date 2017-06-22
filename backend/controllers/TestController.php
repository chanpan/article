<?php

namespace backend\controllers;
use Yii;
use yii\web\Controller;
class TestController extends Controller{
    public function actionIndex(){
        
        $model = new \backend\models\Test();
        $provinceList = \backend\models\Province::find()->all();
        return $this->render("index",[
            "model"=>$model,
            "provinceList"=>$provinceList
        ]);    
        
    }
    
    
}
