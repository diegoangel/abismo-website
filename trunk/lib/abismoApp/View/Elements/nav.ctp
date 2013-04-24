
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
            </nav>
