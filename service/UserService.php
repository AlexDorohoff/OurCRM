<?php

namespace app\service;

use Yii;
use app\models\User;
use app\models\UserSearch;

class UserService
{

    public static function actionUserIndexRequest()
    {
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ];
    }

    public static function findNameById($id)
    {
        $model = UserSearch::findOne($id);
        $name = $model->login;
        return $name;
    }
}