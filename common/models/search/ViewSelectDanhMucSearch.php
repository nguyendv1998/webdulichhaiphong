<?php

namespace common\models\search;

use common\models\ViewSelectDanhMuc;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\DanhMuc;

/**
 * DanhMucSearch represents the model behind the search form of `common\models\DanhMuc`.
 */
class ViewSelectDanhMucSearch extends ViewSelectDanhMuc
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'DanhMucCha_id'], 'integer'],
            [['TenDanhMuc', 'Code'], 'safe'],
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
        $query = DanhMuc::find();

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
            'DanhMucCha_id' => $this->DanhMucCha_id,
        ]);

        $query->andFilterWhere(['like', 'TenDanhMuc', $this->TenDanhMuc])
            ->andFilterWhere(['like', 'Code', $this->Code]);

        return $dataProvider;
    }
}
