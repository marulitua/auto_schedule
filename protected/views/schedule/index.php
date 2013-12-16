<style>

    #btnPrint{
        margin-left : 100px;
        margin-bottom: 10px;
    }

</style>


<?php


$modelp = new Periode();
if (!isset($_REQUEST['periode_id']))
    $modelp->id = penjadwalan::activePeriode()->id;
else
    $modelp->id = $_REQUEST['periode_id'];

Yii::app()->clientScript->registerScript('search', "

$('#btnShow').click(function(x  ){
    $('#show').toggle();
    
    $(this).addClass('hide');
    $('#btnHide').removeClass('hide');
});

$('#btnHide').click(function(x  ){
    $('#show').toggle();
    
    $(this).addClass('hide');
    $('#btnShow').removeClass('hide');
});

$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});

$('#btnPrint').click(function(){
    window.open('".Yii::app()->createUrl('schedule/report&id='.$modelp->id)."', '_blank');
});

");

echo CHtml::dropDownList('periode_id', 'periode_id', CHtml::listData($modelp->findAll(), 'id', 'periodename'), array(
    'class' => 'span2',
//                      'submit'=>array(Yii::app()->createUrl('schedule'), 'id'=>$model->id), // id - will be sent as part of URL
    'submit' => array(''), // id - will be sent as part of URL
    'params' => array('periode_id' => 'js: $(this).val()'), // license_id will be send via POST and its value is selected value of dropDown
    'options' => array($modelp->id => array('selected' => 'selected')), // CSRF turned on in main config
));

$this->widget('bootstrap.widgets.TbButton', array(
    'id' => 'btnPrint',
    'type' => 'primary',
    'icon' => 'print',
    'label' => 'Print ',
));
?>

<br>

<?php
if (!isset($_REQUEST['mata_kuliah_id']))
    $_REQUEST['mata_kuliah_id'] = "";
if (!isset($_REQUEST['dosen_id']))
    $_REQUEST['dosen_id'] = "";
if (!isset($_REQUEST['ruang_kelas_id']))
    $_REQUEST['ruang_kelas_id'] = "";
if (!isset($_REQUEST['hari_id']))
    $_REQUEST['hari_id'] = "";
?>

<?php echo CHtml::link('Advanced Search', '#', array('class' => 'search-button')); ?>
<div class="search-form" style="display:none">
<?php
echo CHtml::label("Mata Kuliah", 'mata_kuliah_id');
echo CHtml::dropDownList('mata_kuliah_id', 'mata_kuliah_id', Jadwal::model()->filterMataKuliah($modelp->id), array(
    'class' => 'span2',
//                      'submit'=>array(Yii::app()->createUrl('schedule'), 'id'=>$model->id), // id - will be sent as part of URL
    'submit' => array(''), // id - will be sent as part of URL
    'params' => array('mata_kuliah_id' => 'js: $("#mata_kuliah_id").val()', 'periode_id' => 'js:$("#periode_id").val()', 'hari_id' => 'js:$("#hari_id").val()', 'dosen_id' => 'js:$("#dosen_id").val()', 'ruang_kelas_id' => 'js:$("#ruang_kelas_id").val()'), // license_id will be send via POST and its value is selected value of dropDown
    'options' => array($_REQUEST['mata_kuliah_id'] => array('selected' => 'selected')), // CSRF turned on in main config
));

echo CHtml::label("Dosen", "dosen_id");
echo CHtml::dropDownList('dosen_id', 'dosen_id', Jadwal::model()->filterDosen($modelp->id), array(
    'class' => 'span2',
//                      'submit'=>array(Yii::app()->createUrl('schedule'), 'id'=>$model->id), // id - will be sent as part of URL
    'submit' => array(''), // id - will be sent as part of URL
    'params' => array('mata_kuliah_id' => 'js: $("#mata_kuliah_id").val()', 'periode_id' => 'js:$("#periode_id").val()', 'hari_id' => 'js:$("#hari_id").val()', 'dosen_id' => 'js:$("#dosen_id").val()', 'ruang_kelas_id' => 'js:$("#ruang_kelas_id").val()'), // license_id will be send via POST and its value is selected value of dropDown
    'options' => array($_REQUEST['dosen_id'] => array('selected' => 'selected')), // CSRF turned on in main config
));

echo CHtml::label("Hari", "hari_id");
echo CHtml::dropDownList('hari_id', 'hari_id', Jadwal::model()->filterHari($modelp->id), array(
    'class' => 'span2',
//                      'submit'=>array(Yii::app()->createUrl('schedule'), 'id'=>$model->id), // id - will be sent as part of URL
    'submit' => array(''), // id - will be sent as part of URL
    'params' => array('mata_kuliah_id' => 'js: $("#mata_kuliah_id").val()', 'periode_id' => 'js:$("#periode_id").val()', 'hari_id' => 'js:$("#hari_id").val()', 'dosen_id' => 'js:$("#dosen_id").val()', 'ruang_kelas_id' => 'js:$("#ruang_kelas_id").val()'), // license_id will be send via POST and its value is selected value of dropDown
    'options' => array($_REQUEST['hari_id'] => array('selected' => 'selected')), // CSRF turned on in main config
));

echo CHtml::label("Ruang Kelas", "ruang_kelas_id");
echo CHtml::dropDownList('ruang_kelas_id', 'ruang_kelas_id', Jadwal::model()->filterRuangKelas($modelp->id), array(
    'class' => 'span2',
//                      'submit'=>array(Yii::app()->createUrl('schedule'), 'id'=>$model->id), // id - will be sent as part of URL
    'submit' => array(''), // id - will be sent as part of URL
    'params' => array('mata_kuliah_id' => 'js: $("#mata_kuliah_id").val()', 'periode_id' => 'js:$("#periode_id").val()', 'hari_id' => 'js:$("#hari_id").val()', 'dosen_id' => 'js:$("#dosen_id").val()', 'ruang_kelas_id' => 'js:$("#ruang_kelas_id").val()'), // license_id will be send via POST and its value is selected value of dropDown
    'options' => array($_REQUEST['ruang_kelas_id'] => array('selected' => 'selected')), // CSRF turned on in main config
));
?>
</div><!-- search-form -->


    <?php
    $model = new Jadwal();
    $model->mata_kuliah_id = $_REQUEST['mata_kuliah_id'];
    $model->hari_id = $_REQUEST['hari_id'];
    $model->ruang_kelas_id = $_REQUEST['ruang_kelas_id'];
    $model->dosen_id = $_REQUEST['dosen_id'];




    $this->widget('bootstrap.widgets.TbGridView', array(
        'id' => 'jadwal-grid',
        'dataProvider' => $model->search($modelp->id),
        //'filter' => $model,
        'type' => 'striped bordered condensed',
        'template' => "{items}{summary}{pager}",
        'columns' => array(
            array(
                'header' => 'No',
                'value' => '$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)',
            ),
//                'periode_id',
            array(
                'name' => 'mata_kuliah_id',
                'value' => '$data->mataKuliah->mata_kuliah',
                'filter' => Jadwal::model()->filterMataKuliah($modelp->id),
            ),
            array(
                'name' => 'dosen_id',
                'value' => '$data->dosen->full_name',
            ),
            array(
                'name' => 'hari_id',
                'value' => '$data->hari->hari',
            ),
            array(
                'name' => 'ruang_kelas_id',
                'value' => '$data->ruangKelas->number',
            ),
            array(
                'header' => 'Waktu',
                'value' => '$data->waktu($data->id)',
            ),
        ),
    ));

    if (penjadwalan::activePeriode() != null && $modelp->id == penjadwalan::activePeriode()->id && Jadwal::model()->count('periode_id = ' . penjadwalan::activePeriode()->id) > 0) {
        $this->renderPartial('summary', array('modelp' => $modelp));
    }
    ?>
