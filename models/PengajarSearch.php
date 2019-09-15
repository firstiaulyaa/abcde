<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Pengajar;

/**
 * PengajarSearch represents the model behind the search form of `app\models\Pengajar`.
 */
class PengajarSearch extends Pengajar
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'nip', 'id_jk', 'id_pend', 'telepon', 'id_kelas'], 'integer'],
            [['nama', 'tempat_lahir', 'tanggal_lahir', 'id_pkj', 'alamat', 'email', 'foto'], 'safe'],
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
        $query = Pengajar::find();

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
            'nip' => $this->nip,
            'id_jk' => $this->id_jk,
            'tanggal_lahir' => $this->tanggal_lahir,
            'id_pend' => $this->id_pend,
            'telepon' => $this->telepon,
            'id_kelas' => $this->id_kelas,
        ]);

        $query->andFilterWhere(['like', 'nama', $this->nama])
            ->andFilterWhere(['like', 'tempat_lahir', $this->tempat_lahir])
            ->andFilterWhere(['like', 'id_pkj', $this->id_pkj])
            ->andFilterWhere(['like', 'alamat', $this->alamat])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'foto', $this->foto]);

        return $dataProvider;
    }
}
