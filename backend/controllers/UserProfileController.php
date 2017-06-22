<?php

namespace backend\controllers;
use Yii;
use yii\web\Controller;
use backend\models\UserProfile;
use yii\data\ActiveDataProvider;
class UserProfileController extends Controller{
   
    public function actionUser(){
       $id = \Yii::$app->request->post('id','');
       // id = '' 
       $user = \common\models\User::find()->where(['id'=>$id])->all();
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
        /* query 
        \Yii::$app->db->createCommand("insert into user_profile(fname) values(:fname)",[
            ':fname'=>"nuttaphon"
        ])->execute();
        \Yii::$app->db->createCommand("update user_profile set fname=:fname where id=:id",[
            ':fname'=>"nuttaphon",
            ":id"=>1
        ])->execute();
        \Yii::$app->db->createCommand("select * from user_profile where id=:id",[
            ':id'=>1
        ])->queryAll();
        \Yii::$app->db->createCommand("select * from user_profile where id=:id",[
            ':id'=>1
        ])->queryOne();
         \Yii::$app->db->createCommand("select * from user_profile where id=:id",[
            ':id'=>1
        ])->queryScalar();
        */ 
         
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
