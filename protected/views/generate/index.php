<?php
/* @var $this GenerateController */

$this->breadcrumbs=array(
	'Generate',
);
?>

<?php
//
/* @var $this SiteController */
$this->pageTitle = Yii::app()->name;
?>

<div class="row span-5" style="margin-left: 35%;">	
    <div class="span-5" id="os">
        <div class="page" style="margin-top: 20px;margin-bottom: 20px;">
            <?php 
                $this->widget('bootstrap.widgets.TbButton', array(
                    'type'=>'primary',
                    'id' => 'btnPeriode',
                    'label'=>'1. Tentukan Periode Perkuliahan',
                    'block'=>true,
                    'icon' => 'calendar',
                    'disabled' => penjadwalan::isEnableBtnPeriode(),
                    'buttonType' => 'submit',
                    'htmlOptions' => array(
                        'submit' => Yii::app()->createUrl('site/addPeriode'),
                        'style' => 'height:50px;'
                    ),
                )); 
                ?>
         </div>
    </div>
    <div class="span-5" id="os">
        <div class="page" style="margin-top: 20px;margin-bottom: 20px;">
            <?php $this->widget('bootstrap.widgets.TbButton', array(
                'type'=>'primary',
                'id' => 'btnKurikulum',
                'label'=>'2. Tentukan Kurikulum',
                'block'=>true,
                'icon' => 'list-alt',
                'disabled' => penjadwalan::isEnableBtnKurikulum(),
                'buttonType' => 'submit',
                'htmlOptions' => array(
                        'submit' => Yii::app()->createUrl('trxKurikulum/admin'),
                        'style' => 'height:50px;'
                ),
                //'url' => 'asdasd'
            )); ?>
         </div>
    </div>
    <div class="span-5" id="os">
        <div class="page" style="margin-top: 20px;margin-bottom: 20px;">
            <?php   
                $this->widget('bootstrap.widgets.TbButton', array(
                'type'=>'primary',
                'id' => 'btnDosen',
                'label'=>'3. Tentukan Pengajar',
                'block'=>true,
                'icon' => 'user',
                'disabled' => penjadwalan::isEnableBtnPengajar(),
                'buttonType' => 'submit',
                'htmlOptions' => array(
                        'submit' => Yii::app()->createUrl('trxPengajar/admin'),
                        'style' => 'height:50px;'
                ),
                //'url' => 'asdasd'
            )); ?>
         </div>
    </div>
    <div class="span-5" id="os">
        <div class="page" style="margin-top: 20px;margin-bottom: 20px;"> 
            <?php             
            $this->widget('bootstrap.widgets.TbButton', array(
                'type'=>'primary',
                'id' => 'btnWaktu',
                'label'=>'4. Tentukan Waktu Pengajar',
                'block'=>true,
                'icon' => 'time',
                'disabled' => penjadwalan::isEnableBtnWaktuPengajar(),
                'buttonType' => 'submit',
                'htmlOptions' => array(
                        'submit' => Yii::app()->createUrl('trxPengajarWaktu/admin'),
                        'style' => 'height:50px;'
                ),
                //'url' => 'asdasd'
            )); 
            ?>
         </div>
    </div>
    <div class="span-5" style="margin-left:16%;margin-top: 20px;margin-bottom: 20px;">
   
        <?php
            $this->widget('bootstrap.widgets.TbButton', array(
                    'type'=>'primary',
                    //'id' => 'btnGenerate',
                    'label'=>'Generate Jadwal',
                    'block'=>true,
                    'icon' => 'play-circle',
                    'disabled' => penjadwalan::isEnableBtnGenerate(),
                    'buttonType' => 'submit',
                    'htmlOptions' => array(
                        'style' => 'height:50px;',
                        'submit' => Yii::app()->createUrl('generate/doGenerate'),
                    ),
            )); 
        ?>
    </div>
</div>