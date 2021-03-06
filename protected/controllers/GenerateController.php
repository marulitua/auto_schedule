<?php

class GenerateController extends Controller
{
	public function actionIndex()
	{
		$this->render('index');
	}

        // Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
       
       public function actionDoGenerate(){
           
           // jika sedang menyusun jadwal tampilkan loading
           if(penjadwalan::IsRunning())
           {
               $this->render('loading');
           }
           // jika tidak lakukan generate
           else{
                $data = penjadwalan::Verifying();
           
                if(count($data) > 0){
                    $this->render("warning", array("data" => $data));
                }
                else{
                    $data = penjadwalan::Generate();

                    if($data['0'] == "true")
                        $this->render('loading');
                    else{
                         $this->render("error", array("data"=>$data));
                    }
                }
           }
       }
       
       public function actionIsRunning(){           
           if(penjadwalan::IsRunning())
               echo penjadwalan::renderJSON(array("true"));
           else
               echo penjadwalan::renderJSON(array("false"));
       }
}