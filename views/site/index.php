<?php
use yii\helpers\Html;
/** @var yii\web\View $this */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent mt-5 mb-5">
        <h1 class="display-4">Coorporativa de Venda e Produção Horticolas</h1>

        <p class="lead">Esta página refere-se à criaçao de uma aplicação para uma corporativa de produção e venda de horticolas</p>
    </div>

    <div class="body-content">
        <p class="lead"> Escolha um tipo de usuário:</p>
        <div class="row">
       
        <div class="col-lg-4">
            <h2>Produtor</h2>
            <p>Descrição do índice do produtor.</p>
            <?php
                if (Yii::$app->user->identity->tipo === 'produtor') 
                {
                    echo Html::a('Aceder', ['site/index-produtor'], ['class' => 'btn btn-primary']);
                }

            ?>
        </div>
        <div class="col-lg-4">
            <h2>Vendedor</h2>
            <p>Descrição do índice do vendedor.</p>
            <?php
                if (Yii::$app->user->identity->tipo === 'vendedor') 
                {
                    echo Html::a('Aceder', ['site/index-vendedor'], ['class' => 'btn btn-primary']);
                }

            ?>
        </div>
        <div class="col-lg-4">
            <h2>Administrador</h2>
            <p>Descrição do índice do administrador.</p>
            <?php
                if (Yii::$app->user->identity->tipo === 'administrador') 
                {
                    echo Html::a('Aceder', ['site/index-administrador'], ['class' => 'btn btn-primary']);
                }

            ?>
        </div>

    </div>
</div>
