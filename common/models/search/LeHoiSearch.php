<?php

namespace common\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\LeHoi;

/**
 * LeHoiSearch represents the model behind the search form of `common\models\LeHoi`.
 */
class LeHoiSearch extends LeHoi
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'CapCongNhan_id', 'QuanHuyen_id'], 'integer'],
            [['TenLeHoi', 'Code', 'TomTat', 'NoiDungChiTiet', 'NgayBatDau', 'NgayKetThuc', 'AnhDaiDien', 'Title', 'Alt'], 'safe'],
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
        $query = LeHoi::find();

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
            'NgayBatDau' => $this->NgayBatDau,
            'NgayKetThuc' => $this->NgayKetThuc,
            'CapCongNhan_id' => $this->CapCongNhan_id,
            'QuanHuyen_id' => $this->QuanHuyen_id,
        ]);

        $query->andFilterWhere(['like', 'TenLeHoi', $this->TenLeHoi])
            ->andFilterWhere(['like', 'Code', $this->Code])
            ->andFilterWhere(['like', 'TomTat', $this->TomTat])
            ->andFilterWhere(['like', 'NoiDungChiTiet', $this->NoiDungChiTiet])
            ->andFilterWhere(['like', 'AnhDaiDien', $this->AnhDaiDien])
            ->andFilterWhere(['like', 'Title', $this->Title])
            ->andFilterWhere(['like', 'Alt', $this->Alt]);

        return $dataProvider;
    }
}
