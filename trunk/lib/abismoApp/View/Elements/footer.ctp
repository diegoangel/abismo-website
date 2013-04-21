    <footer>
        <div class="inner">
            <nav>
                <ul>
                    <?php $request = $this->request['controller']; ?>
                    <li><a href="/estudio" class="<?php echo ($request == 'studio') ? 'active' : '' ?>">Estudio</a></li>
                    <li><a href="/proyectos" class="<?php echo ($request == 'projects') ? 'active' : '' ?>">Proyectos</a></li>
                    <li><a href="/concursos" class="<?php echo ($request == 'tenders') ? 'active' : '' ?>">Concursos</a></li>
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
