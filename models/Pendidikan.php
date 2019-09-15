<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pendidikan".
 *
 * @property int $id
 * @property string $pendidikan
 */
class Pendidikan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pendidikan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pendidikan'], 'required'],
            [['pendidikan'], 'string', 'max' => 60],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            //'id' => 'ID',
            'pendidikan' => 'Pendidikan',
        ];
    }

         //untuk mengambil seluruh data bulan
    public static function getList()
    {
        return \yii\helpers\ArrayHelper::map(self::find()->all(), 'id', 'pendidikan');
    }
}
