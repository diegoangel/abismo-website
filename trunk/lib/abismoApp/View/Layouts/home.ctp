<?php echo $this->Html->docType('html5'); ?>
<html>
<head>
    <?php echo $this->Html->charset(); ?>
    <title>
        <?php echo __('ab.ismo || Oficina de arquitectura'); ?>
    </title>
<!--[if lt IE 9]><script src="js/shiv.js"></script><![endif]-->    
    <?php
        echo $this->Html->meta('icon');
        echo $this->Html->meta('viewport', 'width=device-width, initial-scale=1.0');        
        echo $this->fetch('meta');
        echo $this->Html->css('reset.css');
        echo $this->Html->css('fonts.css');
        echo $this->Html->css('style.css');
        echo $this->fetch('css');
        echo $this->Html->script('jquery-1.9.1.min.js');
        echo $this->Html->script('scripts.js');
        echo $this->fetch('script');
    ?>
</head>
<body class="home">
    <header>
        <?php echo $this->element('contact') ?>
        <section class="inner">
            <h1><a href="/"><img src="/images/abismo-logo.png" alt="ab.ismo || Oficina de arquitectura"></a></h1>
            <nav>
                <ul>
                    <li><a href="estudio">Estudio</a></li>
                    <li><a href="proyectos">Proyectos</a></li>
                    <li><a href="concursos">Concursos</a></li>
                    <li><a href="javascript:void(0)" class="btnContact">Contacto</a></li>
                </ul>
            </nav>
        </section>
    </header>   
    <?php echo $this->Session->flash(); ?>
    <?php echo $this->fetch('content'); ?>
</body>
</html>
