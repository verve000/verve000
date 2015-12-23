<?
namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

class BooksSearch extends Books
{
    public $authorFullName;
    public $date_from;
    public $date_to;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['author_id'], 'integer'],
            [['name', 'date_from','date_to'], 'safe'],

            [['date_from','date_to'], 'date', 'format' => 'php:Y-m-d', 'skipOnEmpty' => true],
            [['date_from','date_to'], 'filter', 'filter' => function($value){
                $date = \DateTime::createFromFormat('Y-m-d', $value );
                return $date ? date( 'Y-m-d', $date->getTimestamp() ) : null;
            }],
        ];
    }

    public function attributeLabels()
    {
        return array_merge(parent::attributeLabels(),[
            'date_from' => 'Дата выхода книги:',
            'date_to' => 'до'
        ]);
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        Yii::$app->session['BooksSearch'] = $params;

        $query = Books::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 5,
            ],
        ]);

        $dataProvider->setSort([
            'attributes' => [
                'id',
                'name',
                'preview',
                'authorFullName' => [
                    'asc' => ['authors.firstname' => SORT_ASC, 'authors.lastname' => SORT_ASC],
                    'desc' => ['authors.firstname' => SORT_DESC, 'authors.lastname' => SORT_DESC],
                    'label' => 'Full Name',
                    'default' => SORT_ASC
                ],
                'date',
                'date_create',
				'date_update'
            ]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            $query->joinWith(['author']);
            return $dataProvider;
        }

        $query->andFilterWhere(['like', 'name', $this->name]);

        if ($this->date_from) {
            $query->andFilterWhere(['>=', 'date', $this->date_from]);
        }

        if ($this->date_to) {
            $query->andFilterWhere(['<=', 'date', $this->date_to]);
        }

        if ($this->author_id) {
            $query->andFilterWhere(['author_id' => $this->author_id]);
        }

        $query->joinWith(['author']);

        return $dataProvider;
    }
}
