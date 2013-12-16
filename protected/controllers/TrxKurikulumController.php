<?php

class TrxKurikulumController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';

    /**
     * @return array action filters
     */
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
            'postOnly + delete', // we only allow deletion via POST request
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {
        return array(
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('index', 'view'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update'),
                'users' => array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete'),
                'users' => array('admin'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
//                if(isset($_REQUEST))
//                    print_r ($_REQUEST);
//                
        $model = new TrxKurikulum;

        // Uncomment the following line if AJAX validation is needed
        $this->performAjaxValidation($model);

        if (isset($_POST['TrxKurikulum'])) {
            $model->attributes = $_POST['TrxKurikulum'];
            if ($model->save()) {
                //hari
                if (TrxHariKurikulum::model()->isChecked()) {
                    foreach ($_REQUEST['TrxKurikulum']['hari'] as $key => $value) {
                        $new = new TrxHariKurikulum();
                        $new->kurikulum_id = $model->id;
                        $new->hari_id = $value;
                        $new->save();
                    }
                }
                //atribut
                if (TrxAtributKurikulum::model()->isChecked()) {
                    foreach ($_REQUEST['TrxKurikulum']['atribut'] as $key => $value) {
                        $new = new TrxAtributKurikulum();
                        $new->kurikulum_id = $model->id;
                        $new->atribut_id = $value;
                        $new->save();
                    }
                }

                //ruang
                if (TrxRuangKurikulum::model()->isChecked()) {
                    foreach ($_REQUEST['TrxKurikulum']['ruang'] as $key => $value) {
                        $new = new TrxRuangKurikulum();
                        $new->kurikulum_id = $model->id;
                        $new->ruang_kelas_id = $value;
                        $new->save();
                    }
                }

                $this->redirect(array('view', 'id' => $model->id));
            }
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        $this->performAjaxValidation($model);

        if (isset($_POST['TrxKurikulum'])) {
            $model->attributes = $_POST['TrxKurikulum'];
            if ($model->save()) {
                //drop TrxHariKurikulum
                TrxHariKurikulum::model()->deleteAll("kurikulum_id = $model->id");
                //drop TrxAtributKurikulum
                TrxAtributKurikulum::model()->deleteAll("kurikulum_id = $model->id");
                //drop TrxRuangKurikulum
                TrxRuangKurikulum::model()->deleteAll("kurikulum_id = $model->id");

                //hari
                if (TrxHariKurikulum::model()->isChecked()) {
                    foreach ($_REQUEST['TrxKurikulum']['hari'] as $key => $value) {
                        $new = new TrxHariKurikulum();
                        $new->kurikulum_id = $model->id;
                        $new->hari_id = $value;
                        $new->save();
                    }
                }
                //atribut
                if (TrxAtributKurikulum::model()->isChecked()) {
                    foreach ($_REQUEST['TrxKurikulum']['atribut'] as $key => $value) {
                        $new = new TrxAtributKurikulum();
                        $new->kurikulum_id = $model->id;
                        $new->atribut_id = $value;
                        $new->save();
                    }
                }

                //ruang
                if (TrxRuangKurikulum::model()->isChecked()) {
                    foreach ($_REQUEST['TrxKurikulum']['ruang'] as $key => $value) {
                        $new = new TrxRuangKurikulum();
                        $new->kurikulum_id = $model->id;
                        $new->ruang_kelas_id = $value;
                        $new->save();
                    }
                }

                $this->redirect(array('view', 'id' => $model->id));
            }
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        //drop TrxHariKurikulum
        TrxHariKurikulum::model()->deleteAll("kurikulum_id = $id");
        //drop TrxAtributKurikulum
        TrxAtributKurikulum::model()->deleteAll("kurikulum_id = $id");
        //drop TrxRuangKurikulum
        TrxRuangKurikulum::model()->deleteAll("kurikulum_id = $id");

        $this->loadModel($id)->delete();

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $criteria = new CDbCriteria;
        $criteria->compare('periode_id', penjadwalan::activePeriode()->id);

        $dataProvider = new CActiveDataProvider('TrxKurikulum', array(
            'criteria' => $criteria,
        ));
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new TrxKurikulum('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['TrxKurikulum']))
            $model->attributes = $_GET['TrxKurikulum'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return TrxKurikulum the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = TrxKurikulum::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param TrxKurikulum $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'trx-kurikulum-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
