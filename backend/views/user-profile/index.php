<?php 
    use yii\bootstrap\Html;
    $this->title="User Profile";
?>
<?= Html::a('<i class="glyphicon glyphicon-plus"></i> Create',['create'],[
     'class'=>"btn btn-success"
])?>
<hr>

<?php 
    echo \yii\grid\GridView::widget([
       'dataProvider' => $dataProvider,
       'columns'=>[
         'fname',
         'lname',
         [
             'attribute'=>'gender',
             'value'=>function($model){
                $gender= "หญิง";
                if($model->gender == 1){
                   $gender="ชาย";
                }
                return $gender;
             }
         ]
           
       ]
    ]);
?>