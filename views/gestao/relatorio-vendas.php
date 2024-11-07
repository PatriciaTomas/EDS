<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;

$this->title = 'Relatório de Vendas';
$this->params['breadcrumbs'][] = $this->title;
?>

<h1><?= Html::encode($this->title) ?></h1>

<p>
    <?= Html::a('Imprimir Documento', ['imprimir'], ['class' => 'btn btn-primary']) ?>
</p>

<?php $form = ActiveForm::begin([
    'method' => 'get',
    'action' => ['relatorio-vendas'],
]); ?>

<div class="row">
    <div class="col-md-4">
        <?= $form->field($model, 'dataInicio')->textInput(['type' => 'date']) ?>
    </div>
    <div class="col-md-4">
        <?= $form->field($model, 'dataFim')->textInput(['type' => 'date']) ?>
    </div>
</div>

<div class="form-group">
    <?= Html::submitButton('Gerar Relatório', ['class' => 'btn btn-primary']) ?>
</div>

<?php ActiveForm::end(); ?>

<?= $dataProvider ? GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        'id',
        'data',
        'valorTotal',
    ],
]) : 'Nenhum dado encontrado.' ?>

