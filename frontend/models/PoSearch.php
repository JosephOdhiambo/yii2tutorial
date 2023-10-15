<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Po;

/**
 * PoSearch represents the model behind the search form of `frontend\models\Po`.
 */
class PoSearch extends Po
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'description'], 'integer'],
            [['po_no'], 'safe'],
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
        // Create a query using the Po model
        $query = Po::find();

        // Define a data provider
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        // Load the search parameters into the model
        $this->load($params);

        // Validate the model
        if (!$this->validate()) {
            // Return an empty data provider if validation fails
            return $dataProvider;
        }

        // Add filtering conditions based on the search criteria
        $query->andFilterWhere([
            'id' => $this->id,
        ]);

        $query->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'po_no', $this->po_no]);

        // You can add more filtering conditions here if needed

        return $dataProvider;
    }
}
