<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pekerjaan".
 *
 * @property int $id
 * @property string $pekerjaan
 */
class Pekerjaan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pekerjaan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pekerjaan'], 'required'],
            [['pekerjaan'], 'string', 'max' => 60],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            //'id' => 'ID',
            'pekerjaan' => 'Pekerjaan',
        ];
    }

         //untuk mengambil seluruh data bulan
    public static function getList()
    {
        return \yii\helpers\ArrayHelper::map(self::find()->all(), 'id', 'pekerjaan');
    }
}
