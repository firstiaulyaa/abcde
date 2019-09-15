<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pengajar".
 *
 * @property int $id
 * @property string $nama
 * @property int $nip
 * @property int $id_jk
 * @property string $tempat_lahir
 * @property string $tanggal_lahir
 * @property int $id_pend
 * @property string $id_pkj
 * @property string $alamat
 * @property int $telepon
 * @property string $email
 * @property string $foto
 * @property int $id_kelas
 */
class Pengajar extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pengajar';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama', 'nip', 'id_jk', 'tempat_lahir', 'tanggal_lahir', 'id_pend', 'id_pkj', 'alamat', 'telepon', 'id_kelas'], 'required'],
            [['nip', 'id_jk', 'id_pend', 'telepon', 'id_kelas'], 'integer'],
            [['tanggal_lahir'], 'safe'],
            [['nama', 'alamat', 'foto'], 'string', 'max' => 255],
            [['tempat_lahir', 'email'], 'string', 'max' => 100],
            [['id_pkj'], 'string', 'max' => 4],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            //'id' => 'ID',
            'nama' => 'Nama',
            'nip' => 'NIP',
            'id_jk' => 'Jenis Kelamin',
            'tempat_lahir' => 'Tempat Lahir',
            'tanggal_lahir' => 'Tanggal Lahir',
            'id_pend' => 'Pendidikan Terakhir',
            'id_pkj' => 'Pekerjaan',
            'alamat' => 'Alamat',
            'telepon' => 'Telepon',
            'email' => 'Email',
            'foto' => 'Foto',
            'id_kelas' => 'Kelas',
        ];
    }

    //untuk menampilkan santri berdasarkan id ortu
    public function findAllPengantarTes()
    {
        return PengantarTes::find()
            ->andWhere(['id_santri' => 'id'])
            ->orderBy(['tanggal_tes' => SORT_ASC])
            ->all();
    }

    public static function getCount()
    {
        return static::find()->count();
    }

    //memanggil data jilid di id_jilid
    public function getJenisKelamin()
    {
        return $this->hasOne(JenisKelamin::className(), ['id' => 'id_jk']);
    }

    //memanggil data katsyah di id_jilid
    public function getPendidikan()
    {
        return $this->hasOne(Pendidikan::className(), ['id' => 'id_pend']);
    }

    //memanggil data jilid di id_jilid
    public function getPekerjaan()
    {
        return $this->hasOne(Pekerjaan::className(), ['id' => 'id_pkj']);
    }

    //memanggil data jilid di id_jilid
    public function getKelas()
    {
        return $this->hasOne(Kelas::className(), ['id' => 'id_kelas']);
    }
}
