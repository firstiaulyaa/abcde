<?php

namespace app\models;

use Yii;
use yii\helpers\Html;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $username
 * @property string $password
 * @property int $id_pengajar
 * @property int $id_user_role
 * @property int $status
 * @property string $token
 */
class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'password', 'token'], 'required'],
            [['id_pengajar', 'id_user_role'], 'integer'],
            [['username', 'token'], 'string', 'max' => 50],
            [['password'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'password' => 'Password',
            'id_pengajar' => 'ID Pengajar',
            'id_user_role' => 'Status User',
            'token' => 'Token',
        ];
    }

    //custom identity user
    public static function findIdentity($id)
    {
        return self::findOne($id);
    }

    //access token
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);
    }

    //memanggil id
    public function getId()
    {
        return $this->id;
    }

    //memanggil auth key
    public function getAuthKey()
    {
        return null;
    }

    //validasi auth key
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    //username pada saat login dan sesuai dgn database
    public static function findByUsername($username)
    {
        return self::findOne(['username' => $username]);
    }

    //validasi password
    public function validatePassword($password)
    {
        //password dgn tidak menggunakan hash (di database terlihat)
        //return $this->password == $password;

        //password dgn menggunakan hash (di database terenkripsi)
        return Yii::$app->getSecurity()->validatePassword($password, $this->password);
    }

    //menghitung jumlah user
    public static function getCount()
    {
        return static::find()->count();
    }

    //untuk memanggil id user role
    public function getUserRole()
    {
        $model = UserRole::findOne($this->id_user_role);

        if ($model !== null) {
            return $model->nama;
        } else {
            return null;
        }
    }

    //proses security password pada saat buat akun/ubah password
    public function beforeSave($insert)
    {
        if ($insert) {
            $this->password = Yii::$app->getSecurity()->generatePasswordHash($this->password);
        }
        return true;
    }

    //access control untuk admin
    public static function isAdmin()
    {
        //jika admin logout, maka tidak bisa mengakses halaman sebelumnya dan harus login kembali
        if (Yii::$app->user->isGuest) {
           return false;
        }

        //membuat id akses user untuk admin
        if (($user = User::findOne(Yii::$app->user->identity->id_user_role == 1))) {
            return $user;
        } else {
            return false;
        }
    }

    //access control untuk pengajar
    public static function isPengajar()
    {
        //jika admin logout, maka tidak bisa mengakses halaman sebelumnya dan harus login kembali
        if (Yii::$app->user->isGuest) {
           return false;
        }

        //membuat id akses user untuk pengajar
        if (($user = User::findOne(Yii::$app->user->identity->id_user_role == 2))) {
            return $user;
        } else {
            return false;
        }
    }

    //mengambil data pengajar
    public function getPengajar()
    {
        return $this->hasOne(Pengajar::className(), ['id' => 'id_pengajar']);
    }

    //memanggil foto admin sebagai foto user
    public static function getFotoAdmin($htmlOptions=[])
    {
        return Html::img('@web/images/tpq.png', $htmlOptions);
    }

    //memanggil foto pengajar sebagai foto user
    public static function getFotoPengajar($htmlOptions=[])
    {
        $query = Pengajar::find()
            ->andWhere(['id' => Yii::$app->user->identity->id_pengajar])
            ->one();

        if ($query->foto != null) {
            return Html::img('@web/upload/pengajar/' . $query->foto, $htmlOptions);
        } else {
            return Html::img('@web/pengajar/no-images.png', $htmlOptions);
        }
    }
}
