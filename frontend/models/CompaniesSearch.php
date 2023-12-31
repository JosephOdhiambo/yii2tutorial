<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Companies;

/**
 * CompaniesSearch represents the model behind the search form of `frontend\models\Companies`.
 */
class CompaniesSearch extends Companies
{
    /**
     * {@inheritdoc}
     */
    public $searchstring;
    public function rules()
    {
//        return [
//            [['company_id'], 'integer'],
//            [['company_name', 'company_email', 'company_address', 'company_created_date', 'company_status'], 'safe'],
//        ];
        return [
            [['searchstring'], 'safe'],
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
        $query = Companies::find();

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
            'company_id' => $this->company_id,
            'company_created_date' => $this->company_created_date,
        ]);

        $query->orFilterWhere(['like', 'company_name', $this->searchstring])
            ->orFilterWhere(['like', 'company_email', $this->searchstring])
            ->orFilterWhere(['like', 'company_address', $this->searchstring])
            ->orFilterWhere(['like', 'company_status', $this->searchstring])
            ->orFilterWhere(['like', 'company_created_date', $this->searchstring]);

        return $dataProvider;
    }
}
