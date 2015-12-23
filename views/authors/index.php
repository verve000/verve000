<?php

use yii\helpers\Html;
use yii\grid\GridView;

$this->title = 'Авторы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div>

    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'firstname',
            'lastname',
        ],
    ]); ?>

</div>

