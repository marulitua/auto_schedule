<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="language" content="en" />
        <link ilo-full-src="images/favicon.ico" rel="SHORTCUT ICON" href="<?php echo Yii::app()->request->baseUrl; ?>/logo.ico" type="images/x-icon">
            <!-- blueprint CSS framework -->
            <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
            <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
            <!--[if lt IE 8]>
            <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
            <![endif]-->
            <?php
//            Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl . '/css/alertify.css');
//            Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl . '/css/alertify.default.css');
//            Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/alertify.min.js');
            ?>

            <!--
            
            <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/alertify.min.js"></script>
            <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/alertify.css" />
            <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/alertify.default.css"/>
             
            -->
            <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
            <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
                      
            <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/font-awesome.min.css"/>
            
            <style>
                #periode{
                    
                    font-size: 15pt;
                    left: 0px;
                    top: 0px;
                }
            </style>
            
            <?php
                //$baseScriptUrl=Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('ext.bootstrap.assets'));
//                Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/select2.min.js',CClientScript::POS_END);  
//                Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/css/select2.css',CClientScript::POS_END);  
            ?>

          

            <title><?php echo CHtml::encode($this->pageTitle); ?></title>


    </head>

    <body>

        <div class="container" id="page" style="height:auto;height:100%;min-height:100%;position:relative;border:1px solid;width: 996px;top: 0px;">

            <div id="header">
                <div id="logo"><?php //echo CHtml::encode(Yii::app()->name);            ?></div>
            </div><!-- header -->



            <div class="well-transparent row-fluid" style="background-color: #0055cc;">
                <div class="span-5" style="margin-left: -5px;">
                    <?php
                    $this->widget('ext.CDropDownMenu.CDropDownMenu', array(
                        // 'style' => 'vertical', // or default or navbar
                        'items' => array(
                            array(
                                'label' => 'Home',
                                'url' => Yii::app()->baseUrl . '/index.php',
                            ),
                            array(
                                'label' => 'Jadwal',
                                'url' => 'JavaScript:void(0);',
                                'items' => array(
                                    array(
                                        'label' => '1. Lihat Jadwal',
                                        'url' => Yii::app()->createUrl('schedule'),
                                    ),
                                    array(
                                        'label' => '2. Generate Jadwal',
                                        'url' => Yii::app()->createUrl('generate'),
                                    ),
                                ),
                            ),
                            array(
                                'label' => 'Data',
                                'url' => 'JavaScript:void(0);',
                                'items' => array(
                                        array(
                                            'label' => '1. Mata Kuliah',
                                            'url' => Yii::app()->createUrl('mataKuliah/admin'),
                                        ),
                                        array(
                                            'label' => '2. Dosen',
                                            'url' => Yii::app()->createUrl('dosen/admin'),
                                        ),
                                        array(
                                            'label' => '3. Ruang Kelas',
                                            'url' => Yii::app()->createUrl('ruangKelas/admin'),
                                        ),
                                        array(
                                            'label' => '4. Atribut',
                                            'url' => Yii::app()->createUrl('atribut/admin'),
                                        ),
                                ),
                            ),
                            array(
                                'label' => 'Help',
                                'url' => 'javaScript:void(0);',
                                'items' => array(      
                                    array('label' => 'Help',
                                        'url' => Yii::app()->createUrl('site/help'),
                                    ),
                                    array('label' => 'About',
                                        'url' => array('/site/page', 'view' => 'about'),
                                    ),
                                ),
                            ),
                            array('label' => 'Logout (' . Yii::app()->user->name . ')',
                                'url' => array('/site/logout'),
                                //'visible' => !Yii::app()->user->isGuest
                            ),
                        )
                    ));
                    ?>


                </div>



                <?php
//                $this->widget('zii.widgets.CMenu',array(
//			'items'=>array(
//				array('label'=>'Home', 'url'=>array('/site/index')),
//				array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),
//				array('label'=>'Contact', 'url'=>array('/site/contact')),
//				array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
//				array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
//			),
//		)); 
                ?>
            </div><!-- mainmenu -->
            <?php if (isset($this->breadcrumbs)): ?>
                <?php
                $this->widget('zii.widgets.CBreadcrumbs', array(
                    'links' => $this->breadcrumbs,
                ));
                ?><!-- breadcrumbs -->
            <?php endif ?>

<!--            <div class="well">

                <p class="lead">
                    <?php
//                    echo '<br>Tahun Ajar :  ' . Periode::model()->active()->tahun_ajar;
//                    echo '<br>Semester : ' . Periode::model()->active()->semester_id;
                    ?>
                </p>
            </div>-->
<font id="periode"><?php if(penjadwalan::activePeriode() != null) { $semester = penjadwalan::activePeriode()->semester_id == 1 ? 'Ganjil' : 'Genap'; echo 'Periode '; echo penjadwalan::activePeriode()->tahun_ajar.' semester '.$semester; } ?></font>;
            <?php
            echo $content;
            ?>

            <div class="clear"></div>

            <div id="footer">
                Copyright &copy; <?php echo date('Y'); ?> by Universitas Multimedia Nusantara.<br/>
                All Rights Reserved.<br/>
                <?php echo Yii::powered(); ?>
            </div><!-- footer -->

        </div><!-- page -->

    </body>
</html>