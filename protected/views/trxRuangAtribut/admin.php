<?php
/* @var $this TrxRuangAtributController */
/* @var $model TrxRuangAtribut */

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#trx-ruang-atribut-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});

$('#data').select2({tags:['".Atribut::model()->toSelect($id)."']});
$('input[id^=s2id_au]').width(480);



");
?>

<script type="text/javascript">
    
    $('#btnAdd').click(function(){

      $.ajax({
            url: "<?php echo Yii::app()->createUrl('trxRuangAtribut/add'); ?>",
            data: "id="+ <?php echo $_REQUEST['id']; ?> +"&data=" + $("#data").val(),
            dataType: "json",
            success: function(data) {
                //remove choice
                $('.select2-search-choice').remove();
                
                //reset width
                $('input[id^=s2id_au]').width(480);
                
                $.fn.yiiGridView.update('trx-ruang-atribut-grid');
            }
        });
        
    });
    
</script>

<div class="well" style="padding: 10px;left: 0px;right: 0px;">
    <h3>Tambah Atribut : </h3>
    <input type="text" id="data">
    <br>
    <?php
        $this->widget('bootstrap.widgets.TbButton', array(
             'buttonType' => 'submit',
             'id' => 'btnAdd',
             'type' => 'primary',
             //'label' => '',
             'icon' => 'plus-sign'
             //'options' => array( 'ajax' => array('type' => 'get', 'url'=>'js:$(this).attr("href")', 'success' => 'js:function(data) { $.fn.yiiGridView.update("my-grid")}')),
        ));
    ?>
    
</div>

<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'id'=>'trx-ruang-atribut-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
        'type'=>'striped bordered condensed',
        'template'=>"{items}{summary}{pager}",
	'columns'=>array(
		//'id',
                array(
                  'header' => 'No',
                  'value'=>'$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)',                   
                ),
		//'ruang_kelas_id',
		//'atribut_id',
                 array(
                  'header' => 'Atribut',
                  'name' => 'atribut_id',
                  'value' => 'ucfirst(strtolower($data->atribut->atribut))',
                  'filter' => TrxRuangAtribut::model()->CreateFilter($_REQUEST['id']),
                ),
                array(
 			'class'=>'bootstrap.widgets.TbButtonColumn',
                        'htmlOptions'=>array('style'=>'text-align:center;width: 10px'),
                        'template' => '{delete}',
                        'buttons' => array(
                            'delete' => array(
                                'label' => 'delete',
                                'imageUrl' => false,
                                //'class' => array('fancy-item'),
                                'options'=>array('class' => 'fancy-item'), 
                                'icon' => 'trash',
//                                'url' => 'Yii::app()->createUrl("ruangKelas/deleteAtribut", array("id"=>$data->id))',
                                'url'=>'Yii::app()->createUrl("TrxRuangAtribut/DeleteAtribut", array("id"=>$data->id))',
                                'options' => array( 'ajax' => array('type' => 'get', 'url'=>'js:$(this).attr("href")', 'success' => 'js:function(data) { $.fn.yiiGridView.update("trx-ruang-atribut-grid")}')),
                            ),
                        ),
		),
	),
)); ?>
