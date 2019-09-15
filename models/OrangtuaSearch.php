<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Orangtua;

/**
 * OrangtuaSearch represents the model behind the search form of `app\models\Orangtua`.
 */
class OrangtuaSearch extends Orangtua
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_pend_ayah', 'id_pkj_ayah', 'telp_ayah', 'id_pend_ibu', 'id_pkj_ibu', 'telp_ibu'], 'integer'],
            [['nama_ayah', 'tempat_lahir_ayah', 'tanggal_lahir_ayah', 'nama_ibu', 'tempat_lahir_ibu', 'tanggal_lahir_ibu'], 'safe'],
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
        $query = Orangtua::find();

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
            'tanggal_lahir_ayah' => $this->tanggal_lahir_ayah,
            'id_pend_ayah' => $this->id_pend_ayah,
            'id_pkj_ayah' => $this->id_pkj_ayah,
            'telp_ayah' => $this->telp_ayah,
            'tanggal_lahir_ibu' => $this->tanggal_lahir_ibu,
            'id_pend_ibu' => $this->id_pend_ibu,
            'id_pkj_ibu' => $this->id_pkj_ibu,
            'telp_ibu' => $this->telp_ibu,
        ]);

        $query->andFilterWhere(['like', 'nama_ayah', $this->nama_ayah])
            ->andFilterWhere(['like', 'tempat_lahir_ayah', $this->tempat_lahir_ayah])
            ->andFilterWhere(['like', 'nama_ibu', $this->nama_ibu])
            ->andFilterWhere(['like', 'tempat_lahir_ibu', $this->tempat_lahir_ibu]);

        return $dataProvider;
    }
}
