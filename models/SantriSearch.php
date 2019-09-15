<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Santri;

/**
 * SantriSearch represents the model behind the search form of `app\models\Santri`.
 */
class SantriSearch extends Santri
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_jk', 'anak_ke', 'id_pend', 'id_ortu', 'id_jilid', 'id_kelas', 'id_katsyah', 'id_status'], 'integer'],
            [['nis', 'nama_l', 'nama_p', 'tempat_lahir', 'tanggal_lahir', 'alamat', 'tanggal_masuk', 'foto'], 'safe'],
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
        $query = Santri::find();

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
            'id_jk' => $this->id_jk,
            'tanggal_lahir' => $this->tanggal_lahir,
            'anak_ke' => $this->anak_ke,
            'id_pend' => $this->id_pend,
            'id_ortu' => $this->id_ortu,
            'tanggal_masuk' => $this->tanggal_masuk,
            'id_jilid' => $this->id_jilid,
            'id_kelas' => $this->id_kelas,
            'id_katsyah' => $this->id_katsyah,
            'id_status' => $this->id_status,
        ]);

        $query->andFilterWhere(['like', 'nis', $this->nis])
            ->andFilterWhere(['like', 'nama_l', $this->nama_l])
            ->andFilterWhere(['like', 'nama_p', $this->nama_p])
            ->andFilterWhere(['like', 'tempat_lahir', $this->tempat_lahir])
            ->andFilterWhere(['like', 'alamat', $this->alamat])
            ->andFilterWhere(['like', 'foto', $this->foto]);

        return $dataProvider;
    }
}
