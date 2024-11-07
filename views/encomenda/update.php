<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Encomenda $model */

$this->title = 'Alterar Encomenda: ' . $model->id_encomenda;
$this->params['breadcrumbs'][] = ['label' => 'Encomendas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_encomenda, 'url' => ['view', 'id_encomenda' => $model->id_encomenda]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="encomenda-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
