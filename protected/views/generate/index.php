<?php
/* @var $this GenerateController */

$this->breadcrumbs=array(
	'Generate',
);
?>


<script type="text/javascript">


    function doGenerate() {
        $.ajax({
            url: "<?php echo Yii::app()->createUrl('site/DoGenerate'); ?>",
            //data:,
            dataType: "json",
            success: function(data) {
                if (data) {
                    if (data[0] == "true") {
                        l.error("Generating...");
                        window.setInterval(isRunning, 5000);
                    }
                    else
                        if(data[0] == "-1")
                            l.error("YO MAMA IS SO FAT");
                        else
                            l.error("Something bad happen");
                }
            },
        });
    }

    function isRunning() {
        $.ajax({
            url: "<?php echo Yii::app()->createUrl('site/isRunning'); ?>",
            //data:,
            dataType: "json",
            success: function(data) {
                if (data) {
                    if (data[0] == "true")
                        l.error("running...");
                        //alert("running...");
                    else
                        if(data[0] == "-1")
                            l.error("YO MAMA IS SO FAT");
                        else
                            window.location = "<?php echo Yii::app()->createUrl("jadwalHasil/admin") ?>";
                            //l.error("not running...");
                         //alert("not runing...");
                }
            },
        });
    }

    $("#btnGenerate").live('click', function() {
        $.ajax({
            url: "<?php echo Yii::app()->createUrl('site/check'); ?>",
            //data:,
            dataType: "json",
            success: function(data) {
                if (data) {
                    if (data[0] != "true") {
                        var msg = "";
                        for (var i = 0; i < data.length; i++)
                            msg += data[i] + "<br>";
                        l.error(msg);
                    }
                    else
                        doGenerate();
                }
            },
        });
    });

</script>


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
   <!-- <div class="span-5" id="os">
        <div class="page" style="margin-top: 20px;margin-bottom: 20px;"> 
            <?php 
//            $this->widget('bootstrap.widgets.TbButton', array(
//                'type'=>'primary',
//                'id' => 'btnWaktu',
//                'label'=>'4. Tentukan Waktu Pengajar',
//                'block'=>true,
//                'icon' => 'time',
//                'buttonType' => 'submit',
//                'htmlOptions' => array(
//                        'style' => 'height:50px;'
//                ),
//                //'url' => 'asdasd'
//            )); 
            ?>
         </div>
    </div>
    -->
    <div class="span-5" style="margin-left:16%;margin-top: 20px;margin-bottom: 20px;">
   
        <?php
            $this->widget('bootstrap.widgets.TbButton', array(
                    'type'=>'primary',
                    'id' => 'btnGenerate',
                    'label'=>'Generate Jadwal',
                    'block'=>true,
                    'icon' => 'play-circle',
                    'disabled' => penjadwalan::isEnableBtnGenerate(),
                    'buttonType' => 'submit',
                    'htmlOptions' => array(
                        'style' => 'height:50px;'
                    ),
            )); 
        ?>
    </div>
</div>