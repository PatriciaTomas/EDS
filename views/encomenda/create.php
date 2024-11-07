<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Encomenda $model */

$this->title = 'Criar Encomenda';
$this->params['breadcrumbs'][] = ['label' => 'Encomendas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="encomenda-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'produtos' => $produtos,
        'dataProvider' => $dataProvider,
        'index' => $index
    ]) ?>


</div>
