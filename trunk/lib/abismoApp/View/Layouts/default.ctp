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
        echo $this->Html->script('jquery.carouFredSel-6.2.0-packed.js');
        echo $this->Html->script('scripts.js');
        echo $this->fetch('script');
    ?>
</head>
<body>
    <header>
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
    <div id="content">
        <?php echo $this->Session->flash(); ?>

        <?php echo $this->fetch('content'); ?>       
    </div>
    <footer>
        <div class="inner">
            <nav>
                <ul>
                    <li><a href="estudio" class="active">Estudio</a></li>
                    <li><a href="proyectos">Proyectos</a></li>
                    <li><a href="concursos">Concursos</a></li>
                    <li><a href="javascript:void(0)" class="btnContact">Contacto</a></li>
                </ul>
                <div class="fix"></div>
                <a href="#" target="_blank" class="facebook">Seguinos en Facebook</a>
                <a href="#" target="_blank" class="vimeo">Seguinos en Vimeo</a>
            </nav>
            
            <p>ab.ismo | oficina de arquitectura<br>
            Besares 2921 - C.A.B.A. - Argentina<br>
            Tel. (011) 20 66 69 17 | (011) 20 71 10 79<br>
            <a href="mailto:info@abismo.com.ar">info@abismo.com.ar</a></p>
        </div>
    </footer>    
    <section class="wrContact">
        <section class="contact">
            <a href="javascript:void(0)" class="btnClose">X Cerrar</a>
            <iframe width="300" height="272" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=es&amp;geocode=&amp;q=Besares+2921,+buenos+aires&amp;aq=&amp;sll=37.0625,-95.677068&amp;sspn=37.735377,86.044922&amp;ie=UTF8&amp;hq=&amp;hnear=Besares+2921,+Saavedra,+Buenos+Aires,+Argentina&amp;t=m&amp;ll=-34.546863,-58.475676&amp;spn=0.019229,0.025663&amp;z=14&amp;iwloc=A&amp;output=embed"></iframe>
            <h2>Contacto</h2>
            <p>ab.ismo<br>
            oficina de arquitectura<br>
            Besares 2921 <br>
            C.A.B.A. | Argentina<br>
            <br>
            Tel: (011) 2066-6917<br>
            <a href="mailto:info@abismo.com.ar">info@abismo.com.ar</a></p>
        </section>
    </section><!--End contact -->    
</body>
</html>
