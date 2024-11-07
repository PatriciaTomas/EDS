<?php
use yii\helpers\Html;

$this->title = 'Encomendas por Efetuar';
$this->params['breadcrumbs'][] = $this->title;
?>

<h1><?= Html::encode($this->title) ?></h1>

<?php if (!empty($encomendas)): ?>
    <ul>
        <?php foreach ($encomendas as $encomenda): ?>
            <li><?= Html::encode($encomenda->nome) ?></li>
        <?php endforeach; ?>
    </ul>
<?php else: ?>
    <p>Não há encomendas por efetuar no momento.</p>
<?php endif; ?>