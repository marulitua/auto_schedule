<script type="text/javascript">
    
    
    $(document).ready(function(){
         window.setInterval(isRunning, 1000);
    });
    
    function isRunning() {
        $.ajax({
            url: "<?php echo Yii::app()->createUrl('generate/isRunning'); ?>",
            //data:,
            dataType: "json",
            success: function(data) {
                if (data) {
                    if (data == "true")
                        console.log('running');
                    else
                        //console.log('not running');
                        window.location = "<?php echo Yii::app()->createUrl("schedule") ?>";
                }
            },
        });
    }

    
</script>


<div style="height: 300px;width: 200px;font-size: 200px;margin-left: 40%;">
    <i class="fa fa-spinner fa-spin"></i>    
</div>
<h1 style="margin-left: 20%;">Sedang menyusun jadwal</h1>