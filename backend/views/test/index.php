<?php 
    use yii\bootstrap\ActiveForm;
    use \yii\helpers\Html;     
    use yii\helpers\ArrayHelper;    
    use kartik\select2\Select2;
    use yii\widgets\MaskedInput;
    use \yii\jui\DatePicker;
?>

<?php $form = ActiveForm::begin([
    'options'=>['enctype'=>'multipart/form-data']
]);?>
    
<?php echo $form->field($model, 'province_txt', [
    'inputTemplate' => '<div class="input-group"><span class="input-group-addon">@</span>{input}</div>',
]);
?>
<?php echo $form->field($model, 'province_txtarea')->textarea();
?>
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
   <?= $form->field($model, 'province_select2_multiple')->widget(Select2::className(), [
        //'initValueText' => $model1->assign, // set the initial display text
        'data' => ArrayHelper::map($provinceList,'PROVINCE_ID','PROVINCE_NAME'),
        'options' => ['placeholder' => 'กรุณาเลือกผู้ใช้ฟอร์มนี้...', 'multiple' => true, 'id'=>'assign-select',],
        'pluginOptions' => [
            'allowClear' => true,
            'tags' => true,
            'tokenSeparators' => [',', ' '],
        ]
    ])
?>
    <?= $form->field($model, 'tel')->widget(MaskedInput::className(), [
    'mask' => '999-999-9999']) ?>

    <?= $form->field($model, 'date')->widget(DatePicker::classname(), [
	'language' => 'th',
	'dateFormat' => 'yyyy-MM-dd',
	'options'=>['class'=>'form-control']
    ]) ?>
    <?= $form->field($model, 'province_checkbox')->checkboxList(
            ArrayHelper::map($provinceList,'PROVINCE_ID','PROVINCE_NAME')
    ) ?>

    <?= $form->field($model, "province_radio")->radioList(
        ArrayHelper::map($provinceList,'PROVINCE_ID','PROVINCE_NAME')
    )?>
    
    <?= $form->field($model, 'file')->fileInput()?>

    <?= Html::submitButton("save",['class'=>'btn btn-warning'])?>
<?php ActiveForm::end();?>