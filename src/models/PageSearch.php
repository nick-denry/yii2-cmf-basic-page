<?php

namespace nickdenry\cmf\pages\basic\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use nickdenry\cmf\pages\basic\models\Page;

/**
 * PageSearch represents the model behind the search form of `nickdenry\cmf\pages\basic\models\Page`.
 */
class PageSearch extends Page
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['title', 'teaser', 'body', 'alias', 'is_published', 'created_at', 'updated_at'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = Page::find();

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
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'teaser', $this->teaser])
            ->andFilterWhere(['like', 'body', $this->body])
            ->andFilterWhere(['like', 'alias', $this->alias])
            ->andFilterWhere(['like', 'is_published', $this->is_published]);

        return $dataProvider;
    }
}
