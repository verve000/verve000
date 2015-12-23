<?
use yii\helpers\Html;
use yii\widgets\DetailView;
?>

<? if($model->preview){
    echo Html::img($model->getImgSrc(), ['width'=>'100','class'=>'books-img']);
}?><br><br>

<?= DetailView::widget([
    'model' => $model,
    'attributes' => [
        'id',
        'name',
		'authorFullName',
		'date',
		'date_create',
        'date_update',
    ],
]) ?>