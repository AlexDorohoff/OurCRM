<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Client;

/**
 * ClientSearch represents the model behind the search form of `app\models\Client`.
 */
class ClientSearch extends Client
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_client', 'id_manager'], 'integer'],
            [['name', 'created', 'comment'], 'safe'],
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
        $query = Client::find();

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
            'id_client' => $this->id_client,
            'created' => $this->created,
            'id_manager' => $this->id_manager,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'comment', $this->comment]);

        return $dataProvider;
    }

    public function searchManagerId($id)
    {
        $query = Client::find();
        // add conditions that should always apply here
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        // grid filtering conditions
        $query->andFilterWhere([
            'id_manager' => $id,
        ]);
        return $dataProvider;
    }

    public function searchEventId($id)
    {
        $query = Client::find();
        // add conditions that should always apply here
        $eventDataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        // grid filtering conditions
        $query->andFilterWhere([
            'id_manager' => $id,
        ]);
        return $eventDataProvider;
    }
}
