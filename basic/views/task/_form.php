<?php

use app\models\TaskStatus;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\jui\DatePicker;

/** @var yii\web\View $this */
/** @var app\models\Task $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="task-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'date')->widget(DatePicker::class, [
    'dateFormat' => 'yyyy-MM-dd',
    'options' => ['class' => 'form-control'],
    // 'value' => date('yyyy-MM-dd', strtotime($model->date)),
]) ?>

    <?= $form->field($model, 'id_status')->dropDownList(
        ArrayHelper::map(TaskStatus::find()->all(), 'id', 'name')
    ) ?>

    <div class="form-group">
        <?= Html::submitButton('Добавить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
