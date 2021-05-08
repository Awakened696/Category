<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "genres".
 *
 * @property int $id_genre
 * @property string $name_genre
 *
 * @property Games[] $games
 */
class Genres extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'genres';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_genre', 'name_genre'], 'required'],
            [['id_genre'], 'integer'],
            [['name_genre'], 'string', 'max' => 1000],
            [['id_genre'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_genre' => 'Id Genre',
            'name_genre' => 'Name Genre',
        ];
    }

    /**
     * Gets query for [[Games]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGames()
    {
        return $this->hasMany(Games::className(), ['genre' => 'id_genre']);
    }
}
