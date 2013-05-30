    <footer>
        <div class="inner">
            <nav>
                <ul>
                    <?php $request = $this->request['controller']; ?>
                    <li>
                        <?php 
                            $studio = ($request == 'studio') ? 'active' : '';
                            echo $this->Html->link(
                                'Estudio',
                                '/estudio', 
                                array(
                                    'escape' => false,
                                    'class' => $studio
                                )
                            ); 
                        ?>
                    </li>
                    <li>
                        <?php 
                            $studio = ($request == 'projects') ? 'active' : '';
                            echo $this->Html->link(
                                'Proyecto',
                                '/proyectos', 
                                array(
                                    'escape' => false,
                                    'class' => $studio
                                )
                            ); 
                        ?>                    
                    </li>
                    <li>
                        <?php 
                            $studio = ($request == 'tenders') ? 'active' : '';
                            echo $this->Html->link(
                                'Concursos',
                                '/concursos', 
                                array(
                                    'escape' => false,
                                    'class' => $studio
                                )
                            ); 
                        ?>  
                    </li>

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
