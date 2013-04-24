<?php echo $this->Html->docType('html5'); ?>
<html>
    <head>
        <?php echo $this->Html->charset(); ?>   
        <title><?php echo __('ab.ismo Admin'); ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php echo $this->Html->css('bootstrap/bootstrap.css') ?>
        <style type="text/css">
            body{padding-top:60px;padding-bottom:40px}
            .sidebar-nav{padding:9px 0}
            #form-help{margin: 0 0 10px 6px}
        </style>
        <?php echo $this->Html->css('bootstrap/bootstrap-responsive.css') ?>
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <?php 
            echo $this->Html->meta('icon');
            echo $this->fetch('meta');
            echo $this->fetch('css');
            echo $this->Html->script('jquery-1.9.1.min.js');
            echo $this->Html->script('bootstrap/bootstrap.min.js');
            echo $this->Html->script('bootstrap/bootstrap.file-input.js');
            echo $this->Html->script('bootstrap/bootstrap.typeahead.js');
            echo $this->Html->script('tinymce/jquery.tinymce.js');
            echo $this->Html->script('tinymce/tiny_mce.js'); 
            echo $this->fetch('script');            
        ?>             
    </head>
    <body>
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container-fluid">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                    <?php echo $this->Html->link(__('Admin'), array('controller' => 'dashboard', 'action' => 'index', 'admin' => true), array('class' => 'brand')); ?>
                    <div class="nav-collapse">
                        <?php if (isset($navbar)): ?>
                        <?php endif; ?>
                    </div>
                    <div class="nav-collapse pull-right">
                    </div>
                </div>
            </div>
        </div>     
        <div class="container-fluid">
            <div class="row-fluid">
                <?php echo $this->fetch('content'); ?>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row-fluid">
                <hr>
                <div class="pull-right">
                    <a href="http://www.inimainteractive.com/" class="label">© Inima Interactive</a>
                </div>
                <div>
                    <?php //echo str_replace('class="cake-sql-log"', 'class="table table-bordered table-striped"', $this->element('sql_dump')); ?>
                </div>                
            </div>
        </div>
        <script type="text/javascript">
            $(document).ready(function(){
                $("[rel=tooltip]").tooltip({ placement: 'right'});
            });         
        </script>
    </body>
</html>
