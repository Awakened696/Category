<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "category".
 *
 * @property int $id
 * @property int $name_brand
 * @property int $name_platform
 * @property int $name_game
 * @property int $name_accessories
 *
 * @property Brands $nameBrand
 * @property Platforms $namePlatform
 * @property Games $nameGame
 * @property Accessories $nameAccessories
 */



class Category extends \yii\db\ActiveRecord
{

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {

        return [
            [['id', 'name_brand', 'name_platform', 'name_game', 'name_accessories'], 'required'],
            [['id', 'name_brand', 'name_platform', 'name_game', 'name_accessories'], 'integer'],
            [['id'], 'unique'],
            [['name_brand'], 'exist', 'skipOnError' => true, 'targetClass' => Brands::className(), 'targetAttribute' => ['name_brand' => 'id_brands']],
            [['name_platform'], 'exist', 'skipOnError' => true, 'targetClass' => Platforms::className(), 'targetAttribute' => ['name_platform' => 'id_platforms']],
            [['name_game'], 'exist', 'skipOnError' => true, 'targetClass' => Games::className(), 'targetAttribute' => ['name_game' => 'id_games']],
            [['name_accessories'], 'exist', 'skipOnError' => true, 'targetClass' => Accessories::className(), 'targetAttribute' => ['name_accessories' => 'id_accessories']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name_brand' => 'Name Brand',
            'name_platform' => 'Name Platform',
            'name_game' => 'Name Game',
            'name_accessories' => 'Name Accessories',
        ];
    }

    /**
     * Gets query for [[NameBrand]].
     *
     * @return \yii\db\ActiveQuery|yii\db\ActiveQuery
     */
    public function getNameBrand()
    {
        return $this->hasOne(Brands::className(), ['id_brands' => 'name_brand']);
    }

    /**
     * Gets query for [[NamePlatform]].
     *
     * @return \yii\db\ActiveQuery|yii\db\ActiveQuery
     */
    public function getNamePlatform()
    {
        return $this->hasOne(Platforms::className(), ['id_platforms' => 'name_platform']);
    }

    /**
     * Gets query for [[NameGame]].
     *
     * @return \yii\db\ActiveQuery|yii\db\ActiveQuery
     */
    public function getNameGame()
    {
        return $this->hasOne(Games::className(), ['id_games' => 'name_game']);
    }

    /**
     * Gets query for [[NameAccessories]].
     *
     * @return \yii\db\ActiveQuery|yii\db\ActiveQuery
     */
    public function getNameAccessories()
    {
        return $this->hasOne(Accessories::className(), ['id_accessorie' => 'name_accessories']);
    }

    /**
     * {@inheritdoc}
     * @return CategoryQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CategoryQuery(get_called_class());
    }

}
