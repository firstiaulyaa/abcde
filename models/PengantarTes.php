<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pengantar_tes".
 *
 * @property int $id
 * @property int $id_thnajaran
 * @property string $tanggal_tes
 * @property int $id_santri
 * @property int $id_jilid
 * @property int $kelancaran
 * @property int $kefasihan
 * @property int $makhroj
 * @property int $tajwid
 * @property string $saran
 * @property string $keterangan
 */
class PengantarTes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pengantar_tes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_thnajaran', 'tanggal_tes', 'id_santri', 'id_jilid', 'kelancaran', 'kefasihan', 'makhroj', 'tajwid', 'saran', 'keterangan'], 'required'],
            [['id_thnajaran', 'id_santri', 'id_jilid', 'kelancaran', 'kefasihan', 'makhroj', 'tajwid'], 'integer'],
            [['tanggal_tes'], 'safe'],
            [['saran', 'keterangan'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_thnajaran' => 'Tahun Ajaran',
            'tanggal_tes' => 'Tanggal Tes',
            'id_santri' => 'Nama Santri',
            'id_jilid' => 'Jilid',
            'kelancaran' => 'Kelancaran',
            'kefasihan' => 'Kefasihan',
            'makhroj' => 'Makhroj',
            'tajwid' => 'Tajwid',
            'saran' => 'Saran',
            'keterangan' => 'Keterangan',
        ];
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
    public function getJilid()
    {
        return $this->hasOne(Jilid::className(), ['id' => 'id_jilid']);
    }

        //memanggil data jilid di id_jilid
    public function getTahunAjaran()
    {
        return $this->hasOne(TahunAjaran::className(), ['id' => 'id_thnajaran']);
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

        return static::find()->andWhere(['between','tanggal_tes', "$tahun-$bulan-01", "$tahun-$bulan-$lastDay"]);
    }

}
