<?php

namespace common\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\DiaDanh;

/**
 * DiaDanhSearch represents the model behind the search form of `common\models\DiaDanh`.
 */
class DiaDanhSearch extends DiaDanh
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'CapCongNhan_id', 'QuanHuyen_id', 'DanhMuc_id', 'NhanVatLichSu_id', 'LoaiDiTich_id'], 'integer'],
            [['TenDiaDanh', 'ToaDo', 'TomTat', 'MoTaChiTiet', 'AnhDaiDien', 'Code', 'Title', 'Alt'], 'safe'],
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
        $query = DiaDanh::find();

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
            'CapCongNhan_id' => $this->CapCongNhan_id,
            'QuanHuyen_id' => $this->QuanHuyen_id,
            'DanhMuc_id' => $this->DanhMuc_id,
            'NhanVatLichSu_id' => $this->NhanVatLichSu_id,
            'LoaiDiTich_id' => $this->LoaiDiTich_id,
        ]);

        $query->andFilterWhere(['like', 'TenDiaDanh', $this->TenDiaDanh])
            ->andFilterWhere(['like', 'ToaDo', $this->ToaDo])
            ->andFilterWhere(['like', 'TomTat', $this->TomTat])
            ->andFilterWhere(['like', 'MoTaChiTiet', $this->MoTaChiTiet])
            ->andFilterWhere(['like', 'AnhDaiDien', $this->AnhDaiDien])
            ->andFilterWhere(['like', 'Code', $this->Code])
            ->andFilterWhere(['like', 'Title', $this->Title])
            ->andFilterWhere(['like', 'Alt', $this->Alt]);

        return $dataProvider;
    }
}
