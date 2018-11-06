<?php

namespace app\controllers;

use app\models\EventSearch;
use Yii;
use app\models\Event;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\db\StaleObjectException;
use app\models\User;
use app\service\EventService;
use yii\helpers\ArrayHelper;

/**
 * EventController implements the CRUD actions for Event model.
 */
class EventController extends SecurityController
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Event models.
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->render('index', EventService::actionEventIndexRequest());
    }

    /**
     * Displays a single Event model.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', EventService::actionEventViewRequest($id) //костыльно?
        );
    }

    /**
     * Creates a new Event model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Event();
        $user_name = User::findNameById(Yii::$app->user->identity->id_user);
        $this->takeStartParams($model);
        if ($this->dataControl($model)) {
            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id_event]);
            }
        }
        return $this->render('create', [
            'model' => $model,
            'user' => $user_name,
        ]);

    }

    /**
     * Updates an existing Event model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $answer = EventService::actionEventUpdateRequest($id);
        $action = ArrayHelper::getValue($answer, 'action');
        $model = ArrayHelper::getValue($answer, 'model');
        if ($action == 'redirect') {
            return $this->redirect(['view', 'id' => $model->id_event]);
        } elseif ($action == 'curr') {
            return $this->render('update', [
                'model' => $model,]);
        }

    }

    /**
     * Deletes an existing Event model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        return $this->redirect(['index']);
    }

    /**
     * Finds the Event model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Event the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
}