<?php

namespace frontend\controllers;
use frontend\models\Branches;
use Yii;
use frontend\models\Companies;
use frontend\models\CompaniesSearch;
use yii\web\Controller;
use yii\web\ForbiddenHttpException;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\UploadForm;
use yii\web\UploadedFile;

/**
 * CompaniesController implements the CRUD actions for Companies model.
 */
class CompaniesController extends Controller
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
     * Lists all Companies models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new CompaniesSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Companies model.
     * @param int $company_id Company ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($company_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($company_id),
        ]);
    }

    /**
     * Creates a new Companies model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        if (Yii::$app->user->can('create-company')) {
            $model = new Companies();
            $branch = new Branches();

            if ($this->request->isPost) {
                if ($model->load($this->request->post()) && $branch->load($this->request->post())) {
                    // get the instance of the uploaded file
                    $imageName = $model->company_name;
                    $model->file = UploadedFile::getInstance($model, 'file');

                    if ($model->file !== null) {
                        try {
                            $model->file->saveAs('uploads/' . $imageName . '.' . $model->file->extension);
                            // Save the path in the database column
                            $model->logo = 'uploads/' . $imageName . '.' . $model->file->extension;
                        } catch (\Exception $e) {
                            // Handle any exceptions that occur when saving the file, e.g., log the error.
                            Yii::error('Error saving the uploaded file: ' . $e->getMessage());
                        }
                    }

                    $model->company_created_date = date('Y-m-d h:m:s');
                    $model->save();

                    $branch->companies_company_id = $model->company_id;
                    $branch->branch_created_date = date('yyyy-MM-dd');
                    $branch->save();

                    return $this->redirect(['view', 'company_id' => $model->company_id]);
                }
            } else {
                $model->loadDefaultValues();
            }

            return $this->render('create', [
                'model' => $model,
                'branch' => $branch,
            ]);
        } else {
            throw new ForbiddenHttpException;
        }
    }

    /**
     * Updates an existing Companies model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $company_id Company ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($company_id)
    {
        $model = $this->findModel($company_id);
        $branch = new Branches();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            // The model has been successfully updated.
            Yii::$app->session->setFlash('success', 'Company updated successfully.');
            return $this->redirect(['view', 'company_id' => $model->company_id]);
        }

        return $this->render('update', [
            'model' => $model,
            'branch' => $branch,
        ]);
    }



    /**
     * Deletes an existing Companies model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $company_id Company ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($company_id)
    {
        $this->findModel($company_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Companies model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $company_id Company ID
     * @return Companies the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($company_id)
    {
        if (($model = Companies::findOne(['company_id' => $company_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
