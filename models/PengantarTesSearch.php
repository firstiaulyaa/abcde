<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PengantarTes;

/**
 * PengantarTesSearch represents the model behind the search form of `app\models\PengantarTes`.
 */
class PengantarTesSearch extends PengantarTes
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_thnajaran', 'id_santri', 'id_jilid', 'kelancaran', 'kefasihan', 'makhroj', 'tajwid'], 'integer'],
            [['tanggal_tes', 'saran', 'keterangan'], 'safe'],
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
        $query = PengantarTes::find();

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
            'id_thnajaran' => $this->id_thnajaran,
            'tanggal_tes' => $this->tanggal_tes,
            'id_santri' => $this->id_santri,
            'id_jilid' => $this->id_jilid,
            'kelancaran' => $this->kelancaran,
            'kefasihan' => $this->kefasihan,
            'makhroj' => $this->makhroj,
            'tajwid' => $this->tajwid,
        ]);

        $query->andFilterWhere(['like', 'saran', $this->saran])
            ->andFilterWhere(['like', 'keterangan', $this->keterangan]);

        return $dataProvider;
    }
}
