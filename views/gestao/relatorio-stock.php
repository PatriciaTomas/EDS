<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\db\Query;
use yii\data\ActiveDataProvider;
use yii\widgets\ActiveForm;

$this->title = 'Relatório de Stock';
$this->params['breadcrumbs'][] = $this->title;
?>

<h1><?= Html::encode($this->title) ?></h1>
<?php
// Create a query object using yii\db\Query or its subclasses
$query = (new Query())
    ->select(['codigo', 'nome', 'quantidade_disponivel'])
    ->from('produto');

// Create an instance of ActiveDataProvider and assign the query object to the "query" property
$dataProvider = new ActiveDataProvider([
    'query' => $query,
]);

// Pass the $dataProvider to the GridView widget or any other component that uses it
echo GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        'codigo',
        'nome',
        'quantidade_disponivel',
    ],
]);

$form = ActiveForm::begin(); ?>

<!-- Defina os campos do formulário de pesquisa de estoque -->
<?= $form->field($model, 'nome')->textInput() ?>
<?= $form->field($model, 'estado')->textInput() ?>

<!-- Adicione um botão para enviar o formulário -->
<div class="form-group">
    <?= Html::submitButton('Buscar', ['class' => 'btn btn-primary']) ?>
</div>

<?php ActiveForm::end(); ?>

<!-- Exiba o resultado do relatório de estoque -->
<?= GridView::widget([
    'dataProvider' => new \yii\data\ArrayDataProvider([
        'allModels' => $dataProvider->getModels(), // Retrieve the array of models
    ]),
    'columns' => [
        'codigo',
        'nome',
        // other columns
    ],
]) ?>

