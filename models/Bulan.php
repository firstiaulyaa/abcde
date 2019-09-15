<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bulan".
 *
 * @property int $id
 * @property string $bulan
 */
class Bulan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bulan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['bulan'], 'required'],
            [['bulan'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            //'id' => 'ID',
            'bulan' => 'Bulan',
        ];
    }

    //untuk mengambil seluruh data bulan
    public static function getList()
    {
        return \yii\helpers\ArrayHelper::map(self::find()->all(), 'id', 'bulan');
    }
}
