<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "games".
 *
 * @property int $id_games
 * @property string $name_games
 * @property int $genre
 * @property int $id_platforms
 *
 * @property Category[] $categories
 * @property Platforms $platforms
 * @property Genres $genre0
 */
class Games extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'games';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_games', 'name_games', 'genre', 'id_platforms'], 'required'],
            [['id_games', 'genre', 'id_platforms'], 'integer'],
            [['name_games'], 'string', 'max' => 1000],
            [['id_games'], 'unique'],
            [['id_platforms'], 'exist', 'skipOnError' => true, 'targetClass' => Platforms::className(), 'targetAttribute' => ['id_platforms' => 'id_platforms']],
            [['genre'], 'exist', 'skipOnError' => true, 'targetClass' => Genres::className(), 'targetAttribute' => ['genre' => 'id_genre']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_games' => 'Id Games',
            'name_games' => 'Name Games',
            'genre' => 'Genre',
            'id_platforms' => 'Id Sony',
        ];
    }

    /**
     * Gets query for [[Categories]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategories()
    {
        return $this->hasMany(Category::className(), ['name_game' => 'id_games']);
    }

    /**
     * Gets query for [[Sony]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPlatforms()
    {
        return $this->hasOne(Platforms::className(), ['id_platforms' => 'id_platforms']);
    }

    /**
     * Gets query for [[Genre0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGenre0()
    {
        return $this->hasOne(Genres::className(), ['id_genre' => 'genre']);
    }
}
