<?php
   use yii\bootstrap\ActiveForm;
   use yii\helpers\Url;
   use yii\bootstrap\Html;
?>
<?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, "fname")->textInput();?>
    <?= $form->field($model, "lname")->textInput();?>
    <?= $form->field($model, "gender")->radioList(['1'=>'ชาย','2'=>'หญิง']);?>
    <?= $form->field($model, "tel")->widget(\yii\widgets\MaskedInput::className(), [
            'mask' => '0999999999',
        ]);?>
    <?= $form->field($model, "address")->textInput();?>
    <?= $form->field($model, "image")->textInput();?>
    
    <?= Html::submitButton($model->isNewRecord ? "Create" : "Update", ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
<?php ActiveForm::end();?>
