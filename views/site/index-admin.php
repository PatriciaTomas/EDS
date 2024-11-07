<?php

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Área do Administrador';
?>

<h1><?= Html::encode($this->title) ?></h1>

<div class="body-content">
    <p>Aqui está a área dedicada aos Administradores.</p>

    <div class="row">

        <div class="col-lg-4">
            <h3>Registar Produto</h3>
            <p>Registre um novo produto no sistema.</p>
            <?= Html::a('Registar Produto', ['produto/create'], ['class' => 'btn btn-primary']) ?>
        </div>

        <div class="col-lg-4">
            <h3>Registar Usuário</h3>
            <p>Registre um novo usuário no sistema.</p>
            <?= Html::a('Registar Usuário', ['usuario/create'], ['class' => 'btn btn-primary']) ?>
        </div>

        <div class="col-lg-4">
            <h3>Gerar Relatórios</h3>
            <p>Gere relatórios de vendas, stock e lucros.</p>
            <?= Html::a('Gerar Relatórios', ['gestao/index'], ['class' => 'btn btn-primary']) ?>
        </div>

        <div class="col-lg-4">
            <h3>Procurar Produto</h3>
            <p>Procure um produto da lista de produtos existente.</p>
            <?= Html::a('Procurar Produto', ['produto/index'], ['class' => 'btn btn-primary']) ?>
        </div>

        <div class="col-lg-4">
            <h3>Procurar um Usuário</h3>
            <p>Procure um usuário no sistema.</p>
            <?= Html::a('Procurar Usuário', ['usuario/index'], ['class' => 'btn btn-primary']) ?>
        </div> 
        <div class="col-lg-4">
            <h3>Gestão de Stock</h3>
            <p>Gerencie o stock de produtos.</p>
            <?= Html::a('Gerir Stock', ['stock/index'], ['class' => 'btn btn-primary']) ?>
        </div>
    </div>
</div>