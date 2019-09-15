<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "kelas".
 *
 * @property int $id
 * @property string $kelas
 * @property int $id_pengajar
 */
class Kelas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'kelas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['kelas'], 'required'],
            [['kelas'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'kelas' => 'Kelas',
        ];
    }

             //untuk mengambil seluruh data bulan
    public static function getList()
    {
        return \yii\helpers\ArrayHelper::map(self::find()->all(), 'id', 'kelas');
    }

    public function getManySantri()
    {
        return $this->hasMany(Santri::class, ['id_kelas' => 'id']);
    }

    // Menjumlah semua data buku yang berkaitan dengan id_***.
    public static function getGrafikList()
    {
        $data = [];
        foreach (static::find()->all() as $Kelas) {
            $data[] = [$Kelas->kelas, (int) $Kelas->getManySantri()->count()];
        }
        return $data;
    }

    //untuk menampilkan santri berdasarkan id ortu
    public function findAllSantri()
    {
        return Santri::find()
            ->andWhere(['id_jilid' => $this->id])
            ->orderBy(['nama_l' => SORT_ASC])
            ->all();
    }

        //menghitung jumlah semua santri
    public static function getCount()
    {
        return static::find()->count();
    }

}
