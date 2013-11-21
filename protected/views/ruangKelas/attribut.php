<div class="well span">
    <?php
       
    ?>
</div>

<?php
    $this->layout = false;
    
    Yii::app()->clientScript->registerScript('client', "
        
        
    ");
?>

<?php 
        $this->widget('bootstrap.widgets.TbButton', array(
                            'id' => 'btnTest',
                            'type' => 'primary',
                            'label' => 'Test',
            
        ));

        
        $this->widget('bootstrap.widgets.TbGridView', array(
	'id'=>'atribut-grid',
	'dataProvider'=>$model->cariAtribut($id),
	'filter'=>$model,
        'type'=>'striped bordered condensed',
        'template'=>"{items}{summary}{pager}",
	'columns'=>array(
		//'id',
                array(
                  'header' => 'No',
                  'value'=>'$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)',                   
                ),
                array(
                  'header' => 'atribut',
                  'name' => 'atribut_id',
                  'value' => '$data->atribut->atribut'
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
                                'url'=>'Yii::app()->createUrl("ruangKelas/deleteAtribut", array("id"=>$data->id))',
                                'options' => array( 'ajax' => array('type' => 'get', 'url'=>'js:$(this).attr("href")', 'success' => 'js:function(data) { $.fn.yiiGridView.update("atribut-grid")}')),
                            ),
                        ),
		),
	),
));
