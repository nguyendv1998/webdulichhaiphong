<?php

namespace common\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\LangNghe;

/**
 * LangNgheSearch represents the model behind the search form of `common\models\LangNghe`.
 */
class LangNgheSearch extends LangNghe
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'QuanHuyen_id', 'CapCongNhan_id'], 'integer'],
            [['TenLangNghe', 'TomTat', 'MoTaChiTiet', 'AnhDaiDien', 'ToaDo', 'Code', 'Alt', 'Title'], 'safe'],
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
        $query = LangNghe::find();

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
            'QuanHuyen_id' => $this->QuanHuyen_id,
            'CapCongNhan_id' => $this->CapCongNhan_id,
        ]);

        $query->andFilterWhere(['like', 'TenLangNghe', $this->TenLangNghe])
            ->andFilterWhere(['like', 'TomTat', $this->TomTat])
            ->andFilterWhere(['like', 'MoTaChiTiet', $this->MoTaChiTiet])
            ->andFilterWhere(['like', 'AnhDaiDien', $this->AnhDaiDien])
            ->andFilterWhere(['like', 'ToaDo', $this->ToaDo])
            ->andFilterWhere(['like', 'Code', $this->Code])
            ->andFilterWhere(['like', 'Alt', $this->Alt])
            ->andFilterWhere(['like', 'Title', $this->Title]);

        return $dataProvider;
    }
}
