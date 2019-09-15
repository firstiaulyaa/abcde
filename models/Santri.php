<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "santri".
 *
 * @property int $id
 * @property string $nis
 * @property string $nama_l
 * @property string $nama_p
 * @property int $id_jk
 * @property string $tempat_lahir
 * @property string $tanggal_lahir
 * @property string $alamat
 * @property int $anak_ke
 * @property int $id_pend
 * @property int $id_ortu
 * @property string $tanggal_masuk
 * @property int $id_jilid
 * @property int $id_kelas
 * @property int $id_katsyah
 * @property string $foto
 * @property int $id_status
 */
class Santri extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'santri';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nis', 'nama_l', 'nama_p', 'id_jilid', 'id_kelas', 'id_katsyah', 'id_no_registrasi'], 'required'],
            [['id_jk', 'anak_ke', 'id_pend', 'id_ortu', 'id_jilid', 'id_kelas', 'id_katsyah', 'id_status', 'nis'], 'integer'],
            [['tanggal_lahir', 'tanggal_masuk'], 'safe'],
            [['alamat'], 'string'],
            [['nama_p'], 'string', 'max' => 20],
            [['nama_l', 'foto'], 'string', 'max' => 255],
            [['tempat_lahir'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            //'id' => 'ID',
            'id_no_registrasi' => 'No. Registrasi',
            'nis' => 'NIS',
            'nama_l' => 'Nama Lengkap',
            'nama_p' => 'Nama Panggilan',
            'id_jk' => 'Jenis Kelamin',
            'tempat_lahir' => 'Tempat Lahir',
            'tanggal_lahir' => 'Tanggal Lahir',
            'alamat' => 'Alamat',
            'anak_ke' => 'Anak Ke-',
            'id_pend' => 'Pendidikan',
            'id_ortu' => 'Nama Ayah',
            'tanggal_masuk' => 'Tanggal Masuk',
            'id_kelas' => 'Kelas',
            'id_jilid' => 'Jilid',
            'id_katsyah' => 'Kategori Syahriyah',
            'foto' => 'Foto',
            'id_status' => 'Status',
        ];
    }

    //menampilkan data santri di menu lain berdasarkan kelas santri
    public function findAllSantri()
    {
        return Santri::find()
            ->andWhere(['id_kelas' => $this->id])
            ->orderBy(['nama_l' => SORT_ASC])
            ->all();
    }

    //menampilkan data pengantar tes santri berdasarkan tanggal tes santri
    public function findAllPengantarTes()
    {
        return PengantarTes::find()
            ->andWhere(['id_santri' => $this->id])
            ->orderBy(['tanggal_tes' => SORT_ASC])
            ->all();
    }

    //menampilkan data syahriyah santri berdasarkan tahun
    public function findAllSyahriyah()
    {
        return Syahriyah::find()
            ->andWhere(['id_santri' => $this->id])
            ->orderBy(['tahun' => SORT_ASC])
            ->all();
    }

    //untuk mengambil seluruh data santri berdasarkan nama lengkap
    public static function getList()
    {
        return \yii\helpers\ArrayHelper::map(self::find()->all(), 'id', 'nama_l');
    }

    //memanggil list data orang tua di form santri (id_ortu)
    public function getOrangtua()
    {
        return $this->hasOne(Orangtua::className(), ['id' => 'id_ortu']);
    }

    //memanggil list data jilid di form santri (id_jilid)
    public function getJilid()
    {
        return $this->hasOne(Jilid::className(), ['id' => 'id_jilid']);
    }

    //memanggil list data jenis kelamin di form santri (id_jk)
    public function getJenisKelamin()
    {
        return $this->hasOne(JenisKelamin::className(), ['id' => 'id_jk']);
    }

    //memanggil list data katsyah di form santri (id_katsyah)
    public function getKatsyah()
    {
        return $this->hasOne(Katsyah::className(), ['id' => 'id_katsyah']);
    }

    //memanggil list data pendidikan di form santri (id_pend)
    public function getPendidikan()
    {
        return $this->hasOne(Pendidikan::className(), ['id' => 'id_pend']);
    }

    //memanggil list data kelas di form santri (id_kelas)
    public function getKelas()
    {
        return $this->hasOne(Kelas::className(), ['id' => 'id_kelas']);
    }

    //menghitung jumlah semua santri
    public static function getCount()
    {
        return static::find()->count();
    }
}
