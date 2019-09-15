<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "jenis_kelamin".
 *
 * @property int $id
 * @property string $jk
 */
class JenisKelamin extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'jenis_kelamin';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['jk'], 'required'],
            [['jk'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'jk' => 'Jk',
        ];
    }

        public static function getList()
    {
        return \yii\helpers\ArrayHelper::map(self::find()->all(), 'id', 'jk');
    }
}
