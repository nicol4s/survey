<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <?php 
            App()->getClientScript()->registerPackage('jqueryui');
            App()->getClientScript()->registerPackage('qTip2');
            App()->getClientScript()->registerPackage('jquery-superfish');
            App()->getClientScript()->registerPackage('jquery-cookie');
            App()->getClientScript()->registerScriptFile(Yii::app()->getConfig('adminscripts') . "admin_core.js");
            App()->getClientScript()->registerCssFile(Yii::app()->getConfig('adminstyleurl') . "jquery-ui/jquery-ui.css" );
            App()->getClientScript()->registerCssFile(Yii::app()->getConfig('adminstyleurl') . "printablestyle.css", 'print');
            App()->getClientScript()->registerCssFile(Yii::app()->getConfig('styleurl') . "adminstyle.css" );
            App()->getClientScript()->registerCssFile(Yii::app()->getConfig('adminstyleurl') . "adminstyle.css" );
            App()->getClientScript()->registerCssFile(Yii::app()->getConfig('publicstyleurl') . 'jquery.multiselect.css');
            App()->getClientScript()->registerCssFile(Yii::app()->getConfig('publicstyleurl') . 'jquery.multiselect.filter.css');
            App()->getClientScript()->registerCssFile(Yii::app()->getConfig('adminstyleurl') .  "displayParticipants.css");

        ?>
        <link rel="shortcut icon" href="<?php echo App()->baseUrl; ?>images/favicon.ico" type="image/x-icon" />
        <link rel="icon" href="<?php echo App()->baseUrl; ?>images/favicon.ico" type="image/x-icon" />
        <?php
			$this->widget('ext.LimeScript.LimeScript');
			$this->widget('ext.LimeDebug.LimeDebug');
			App()->bootstrap->register();
		?>
        <title>Limesurvey Administration</title>
    </head>
    <body>
        <?php
            if (!App()->user->isGuest) {
                echo CHtml::openTag('nav');
                $this->widget('ext.yii-barmenu.BarMenu', array(
                    'items' => require __DIR__ . '/../menu.php',
                    'iconUrl' => App()->getConfig('adminimageurl')
                ));
                echo CHtml::closeTag('nav');
            }
		?>
        <div class="wrapper clearfix">
            <?php $this->widget('ext.FlashMessage.FlashMessage'); ?>
            <?php echo CHtml::tag('div', array('class' => 'maintitle titlebar'), App()->getConfig('sitename')); ?>
			<div id="content">
            <?php echo $content; ?>
            </div>
            <div id="ajaxprogress" title="Ajax request in progress" style="text-align: center">
                <img src="<?php echo Yii::app()->getConfig('adminstyleurl');?>/images/ajax-loader.gif"/>
            </div>
        </div>
        <?php $this->widget('ext.AdminFooter.AdminFooter'); ?>
    </body>

</html>
