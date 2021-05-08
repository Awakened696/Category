<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "accessories".
 *
 * @property int $id_accessorie
 * @property string $name_accessorie
 * @property int $brand
 * @property int $platform
 * @property int $year
 *
 * @property Brands $brand0
 * @property Platforms $platform0
 * @property Category[] $categories
 */
class Accessories extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'accessories';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_accessorie', 'name_accessorie', 'brand', 'platform', 'year'], 'required'],
            [['id_accessorie', 'brand', 'platform', 'year'], 'integer'],
            [['name_accessorie'], 'string', 'max' => 1000],
            [['id_accessorie'], 'unique'],
            [['brand'], 'exist', 'skipOnError' => true, 'targetClass' => Brands::className(), 'targetAttribute' => ['brand' => 'id_brands']],
            [['platform'], 'exist', 'skipOnError' => true, 'targetClass' => Platforms::className(), 'targetAttribute' => ['platform' => 'id_platforms']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_accessorie' => 'Id Accessorie',
            'name_accessorie' => 'Name Accessorie',
            'brand' => 'Brand',
            'platform' => 'Platform',
            'year' => 'Year',
        ];
    }

    /**
     * Gets query for [[Brand0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBrand0()
    {
        return $this->hasOne(Brands::className(), ['id_brands' => 'brand']);
    }

    /**
     * Gets query for [[Platform0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPlatform0()
    {
        return $this->hasOne(Platforms::className(), ['id_platforms' => 'platform']);
    }

    /**
     * Gets query for [[Categories]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategories()
    {
        return $this->hasMany(Category::className(), ['name_accessories' => 'id_accessorie']);
    }
}
