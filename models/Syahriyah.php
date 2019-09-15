<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "syahriyah".
 *
 * @property int $id
 * @property int $id_santri
 * @property int $id_katsyah
 * @property int $id_bulan
 * @property int $tahun
 * @property string $tanggal_bayar
 * @property int $nominal
 */
class Syahriyah extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'syahriyah';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_santri', 'id_katsyah', 'id_bulan', 'tahun', 'tanggal_bayar', 'nominal'], 'required'],
            [['id_santri', 'id_katsyah', 'id_bulan', 'tahun', 'nominal'], 'integer'],
            [['tanggal_bayar'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            //'id' => 'ID',
            'id_santri' => 'Nama Santri',
            'id_katsyah' => 'Kategori Syahriyah',
            'id_bulan' => 'Bulan',
            'tahun' => 'Tahun',
            'tanggal_bayar' => 'Tanggal Bayar',
            'nominal' => 'Nominal',
        ];
    }

    public static function getNominalCount()
    {
        return static::find()
            ->select('SUM(nominal)')
            ->scalar();
    }

    //untuk menampilkan santri berdasarkan id ortu
    public function findAllSantri()
    {
        return Santri::find()
            ->andWhere(['id_santri' => $this->id])
            ->orderBy(['nama_l' => SORT_ASC])
            ->all();
    }


    public function findAllSyahriyah()
    {
        return Syahriyah::find()
            ->andWhere(['id_santri' => $this->id])
            ->orderBy(['id_bulan' => SORT_ASC])
            ->all();
    }

        //untuk mengambil seluruh data santri (nama lengkap)
    public static function getList()
    {
        return \yii\helpers\ArrayHelper::map(self::find()->all(), 'id', 'id_santri');
    }

    //memanggil data ortu di id_ortu
    public function getSantri()
    {
        return $this->hasOne(Santri::className(), ['id' => 'id_santri']);
    }

    //memanggil data jilid di id_jilid
    public function getBulan()
    {
        return $this->hasOne(Bulan::className(), ['id' => 'id_bulan']);
    }

    //menghitung jumlah semua santri
    public static function getCount()
    {
        return static::find()->count();
    }

    public static function getListBulanGrafik()
    {
        $list = [];

        for ($i=1; $i <= 12 ; $i++) {
            $list[] = self::getBulanSingkat($i);
        }

        return $list;
    }
                            
    public static function getCountGrafik()
    {
        $list = [];
        for ($i = 1; $i <= 12; $i++) {
            if (strlen($i) == 1) $i = '0' . $i;
            $count = static::findCountGrafik($i);

            $list [] = (int)@$count->count();

        }

        return $list;
    }

    public static function findCountGrafik($bulan)
    {
        $tahun = date('Y');
        $lastDay = date("t", strtotime($tahun.'_'.$bulan));

        return static::find()->andWhere(['between','tanggal_bayar', "$tahun-$bulan-01", "$tahun-$bulan-$lastDay"]);
    }
}
