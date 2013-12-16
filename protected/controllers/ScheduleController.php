<?php

class ScheduleController extends Controller {

    public function actionIndex() {
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

    public function actionclose() {

        if (Periode::model()->updateByPk(penjadwalan::activePeriode()->id, array('finished_time' => date_format(date_create(), 'Y-m-d H:i:s'))) > 0)
            $this->redirect(Yii::app()->createUrl('generate'));
    }

    public function actionreport() {
        $id = $_REQUEST['id'];
        $pdf = new HeaderFooter(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor("BAAK");
        $periode = "Jadwal Kuliah ";
        $periode .= Periode::model()->findByPk($id)->tahun_ajar;
        if(Periode::model()->findByPk($id)->semester_id == 1)
            $periode .= " Semester Ganjil";
        else
            $periode .= " Semester Genap";
        
        $pdf->SetTitle($periode);
        $pdf->SetSubject("Jadwal Kuliah");
        //$pdf->SetKeywords("Bill, Individual, " . ucwords($hotel->name) . ", Invoice");
        $pdf->setPrintHeader(true);
        $pdf->setPrintFooter(true);
        $pdf->AliasNbPages();

        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
        $pdf->AddPage();
        
//      ini untuk billing pada hotel-hotel umumny
        
        $count = Yii::app()->db->createCommand("select DISTINCT j.dosen_id from jadwal j where j.periode_id = $id")->queryAll();        
        for($i = 0; $i < count($count);$i++){
            $html .= $this->renderPartial('schedulePrint', array('dosen' => $count[$i]['dosen_id'], 'periode' => $id), true);
        }
//      ini untuk billing pada hotel-hotel Hapel Semer
//         $html = $this->renderPartial('billingPrintHapelSemer', array('vars' => $vars), true);

        $pdf->writeHTML($html, true, false, true, false);

        $pdf->Output('Billing_Individual_' . date("Y-m-d H:i:s", time()) . '.pdf', 'I');
    }

}
