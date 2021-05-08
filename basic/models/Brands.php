<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "brands".
 *
 * @property int $id_brands
 * @property string $name_brand
 * @property string $producing_country
 *
 * @property Accessories[] $accessories
 * @property Category[] $categories
 * @property Platforms[] $platforms
 */
class Brands extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'brands';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_brands', 'name_brand', 'producing_country'], 'required'],
            [['id_brands'], 'integer'],
            [['name_brand', 'producing_country'], 'string', 'max' => 1000],
            [['id_brands'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_brands' => 'Id Brands',
            'name_brand' => 'Name Brand',
            'producing_country' => 'Producing Country',
        ];
    }

    /**
     * Gets query for [[Accessories]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAccessories()
    {
        return $this->hasMany(Accessories::className(), ['brand' => 'id_brands']);
    }

    /**
     * Gets query for [[Categories]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategories()
    {
        return $this->hasMany(Category::className(), ['name_brand' => 'id_brands']);
    }

    /**
     * Gets query for [[Sony]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPlatforms()
    {
        return $this->hasMany(Platforms::className(), ['name_brand' => 'id_brands']);
    }
}
