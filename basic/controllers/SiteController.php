<?php

namespace app\controllers;

use phpDocumentor\Reflection\DocBlock\ExampleFinder;
use Yii;
use app\models\Category;
use app\models\CategorySearch;
use yii\base\BaseObject;
use yii\db\Query;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;


/**
 * SiteController implements the CRUD actions for Category model.
 */
class SiteController extends Controller
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
     * Lists all Category models.

     * @return mixed
     */
    public function actionIndex()
    {

        $searchModel = new CategorySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,

        ]);
    }

}
