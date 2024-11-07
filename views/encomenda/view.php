<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Encomenda $model */

$this->title = $model->id_encomenda;
$this->params['breadcrumbs'][] = ['label' => 'Encomendas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="encomenda-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Alterar', ['update', 'id_encomenda' => $model->id_encomenda], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Apagar', ['delete', 'id_encomenda' => $model->id_encomenda], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Tem a certeza que deseja apagar?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_encomenda',
            'id_cliente',
            'data_entrega',
            'estado',
        ],
    ]) ?>

</div>
