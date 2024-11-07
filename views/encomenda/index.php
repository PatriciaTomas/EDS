<?php

use app\models\Encomenda;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\search\EncomendaSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Encomendas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="encomenda-index">

    <h1><?= Html::encode($this->title) ?></h1>

 
    <?php
       /** @var User $user */
        $user = Yii::$app->user;

        // Verificar o tipo de usuário atual
        if ($user->identity->tipo === 'vendedor') {
            // Renderizar o botão apenas se o usuário for um vendedor
            echo Html::a('Criar Encomenda', ['encomenda/create'], ['class' => 'btn btn-success']);
        }
    ?>
 

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_encomenda',
            'id_cliente',
            'data_entrega',
            'estado',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Encomenda $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_encomenda' => $model->id_encomenda]);
                 }
            ],
        ],
    ]); ?>


</div>
