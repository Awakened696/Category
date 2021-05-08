<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "platforms".
 *
 * @property int $id_platforms
 * @property string $name_platforms
 * @property int $name_brand
 * @property int $year
 *
 * @property Accessories[] $accessories
 * @property Category[] $categories
 * @property Games[] $games
 * @property Brands $nameBrand
 */
class Platforms extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'platforms';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_platforms', 'name_platforms', 'name_brand', 'year'], 'required'],
            [['id_platforms', 'name_brand', 'year'], 'integer'],
            [['name_platforms'], 'string', 'max' => 1000],
            [['id_platforms'], 'unique'],
            [['name_brand'], 'exist', 'skipOnError' => true, 'targetClass' => Brands::className(), 'targetAttribute' => ['name_brand' => 'id_brands']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_platforms' => 'Id Sony',
            'name_platforms' => 'Name Sony',
            'name_brand' => 'Name Brand',
            'year' => 'Year',
        ];
    }

    /**
     * Gets query for [[Accessories]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAccessories()
    {
        return $this->hasMany(Accessories::className(), ['platform' => 'id_platforms']);
    }

    /**
     * Gets query for [[Categories]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategories()
    {
        return $this->hasMany(Category::className(), ['name_platform' => 'id_platforms']);
    }

    /**
     * Gets query for [[Games]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGames()
    {
        return $this->hasMany(Games::className(), ['id_platforms' => 'id_platforms']);
    }

    /**
     * Gets query for [[NameBrand]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNameBrand()
    {
        return $this->hasOne(Brands::className(), ['id_brands' => 'name_brand']);
    }
}
