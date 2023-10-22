<?php

namespace frontend\controllers;
use kartik\form\ActiveForm;
use Mpdf\Tag\Br;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Yii;
use frontend\models\Branches;
use frontend\models\BranchesSearch;
use yii\helpers\Json;
use yii\web\Controller;
use yii\web\ForbiddenHttpException;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

/**
 * BranchesController implements the CRUD actions for Branches model.
 */
class BranchesController extends Controller
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
     * Lists all Branches models.
     *
     * @return string
     */
    public function actionIndex()
    {
//        $comments = Yii::$app->db2->createCommand("select * from `comments`")->queryAll();
//        print_r($comments);
//        die();


        $searchModel = new BranchesSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        if(Yii::$app->request->post('hasEditable'))
        {
            $branchId = Yii::$app->request->post('editableKey');
            $branch = Branches::findOne($branchId);


            $out = JSON::encode(['output' => '', 'message' => '']);
            $post = [];
            $posted = current($_POST['Branches']);
            $post['Branches'] = $posted;
            if($branch->load($post))
            {
                $branch->save();
            }
            echo $out;
            return;
        }

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Branches model.
     * @param int $branch_id Branch ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($branch_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($branch_id),
        ]);
    }

    /**
     * Creates a new Branches model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        if(Yii::$app->user->can('admin')){
            $model = new Branches();

            if ($this->request->isPost) {
                if ($model->load($this->request->post())) {
                    if($model->save()){
                        echo 1;
                    } else{
                        echo 0;
                    }
                }
            } else {
                $model->loadDefaultValues();
            }

            return $this->renderAjax('create', [
                'model' => $model,
            ]);
        } else{
            throw new ForbiddenHttpException;
        }
    }

    /**
     * Updates an existing Branches model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $branch_id Branch ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($branch_id)
    {
        $model = $this->findModel($branch_id);

        if ($this->request->isPost && $model->load($this->request->post())) {

            if($model->save()){
                echo 1;
            } else{
                echo 0;
            }
//            return $this->redirect(['view', 'branch_id' => $model->branch_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }


    public function actionImportExcel()
    {
        $inputFile = 'uploads/branches_file.xlsx';

        try {
            $spreadsheet = IOFactory::load($inputFile);
        } catch (Exception $e) {
            die('Error');
        }

        $worksheet = $spreadsheet->getActiveSheet();
        $highestRow = $worksheet->getHighestRow();
        $highestColumn = $worksheet->getHighestColumn();
        $data = []; // Initialize the data array as an empty array

        for ($row = 1; $row <= $highestRow; $row++) {
            $rowData = $worksheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, null, true, false);

            if ($row == 1) {
                continue; // Skip the header row
            }

            if(!empty($rowData[0][0])){
                $data[] = [ // Append data for the current row to the $data array
                    $rowData[0][0],
                    $rowData[0][1],
                    $rowData[0][2],
                    $rowData[0][3],
                    date('Y-m-d H:i:s'),
                    $rowData[0][4],
                ];
            }
            print_r($data);
        }

        Yii::$app->db
            ->createCommand()
            ->batchInsert('branches', ['branch_id', 'companies_company_id', 'branch_name', 'branch_address', 'branch_created_date', 'branch_status'], $data)
            ->execute();

        die('okay');
    }


    public function actionValidation(){
        $model = new Branches();
        if(Yii::$app->request->isAjax && $model->load(Yii::$app->request->post()))
        {
            Yii::$app->response->format = 'json';
            return ActiveForm::validate($model);
        }
    }

    /**
     * Deletes an existing Branches model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $branch_id Branch ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($branch_id)
    {
        $this->findModel($branch_id)->delete();

        return $this->redirect(['index']);
    }

    public function actionLists($id)
    {
        $countBranches = Branches::find()
            ->where(['companies_company_id' => $id])
            ->count();

        $branches = Branches::find()
            ->where(['companies_company_id' => $id])
            ->all();

        if($countBranches > 0){
            foreach($branches as $branch){
                echo "<option value='" . $branch->branch_id . "'>" . $branch->branch_name . "</option>";

            }
        }
    }



    /**
     * Finds the Branches model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $branch_id Branch ID
     * @return Branches the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($branch_id)
    {
        if (($model = Branches::findOne(['branch_id' => $branch_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionDisplayComments() {
        $comments = Yii::$app->db2->createCommand("select * from `comments`")->queryAll();

        $this->view->params['comments'] = $comments;

        return $this->render('comments');
    }


}
