<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'id'=>'ruang-kelas-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
        'type'=>'striped bordered condensed',
        'template'=>"{items}{summary}{pager}",
//	'columns'=>array(
//		//'id',
//                 array(
//                  'header' => 'No',
//                  'value'=>'$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)',                   
//                ),
//		//'praktek',
//		'number',
//                array(
//                    'name' => 'praktek',
//                    'value' => '$data->praktek == \'1\' ? \'Praktek\' : \'Teori\' ', 
//                    'filter'=>array(0=>'Teori', 1=>'Praktek'),
//                ),
//		//'gedung_id',
//                array(
//                    'name' => 'gedung_id',
//                    'value' => '$data->gedung->gedung'
//                ),
//		'lantai',
//		array(
//			'class'=>'bootstrap.widgets.TbButtonColumn',
//                        'htmlOptions'=>array('style'=>'width: 60px'),
//                        'template' => '{attribut}{view}{update}{delete}',
//                        'buttons' => array(
//                            'attribut' => array(
//                                'label' => 'attribut',
//                                'imageUrl' => false,
//                                //'class' => array('fancy-item'),
//                                'options'=>array('class' => 'fancy-item'), 
//                                'icon' => 'th-list',
//                                'url' => 'Yii::app()->createUrl("ruangKelas/attribut", array("id"=>$data->id))',
//                            ),
//                        ),
//		),
//	),
));