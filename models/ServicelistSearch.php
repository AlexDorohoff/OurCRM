<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;


/**
 * ServicelistSearch represents the model behind the search form of `app\models\Servicelist`.
 */
class ServicelistSearch extends Servicelist
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_servicelist', 'id_serviceset', 'id_service'], 'integer'],
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
        $query = Servicelist::find();

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
            'id_servicelist' => $this->id_servicelist,
            'id_serviceset' => $this->id_serviceset,
            'id_service' => $this->id_service,
        ]);

        return $dataProvider;
    }
}
