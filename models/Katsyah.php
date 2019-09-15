<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "katsyah".
 *
 * @property int $id
 * @property string $kategori
 * @property int $nominal
 */
class Katsyah extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'katsyah';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['kategori', 'nominal'], 'required'],
            [['nominal'], 'integer'],
            [['kategori'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'kategori' => 'Kategori Syahriyah',
            'nominal' => 'Nominal',
        ];
    }

             //untuk mengambil seluruh data bulan
    public static function getList()
    {
        return \yii\helpers\ArrayHelper::map(self::find()->all(), 'id', 'kategori');
    }
}
