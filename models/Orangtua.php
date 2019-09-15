<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "orangtua".
 *
 * @property int $id
 * @property string $nama_ayah
 * @property string $tempat_lahir_ayah
 * @property string $tanggal_lahir_ayah
 * @property int $id_pend_ayah
 * @property int $id_pkj_ayah
 * @property int $telp_ayah
 * @property string $nama_ibu
 * @property string $tempat_lahir_ibu
 * @property string $tanggal_lahir_ibu
 * @property int $id_pend_ibu
 * @property int $id_pkj_ibu
 * @property int $telp_ibu
 */
class Orangtua extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'orangtua';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama_ayah', 'nama_ibu'], 'required'],
            [['tanggal_lahir_ayah', 'tanggal_lahir_ibu'], 'safe'],
            [['id_pend_ayah', 'id_pkj_ayah', 'telp_ayah', 'id_pend_ibu', 'id_pkj_ibu', 'telp_ibu'], 'integer'],
            [['nama_ayah', 'nama_ibu'], 'string', 'max' => 255],
            [['tempat_lahir_ayah', 'tempat_lahir_ibu'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
             //'id' => 'ID',
            'nama_ayah' => 'Nama Ayah',
            'tempat_lahir_ayah' => 'Tempat Lahir Ayah',
            'tanggal_lahir_ayah' => 'Tanggal Lahir Ayah',
            'id_pend_ayah' => 'Pendidikan Ayah',
            'id_pkj_ayah' => 'Pekerjaan Ayah',
            'telp_ayah' => 'No. HP Ayah',
            'nama_ibu' => 'Nama Ibu',
            'tempat_lahir_ibu' => 'Tempat Lahir Ibu',
            'tanggal_lahir_ibu' => 'Tanggal Lahir Ibu',
            'id_pend_ibu' => 'Pendidikan Ibu',
            'id_pkj_ibu' => 'Pekerjaan Ibu',
            'telp_ibu' => 'No. HP Ibu',
        ];
    }

    //menampilkan semua data ortu
    public static function getList()
    {
        return \yii\helpers\ArrayHelper::map(self::find()->all(), 'id', 'nama_ayah');
    }

    //menampilkan data santri berdasarkan id ortu
    public function findAllSantri()
    {
        return Santri::find()
        ->andWhere(['id_ortu' => $this->id])
        ->orderBy(['nama_l' => SORT_ASC])
        ->all();
    }

    //menampilkan banyak santri
    public function getManySantri()
    {
        return $this->hasMany(Santri::class, ['id_santri' => 'id']);
    }

    //memanggil data pekerjaan ayah 
    public function getpkjAyah()
    {
        return $this->hasOne(Pekerjaan::className(), ['id' => 'id_pkj_ayah']);
    }

    //memanggil data pendidikan ayah
    public function getpendAyah()
    {
        return $this->hasOne(Pendidikan::className(), ['id' => 'id_pend_ayah']);
    }

    //memanggil data pekerjaan ibu
    public function getpkjIbu()
    {
        return $this->hasOne(Pekerjaan::className(), ['id' => 'id_pkj_ibu']);
    }

    //memanggil data pendidikan ibu
    public function getpendIbu()
    {
        return $this->hasOne(Pendidikan::className(), ['id' => 'id_pend_ibu']);
    }

    //menghitung semua jumlah ortu
    public static function getCount()
    {
        return static::find()->count();
    }
}
