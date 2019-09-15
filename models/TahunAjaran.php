<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tahun_ajaran".
 *
 * @property int $id
 * @property string $thn_ajaran
 */
class TahunAjaran extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tahun_ajaran';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['thn_ajaran'], 'required'],
            [['thn_ajaran'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            //'id' => 'ID',
            'thn_ajaran' => 'Tahun Ajaran',
        ];
    }

        //untuk mengambil seluruh data bulan
    public static function getList()
    {
        return \yii\helpers\ArrayHelper::map(self::find()->all(), 'id', 'thn_ajaran');
    }
}
