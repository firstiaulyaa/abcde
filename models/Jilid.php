<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "jilid".
 *
 * @property int $id
 * @property string $jilid
 */
class Jilid extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'jilid';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['jilid'], 'required'],
            [['jilid'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            //'id' => 'ID',
            'jilid' => 'Jilid',
        ];
    }

    //untuk menampilkan santri berdasarkan id ortu
    public function findAllSantri()
    {
        return Santri::find()
            ->andWhere(['id_jilid' => $this->id])
            ->orderBy(['nama_l' => SORT_ASC])
            ->all();
    }

    //untuk menampilkan santri berdasarkan id ortu
    public function findAllPengajar()
    {
        return Pengajar::find()
            ->andWhere(['id_jilid' => $this->id])
            ->orderBy(['nama' => SORT_ASC])
            ->all();
    }

    //untuk mengambil seluruh data bulan
    public static function getList()
    {
        return \yii\helpers\ArrayHelper::map(self::find()->all(), 'id', 'jilid');
    }

    public function getManySantri()
    {
        return $this->hasMany(Santri::class, ['id_jilid' => 'id']);
    }

    // Menjumlah semua data buku yang berkaitan dengan id_***.
    public static function getGrafikList()
    {
        $data = [];
        foreach (static::find()->all() as $Jilid) {
            $data[] = [$Jilid->jilid, (int) $Jilid->getManySantri()->count()];
        }
        return $data;
    }
}
