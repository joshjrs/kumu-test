<?php

namespace backend\controllers;

use Yii;
use common\models\Event;
use common\models\EventGuest;
use common\models\Guest;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

class ReportController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
            ],
        ];
    }

    /**
     * Lists all EventGuest models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => EventGuest::find(),
        ]);

        $eventDataProvider = new ActiveDataProvider([
            'query' => Event::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'eventDataProvider' => $eventDataProvider
        ]);
    }

    /**
     * Displays a single EventGuest model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionEvent($id)
    {

        $page_size = Yii::$app->request->get('per-page');
        $page_size = isset($page_size) ? intval($page_size) : 30;

        $eventsDataProvider = new ActiveDataProvider([
            'query' => EventGuest::find()->andWhere(['event_id' => $id])->with('guest'),
            'pagination' => [
                'pageSize' => $page_size,
            ],
        ]);

        return $this->render('view', [
            'dataProvider' => $eventsDataProvider,
        ]);
    }

    /**
     * Finds the EventGuest model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return EventGuest the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = EventGuest::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
