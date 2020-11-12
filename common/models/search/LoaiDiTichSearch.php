<?php

namespace common\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\LoaiDiTich;

/**
 * LoaiDiTichSearch represents the model behind the search form of `common\models\LoaiDiTich`.
 */
class LoaiDiTichSearch extends LoaiDiTich
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['TenLoaiDiTich', 'MoTa', 'Code'], 'safe'],
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
        $query = LoaiDiTich::find();

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

        $query->andFilterWhere(['like', 'TenLoaiDiTich', $this->TenLoaiDiTich])
            ->andFilterWhere(['like', 'MoTa', $this->MoTa])
            ->andFilterWhere(['like', 'Code', $this->Code]);

        return $dataProvider;
    }
}
