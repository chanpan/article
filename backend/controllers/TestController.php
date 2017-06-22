<?php

namespace backend\controllers;
use Yii;
use yii\web\Controller;
use yii\web\UploadedFile;
class TestController extends Controller{
    public function actionIndex(){
        $model = new \backend\models\Test();
        $file_old = $model->file;
        
        if ($model->load(Yii::$app->request->post())) {
            $model->file = UploadedFile::getInstance($model, 'file');
            if ($model->file !== null) {
                $nameArr = explode('/', $model->file->type);
                $lname = $nameArr[1];
            }
            $newFileName = 'test_' . rand('9999', '999999'). '.' . $lname;
            $fullPath = \Yii::getAlias('@frontend') . '/web/image/' . $newFileName;
            $model->file->saveAs($fullPath);
            \yii\helpers\VarDumper::dump($fullPath, 10, true);exit();
        }
        
        
        $provinceList = \backend\models\Province::find()->all();
        return $this->render("index",[
            "model"=>$model,
            "provinceList"=>$provinceList
        ]);    
        
    }
    
    
}
