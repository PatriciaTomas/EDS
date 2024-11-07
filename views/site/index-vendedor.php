<?php

use yii\helpers\Html;
use yii\helpers\Url;
use app\search\ProdutoSearch;
use app\search\EncomendaSearch;

$this->title = 'Área do Vendedor';
?>

<h1><?= Html::encode($this->title) ?></h1>

<div class="body-content">

    <p>Aqui está a área dedicada aos vendedores.</p>

    <div class="row">
       
        <div class="col-lg-4">
            <h3>Registar Encomenda</h3>
            <p>Registre uma nova encomenda para os clientes.</p>
            <?= Html::a('Registar Encomenda', ['encomenda/create'], ['class' => 'btn btn-primary']) ?>
        </div>

        <div class="col-lg-4">
            <h3>Registar Venda</h3>
            <p>Registre uma venda realizada aos clientes.</p>
            <?= Html::a('Registar Venda', ['venda/create'], ['class' => 'btn btn-primary']) ?>
        </div>

        <div class="col-lg-4">
            <h3>Procurar Produtos</h3>
            <p>Procure os produtos da loja.</p>
            <a href="<?= Yii::$app->urlManager->createUrl(['produto/index']) ?>" class="btn btn-primary">Procurar Produtos</a>
        </div>
        <div class="col-lg-4">
            <h3>Produrar encomendas</h3>
            <p>Procure por encomendas aqui.</p>
            <a href="<?= Yii::$app->urlManager->createUrl(['encomenda/index']) ?>" class="btn btn-primary">Procurar Encomendas</a>
        </div>

