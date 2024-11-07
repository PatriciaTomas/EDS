<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\ItemVenda $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="item-venda-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_venda')->textInput() ?>

    <?= $form->field($model, 'id_produto')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'quantidade')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
