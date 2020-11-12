<?php

namespace common\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\NhanVatLichSu;

/**
 * NhanVatLichSuSearch represents the model behind the search form of `common\models\NhanVatLichSu`.
 */
class NhanVatLichSuSearch extends NhanVatLichSu
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['TenNhanVatLichSu', 'Code', 'MoTa', 'AnhDaiDien', 'Title', 'Alt'], 'safe'],
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
        $query = NhanVatLichSu::find();

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
        ]);

        $query->andFilterWhere(['like', 'TenNhanVatLichSu', $this->TenNhanVatLichSu])
            ->andFilterWhere(['like', 'Code', $this->Code])
            ->andFilterWhere(['like', 'MoTa', $this->MoTa])
            ->andFilterWhere(['like', 'AnhDaiDien', $this->AnhDaiDien])
            ->andFilterWhere(['like', 'Title', $this->Title])
            ->andFilterWhere(['like', 'Alt', $this->Alt]);

        return $dataProvider;
    }
}
