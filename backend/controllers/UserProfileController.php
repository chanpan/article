<?php

namespace backend\controllers;
use Yii;
use yii\web\Controller;
use backend\models\UserProfile;
class UserProfileController extends Controller{
    
   public function actionIndex(){
     $model = UserProfile::find()->all();
     return $this->render("index",[
         'model'=>$model
     ]);
   }
   
   public function actionCreate(){
    $model = new UserProfile();
    if($model->load(Yii::$app->request->post())){
        $user_id = \Yii::$app->user->identity->id;
        $model->user_id = $user_id;
        if($model->save()){
            return $this->redirect(["index"]);
        }
        
    }
    
    return $this->render("create",[
         'model'=>$model
    ]);
   }
   
}
