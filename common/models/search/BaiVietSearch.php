<?php

namespace common\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\BaiViet;

/**
 * BaiVietSearch represents the model behind the search form of `common\models\BaiViet`.
 */
class BaiVietSearch extends BaiViet
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'NguoiDang_id', 'NguoiSua_id', 'XuatBan', 'NoiBat', 'NhanVatLichSu_id', 'LangNghe_id', 'LeHoi_id', 'DiaDanh_id', 'Like'], 'integer'],
            [['TenBaiViet', 'TomTat', 'NoiDung', 'Code', 'AnhDaiDien', 'ThoiGianDang', 'ThoiGianChinhSua', 'Title', 'Alt'], 'safe'],
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
        $query = BaiViet::find();

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
        if($this->luot_like_tu!='')
            $query->andFilterWhere(['>=','Like',$this->luot_like_tu]);
        if($this->Like!='')
            $query->andFilterWhere(['<=','Like',$this->Like]);
        // grid filtering conditions
        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'ThoiGianDang' => $this->ThoiGianDang,
            'ThoiGianChinhSua' => $this->ThoiGianChinhSua,
            'NguoiDang_id' => $this->NguoiDang_id,
            'NguoiSua_id' => $this->NguoiSua_id,
            'XuatBan' => $this->XuatBan,
            'NoiBat' => $this->NoiBat,
            'NhanVatLichSu_id' => $this->NhanVatLichSu_id,
            'LangNghe_id' => $this->LangNghe_id,
            'LeHoi_id' => $this->LeHoi_id,
            'DiaDanh_id' => $this->DiaDanh_id,
        ]);

        $query->andFilterWhere(['like', 'TenBaiViet', $this->TenBaiViet])
            ->andFilterWhere(['like', 'TomTat', $this->TomTat])
            ->andFilterWhere(['like', 'NoiDung', $this->NoiDung])
            ->andFilterWhere(['like', 'Code', $this->Code])
            ->andFilterWhere(['like', 'AnhDaiDien', $this->AnhDaiDien])
            ->andFilterWhere(['like', 'Title', $this->Title])
            ->andFilterWhere(['like', 'Alt', $this->Alt]);

        return $dataProvider;
    }
}
