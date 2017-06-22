<?php 
    use yii\bootstrap\ActiveForm;
    use \yii\helpers\Html;     
    use yii\helpers\ArrayHelper;
?>

<?php $form = ActiveForm::begin();?>
    
    <?= $form->field($model, "province")->dropDownList(
        ArrayHelper::map($provinceList,'PROVINCE_ID','PROVINCE_NAME'),[
            "prompt"=>"เลือกจังหวัด"
        ]
    )?>

    <?= Html::submitButton("save",['class'=>'btn btn-warning'])?>
<?php ActiveForm::end();?>