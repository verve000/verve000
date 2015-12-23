<?
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<div class="books-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>
    <?= $form->field($model, 'name') ?>
    <?= $form->field($model, 'date_create') ?>
    <?= $form->field($model, 'date_update') ?>
    <?= $form->field($model, 'preview') ?>
    <? // echo $form->field($model, 'date') ?>
    <? // echo $form->field($model, 'author_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
