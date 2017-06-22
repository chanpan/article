<?php 
    use yii\bootstrap\ActiveForm;
    use \yii\helpers\Html;     
    use yii\helpers\ArrayHelper;
    
    use kartik\select2\Select2;
?>

<?php $form = ActiveForm::begin();?>
    
    <?= $form->field($model, "province")->dropDownList(
        ArrayHelper::map($provinceList,'PROVINCE_ID','PROVINCE_NAME'),[
            "prompt"=>"เลือกจังหวัด"
        ]
    )?>
    <?= $form->field($model, 'province_2')->widget(Select2::classname(), [
        'data' => ArrayHelper::map($provinceList,'PROVINCE_ID','PROVINCE_NAME'),
        'language' => 'th',
        'options' => ['placeholder' => 'Select a state ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);?>

    <?= Html::submitButton("save",['class'=>'btn btn-warning'])?>
<?php ActiveForm::end();?>