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

<div class="row">	
    <div class="span-23 well" id="os">
        <div class="page">
            <?php $this->widget('bootstrap.widgets.TbButton', array(
                'type'=>'primary',
                'label'=>'1. Tentukan Periode Perkuliahan',
                'block'=>true,
                'url' => 'asdasd'
            )); ?>
         </div>
    </div>
    <div class="span-23 well" id="os">
        <div class="page">
            <?php $this->widget('bootstrap.widgets.TbButton', array(
                'type'=>'primary',
                'label'=>'2. Tentukan Kurikulum',
                'block'=>true,
                'url' => 'asdasd'
            )); ?>
         </div>
    </div>
    <div class="span-23 well" id="os">
        <div class="page">
            <?php $this->widget('bootstrap.widgets.TbButton', array(
                'type'=>'primary',
                'label'=>'3. Tentukan Pengajar',
                'block'=>true,
                'url' => 'asdasd'
            )); ?>
         </div>
    </div>
    <div class="span-23 well" id="os">
        <div class="page">
            <?php $this->widget('bootstrap.widgets.TbButton', array(
                'type'=>'primary',
                'label'=>'4. Tentukan Waktu Pengajar',
                'block'=>true,
                'url' => 'asdasd'
            )); ?>
         </div>
    </div>
    <div class="span-10" style="margin-left:40%;">
        <button id="btnGenerate" class="btn btn-large btn-primary"><i class="icon-play-circle"></i>Generate Jadwal</button>
    </div>
</div>
