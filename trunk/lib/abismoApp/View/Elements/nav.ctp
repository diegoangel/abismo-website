
            <nav>
                <ul>
                    <?php $request = $this->request['controller']; ?>
                    <li><a href="/estudio" class="<?php echo ($request == 'studio') ? 'active' : '' ?>">Estudio</a></li>
                    <li><a href="/proyectos" class="<?php echo ($request == 'projects') ? 'active' : '' ?>">Proyectos</a></li>
                    <li><a href="/concursos" class="<?php echo ($request == 'tenders') ? 'active' : '' ?>">Concursos</a></li>
                    <li><a href="javascript:void(0)" class="btnContact">Contacto</a></li>
                </ul>
            </nav>
