<?php

namespace app\controllers;

use app\models\Countrylanguage;
use app\models\CountrylanguageSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CountrylanguageController implements the CRUD actions for Countrylanguage model.
 */
class CountrylanguageController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Countrylanguage models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new CountrylanguageSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Countrylanguage model.
     * @param string $CountryCode Country Code
     * @param string $Language Language
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($CountryCode, $Language)
    {
        return $this->render('view', [
            'model' => $this->findModel($CountryCode, $Language),
        ]);
    }

    /**
     * Creates a new Countrylanguage model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Countrylanguage();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'CountryCode' => $model->CountryCode, 'Language' => $model->Language]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Countrylanguage model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $CountryCode Country Code
     * @param string $Language Language
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($CountryCode, $Language)
    {
        $model = $this->findModel($CountryCode, $Language);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'CountryCode' => $model->CountryCode, 'Language' => $model->Language]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Countrylanguage model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $CountryCode Country Code
     * @param string $Language Language
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($CountryCode, $Language)
    {
        $this->findModel($CountryCode, $Language)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Countrylanguage model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $CountryCode Country Code
     * @param string $Language Language
     * @return Countrylanguage the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($CountryCode, $Language)
    {
        if (($model = Countrylanguage::findOne(['CountryCode' => $CountryCode, 'Language' => $Language])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
