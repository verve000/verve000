<?
namespace app\models;

use Yii;
use yii\web\UploadedFile;

class Books extends \yii\db\ActiveRecord
{
    public $image;

    const PATH_SER = '/basic/web/';
    const PATH_IMG = '/img/books';

    public function getImgDir(){
        return Yii::getAlias('@webroot') . Books::PATH_IMG;
    }

    public function getImgSrc(){
        return Books::PATH_SER .Books::PATH_IMG .'/'.$this->preview;
    }

    public function uploadImage()
    {
        $this->image = UploadedFile::getInstance($this, 'image');
        if (isset($this->image) ) {
            $this->image->saveAs($this->getImgDir() . '/' . $this->image->name);
            $this->preview = $this->image->name;
        }
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'books';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255],

            [['author_id'], 'required'],
            [['author_id'], 'integer'],
            [['author_id'], 'exist', 'skipOnError' => false,
                'targetClass' => Authors::className(),
                'targetAttribute' => ['author_id' => 'id']],

            [['date'], 'required'],
            [['date'], 'date', 'format' => 'php:Y-m-d'],
            [['date'], 'filter', 'filter' => function($value){
                $date = \DateTime::createFromFormat('Y-m-d', $value );
                return date( 'Y-m-d', $date->getTimestamp() );
            }],

            [['image'],'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название',
			'authorFullName' => 'Автор',
			'date' => 'Дата выхода книги',
            'preview' => 'Превью',
			'image' => 'Изображение',
            'author_id' => 'Автор',
			'date_create' => 'Дата создания записи',
			'date_update' => 'Дата обновления записи'
        ];
    }

    public function getAuthor()
    {
        return $this->hasOne(Authors::className(), ['id' => 'author_id']);
    }

    public function getAuthorFullName() {
        return $this->author->firstname . ' ' . $this->author->lastname;
    }
}
