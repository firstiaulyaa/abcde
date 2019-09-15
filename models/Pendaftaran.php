<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pendaftaran".
 *
 * @property int $no_registrasi
 * @property string $nama
 * @property int $biaya_pendftr
 * @property int $biaya_jilid
 * @property int $biaya_bukuprestasi
 * @property int $biaya_bukurapot
 * @property int $total
 */
class Pendaftaran extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pendaftaran';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama'], 'required'],
            [['biaya_pendftr', 'biaya_jilid', 'biaya_bukuprestasi', 'biaya_bukurapot', 'total'], 'integer'],
            [['nama'], 'string', 'max' => 255],
            [['tanggal_daftar'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'no_registrasi' => 'No Registrasi',
            'tanggal_daftar' => 'Tanggal',
            'nama' => 'Nama',
            'biaya_pendftr' => 'Biaya Pendaftaran',
            'biaya_jilid' => "Biaya Buku Yanbu'a",
            'biaya_bukuprestasi' => 'Biaya Buku Prestasi',
            'biaya_bukurapot' => 'Biaya Buku Rapot',
            'total' => 'Total',
        ];
    }
}
