<?php

use yii\helpers\Html;

$this->title = 'Gestão de Relatórios';
$this->params['breadcrumbs'][] = $this->title;
?>

<h1><?= Html::encode($this->title) ?></h1>

<div class="row">
    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2 class="panel-title">Relatório de Vendas</h2>
            </div>
            <div class="panel-body">
                <?= Html::a('Aceder', ['relatorio-vendas'], ['class' => 'btn btn-primary']) ?>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2 class="panel-title">Relatório de Stock</h2>
            </div>
            <div class="panel-body">
                <?= Html::a('Aceder', ['relatorio-stock'], ['class' => 'btn btn-primary']) ?>
            </div>
        </div>
    </div>
</div>
