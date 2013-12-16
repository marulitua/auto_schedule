<h1>Summary</h1>

<?php

echo '<div id="show" style="display:none">';

$model = new JadwalFail();

$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'jadwal-fail-grid',
    'dataProvider' => $model->summary($modelp->id),
    //'filter' => $model,
    'type' => 'striped bordered condensed',
    'template' => "{items}{summary}{pager}",
    'columns' => array(
        array(
            'header' => 'No',
            'value' => '$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)',
        ),
        array(
            //'name' => 'mata_kuliah',
            'header' => 'Mata Kuliah',
            'value' => '$data["mata_kuliah"]',
        ),
        array(
            'name' => 'sks',
        ),
        array(
            'header' => 'Jumlah Kelas',
            'value' => '$data["jumlah_kelas"]',
        ),
        array(
            'name' => 'praktek',
            'value' => '$data["praktek"] ? \'Praktek\' : \'Teori\'',
        ),
    ),
));
?>
</div>



<div class="well">

    <?php
    $criteria = new CDbCriteria();
    $criteria->order = "t.id DESC";
    
    $model = Log::model()->find($criteria);
    
    $this->widget('zii.widgets.CDetailView', array(
        'data' => $model,
        'attributes' => array(
            array(
                'name' => 'execute_time',
                'value' => $model->getTimeExecution(),
            ),
            'min_domain',
            'max_domain',
            'solved',
            'unsolved',
            'n_backtracking'
        ),
    ));
    ?>


</div>

<?php
//                        echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); 
$this->widget('bootstrap.widgets.TbButton', array(
    'id' => 'btnShow',
    'type' => 'primary',
    'label' => 'Show Unsolved',
));
?>

<?php
//                        echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); 
$this->widget('bootstrap.widgets.TbButton', array(
    'id' => 'btnHide',
    'type' => 'primary',
    'label' => 'Hide Unsolved',
    'htmlOptions' => array('class' => 'hide'),
));
?>

<?php

$this->widget('bootstrap.widgets.TbButton', array(
    'id' => 'btnClose',
    'type' => 'primary',
    'label' => 'Close ',
    'htmlOptions' => array('submit' => Yii::app()->createUrl('schedule/close')),
));
?>