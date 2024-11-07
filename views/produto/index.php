<?php

use app\models\Produto;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\search\ProdutoSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Produtos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="produto-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p> 
        <?php 
        /** @var User $user */
        $user = Yii::$app->user;
        
        // Verificar o tipo de usuário atual
        if ($user->identity->tipo === 'administrador') {
            // Renderizar o botão apenas se o usuário for um produtor
            echo Html::a('Criar produto', ['produto/create'], ['class' => 'btn btn-success']);
        }?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'codigo',
            'nome',
            'preco',
            'quantidade_disponivel',
            'descricao',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Produto $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'codigo' => $model->codigo]);
                 }
            ],
        ],
    ]); ?>


</div>
