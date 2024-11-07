<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Produto;



/** @var yii\web\View $this */
/** @var app\models\Encomenda $model */
/** @var yii\widgets\ActiveForm $form */
/** @var app\models\Produto $model */
?>

<div class="encomenda-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_cliente')->textInput() ?>

    <?= $form->field($model, 'data_entrega')->textInput() ?>

    <?= $form->field($model, 'estado')->textInput(['maxlength' => true]) ?>

    <div id="produto-list">
    <div class="produto-item">
        <div class="row">
            <div class="col-md-6">
                <?= $form->field($model, 'codigo_produto[]')->dropDownList(ArrayHelper::map(Produto::find()->all(), 'codigo', 'nome'), ['prompt' => 'Selecione o produto']) ?>
            </div>
            <div class="col-md-4">
                <?= $form->field($model, 'quantidade[]')->textInput(['type' => 'number']) ?>
            </div>
        </div>
    </div>
</div>

<button type="button" id="add-produto" class="btn btn-primary">Adicionar Produto</button>

 <button type="button" class="btn btn-danger remove-produto">Remover</button>

 <div id="produto-list">

</div>

          

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

<script>
$(document).ready(function() {
    var count = <?= count($model->encomendaProdutos) ?>; // Número inicial de produtos

    // Função para adicionar um produto à lista
    function adicionarProduto(codigo_produto, nome_produto, quantidade) {
    var template = `
        <div class="produto-item">
            <input type="hidden" name="EncomendaProduto[${count}][codigo_produto]" value="${codigo_produto}">
            <input type="hidden" name="EncomendaProduto[${count}][quantidade]" value="${quantidade}">
            <span>${nome_produto} - ${quantidade}</span>
            <button type="button" class="btn btn-danger btn-sm remover-produto">Remover</button>
        </div>
    `;

    $('#produto-list').append(template);
    count++;
}


    // Evento de clique no botão "Adicionar"
    $('#add-produto').click(function() {
        var codigo_produto = $('#codigo_produto').val();
        var nome_produto = $('#codigo_produto option:selected').text();
        var quantidade = $('#quantidade').val();

        adicionarProduto(codigo_produto, nome_produto, quantidade);
    });

    // Evento de clique no botão "Remover"
    $('#produto-list').on('click', '.remover-produto', function() {
        $(this).closest('.produto-item').remove();
    });
});
</script>

