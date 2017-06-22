<?php 
    use yii\bootstrap\ActiveForm;
    use \yii\helpers\Html;     
    use yii\helpers\ArrayHelper;    
    use kartik\select2\Select2;
    use yii\widgets\MaskedInput;
    use \yii\jui\DatePicker;
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
    <?= $form->field($model, 'tel')->widget(MaskedInput::className(), [
    'mask' => '999-999-9999']) ?>

    <?= $form->field($model, 'date')->widget(DatePicker::classname(), [
	'language' => 'th',
	'dateFormat' => 'yyyy-MM-dd',
	'options'=>['class'=>'form-control']
    ]) ?>

    <?= $form->field($model, "province_radio")->radioList(
        ArrayHelper::map($provinceList,'PROVINCE_ID','PROVINCE_NAME')
    )?>

    <?= Html::submitButton("save",['class'=>'btn btn-warning'])?>
<?php ActiveForm::end();?>