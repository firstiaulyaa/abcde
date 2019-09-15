<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Pendaftaran;

/**
 * PendaftaranSearch represents the model behind the search form of `app\models\Pendaftaran`.
 */
class PendaftaranSearch extends Pendaftaran
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['no_registrasi', 'biaya_pendftr', 'biaya_jilid', 'biaya_bukuprestasi', 'biaya_bukurapot', 'total'], 'integer'],
            [['nama', 'tanggal_daftar'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Pendaftaran::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'no_registrasi' => $this->no_registrasi,
            'biaya_pendftr' => $this->biaya_pendftr,
            'biaya_jilid' => $this->biaya_jilid,
            'biaya_bukuprestasi' => $this->biaya_bukuprestasi,
            'biaya_bukurapot' => $this->biaya_bukurapot,
            'total' => $this->total,
            'tanggal_daftar' => $this->tanggal_daftar,
        ]);

        $query->andFilterWhere(['like', 'nama', $this->nama]);

        return $dataProvider;
    }
}
