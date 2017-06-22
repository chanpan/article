<?php

namespace backend\controllers;
use Yii;
use yii\web\Controller;
use backend\models\UserProfile;
use yii\data\ActiveDataProvider;
class UserProfileController extends Controller{
   
    public function actionUser(){
       $user = \common\models\User::find()->all();
       return \yii\helpers\Json::encode($user);
    }

    public function actionIndex(){
     $model = UserProfile::find();
     $dataProvider = new ActiveDataProvider([
        'query' => $model,
     ]);
     return $this->render("index",[
         'dataProvider'=>$dataProvider
     ]);
   }
   
   public function actionCreate(){
    $model = new UserProfile();
    if($model->load(Yii::$app->request->post())){
        $user_id = \Yii::$app->user->identity->id;
        $model->user_id = $user_id;
        if($model->save()){
            $this->goHome();
        }
    }
    return $this->render("create",[
         'model'=>$model
    ]);
   }
   
   public function actionUpdate($id){
       $model = UserProfile::findOne($id);
       if($model->load(Yii::$app->request->post())){
           if($model->save()){
             $this->goHome();
           }
       }
       return $this->renderAjax("update",[
           "model"=>$model
       ]);
   }
   
   public function actionDelete($id){
       $delete = UserProfile::findOne($id)->delete();
       if($delete){
           $this->goHome();
       }
   }
   
   public function goHome(){
       return $this->redirect(['index']);
   }
}
