<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Syahriyah;

/**
 * SyahriyahTesSearch represents the model behind the search form of `app\models\Syahriyah`.
 */
class SyahriyahSearch extends Syahriyah
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_santri', 'id_katsyah', 'id_bulan', 'tahun', 'nominal'], 'integer'],
            [['tanggal_bayar'], 'safe'],
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
        $query = Syahriyah::find();

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
            'id' => $this->id,
            'id_santri' => $this->id_santri,
            'id_katsyah' => $this->id_katsyah,
            'id_bulan' => $this->id_bulan,
            'tahun' => $this->tahun,
            'tanggal_bayar' => $this->tanggal_bayar,
            'nominal' => $this->nominal,
        ]);

        return $dataProvider;
    }
}
