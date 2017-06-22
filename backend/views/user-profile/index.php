<?php

use yii\bootstrap\Html;
use yii\bootstrap\Alert;
use yii\bootstrap\Modal;
$this->title = "User Profile";
?>
<?=
Html::a('<i class="glyphicon glyphicon-plus"></i> แก้ไข โปรไฟล์', '#', [
    'class' => "btn btn-success",
    'id' => 'btn-create'
])
?>
<hr>

<?php
echo \yii\grid\GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        'fname',
        'lname',
        [
            'attribute' => 'gender',
            'value' => function($model) {
                $gender = "หญิง";
                if ($model->gender == 1) {
                    $gender = "ชาย";
                }
                return $gender;
            }
        ],
        [
            'contentOptions'=>['width'=>'100'],
            'class' => 'yii\grid\ActionColumn',
            'template' => '{update} {delete}',
            'buttons' => [
                'update' => function ($url, $model) {
                    return Html::a('<i class="glyphicon glyphicon-pencil"></i> Update ', $url, [
                                'title' => "แก้ไข",
                                'class' => 'btn btn-warning btn-sm',
                    ]);
                },
                'delete' => function ($url, $model) {
                    return Html::a('<i class="glyphicon glyphicon-trash"></i> ลบ ', $url, [
                                'title' => "ลบ",
                                'class' => 'btn btn-danger btn-sm',
                                'data-confirm' => 'ยืนยัน',
                    ]);
                }
            ],
        ]
    ]
]);
?>
<?php 
    Modal::begin([
        'id'=>'modal-profile'
    ]);
    Modal::end();
?>
<?php 
$this->registerJS("
   $('#btn-create').on('click',function(e){
        
        $.ajax({
            url:'".yii\helpers\Url::to(['update','id'=>Yii::$app->user-id])."',
            success:function(data){
                $('#modal-profile').modal('show');
                $('#modal-profile .modal-body').html(data);
            }
        });
        
   });
");
?>