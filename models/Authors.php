<?php
namespace app\models;

use Yii;

class Authors extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'authors';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['firstname', 'lastname'], 'required'],
            [['firstname', 'lastname'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '#',
            'firstname' => 'Имя',
            'lastname' => 'Фамилия',
        ];
    }

    public function getFullName() {
        return $this->firstname . ' ' . $this->lastname;
    }

    public static function getList(){
        $list = [];

        $authors = Authors::find()->all();

        foreach($authors as $author){
            $list[$author->id] = $author->firstname .' '.$author->lastname;
        }

        return $list;
    }
}
