<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Contact;
use yii\helpers\ArrayHelper;
use yii\jui\DatePicker;

/** @var yii\web\View $this */
/** @var app\models\Meeting $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="meeting-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'date')->widget(DatePicker::class, [
    'dateFormat' => 'yyyy-MM-dd',
    'options' => ['class' => 'form-control'],
    // 'value' => date('yyyy-MM-dd', strtotime($model->date)),
]) ?>

<?= $form->field($model, 'id_contact')->dropDownList(
        ArrayHelper::map(Contact::find()->all(), 'id', 'fio')
    ) ?>

    <div class="form-group">
        <?= Html::submitButton('Ага', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
