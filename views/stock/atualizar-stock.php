<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Atualizar Stock: ' . $produto->nome;
$this->params['breadcrumbs'][] = ['label' => 'Gestão de Stock', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $produto->nome, 'url' => ['view', 'codigo' => $produto->codigo]];
$this->params['breadcrumbs'][] = 'Atualizar Stock';
?>

<h1><?= Html::encode($this->title) ?></h1>

<div class="produto-atualizar-stock-form">
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'codigo')->hiddenInput(['value' => $produto->codigo])->label(false) ?>
    
    <?= $form->field($model, 'quantidade')->textInput(['type' => 'number']) ?>

    <div class="form-group">
        <?= Html::submitButton('Atualizar', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
