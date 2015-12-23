<?
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
use app\models\Authors;
use dosamigos\datepicker\DatePicker;

$this->title = 'Книги';
$this->params['breadcrumbs'][] = $this->title;
?>
<div>

    <h1><?= Html::encode($this->title) ?></h1>

    <div style="margin-bottom:20px;; float:right;">
        <?= Html::a('Добавить книгу', ['create'], ['class' => 'btn btn-success']) ?>
    </div><br>

    <div>

        <?php $form = ActiveForm::begin([
            'method' => 'get',
            'options' => ['class' => 'form-inline']
        ]); ?>

        <div class="form-group">
            <?= $form->field($searchModel, 'author_id')->dropDownList(
                array_merge( [0=>'автор'] ,Authors::getList()),
                [
                    'options' => [
                        'class'=>'form-control',
                        $searchModel->author_id => ['selected' => true]
                    ]
                ]
            )->label(false); ?>
        </div>

        <div class="form-group">
            <?= $form->field($searchModel, 'name')->textInput(['placeholder'=>'название книги'])->label(false) ?>
        </div><br><br>

        <?= $form->field($searchModel,'date_from')->widget(
            DatePicker::className(), [
			'language' => 'ru',
			'clientOptions' => [
                'format' => 'yyyy-mm-dd',
            ],
            'options' =>[
                'class' => 'form-control',
                'readonly'=> ''
            ]
        ]) ?>

        <?= $form->field($searchModel,'date_to')->widget(
            DatePicker::className(), [
			'language' => 'ru',
			'clientOptions' => [
                'format' => 'yyyy-mm-dd',
            ],
            'options' =>[
                'class' => 'form-control',
                'readonly'=> ''
            ]
        ]) ?>

        <?= Html::submitButton('искать', ['class' => 'btn btn-primary', 'style'=>'margin-top:-10px']) ?>
        <br><br>

    </div>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'options'=>[
            'id'=>'table_books'
        ],
        'columns' => [
            'id',
            'name',
            [
                'attribute' => 'preview',
                'format' => 'html',
                'value' => function($data) {
                    return $data->preview ? Html::img($data->getImgSrc(), ['width'=>'50','class'=>'books-img']) : $data->preview;
                },
            ],
            'authorFullName',
            [
                'attribute' => 'date',
                'format' =>  ['date'],  
            ],
			[
                'attribute' => 'date_update',
                'format' =>  ['date']
            ],
			[
                'class'   => 'yii\grid\ActionColumn',
                'header'  => '',
                'template'=>'{update} '
            ],
			[
              'class'   => 'yii\grid\ActionColumn',
                'header'  => '',
                'template'=>'{view}'
            ],
			[
                'class'   => 'yii\grid\ActionColumn',
                'header'  => '',
                'template'=>'{delete}'
            ]			
        ],
    ]); ?>

</div>

<script src="jquery-2.1.4.min.js"></script>
<script src="modal-books.js"></script>
<div id="modal_books_view" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body"></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
            </div>
        </div>
    </div>
</div>