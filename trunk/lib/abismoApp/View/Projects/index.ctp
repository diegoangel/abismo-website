    <section class="main">
    
    <div class="slider">
        <div id="galeria">
            <?php foreach($featuredProjects as $project): ?>
            <div class="slide">
                <a href="/proyectos/detalle/<?php echo $project['Project']['id'] . '-' . $this->Slug->transform($project['Project']['title']) ?>">
                    <span></span>
                    <?php 
                        echo $this->Html->image(
                            $project['Image'][0]['filepath'], 
                            array('alt' => $project['Image'][0]['alt'], 'width' => '960', 'height' => '410')
                        ); 
                    ?>
                </a>
                <div>
                    <h2><?php echo $project['Project']['title'] ?></h2>
                    <p><?php echo $project['Project']['subtitle'] ?></p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
            <div class="pagination"></div>
            <div class="btns">
                <a href="javascript:void(0)" class="prev"></a>
                <a href="javascript:void(0)" class="next"></a>
            </div>
        </div>
        
        <h4>Más Proyectos</h4>
        <ul class="listadoProyectos">
            <?php foreach($otherProjects as $project): ?> 
            <li>
                <a href="/proyectos/detalle/<?php echo $project['Project']['id'] . '-' . $this->Slug->transform($project['Project']['title']) ?>">
                    <span></span>
                    <?php
                        if (!isset($project['Image'][0])) {
                            $project['Image'][0]['filepath'] = 'default-thumb.jpg';
                            $project['Image'][0]['alt'] = 'Default';
                        }
                        
                        echo $this->Html->image(
                            $project['Image'][0]['filepath'], 
                            array('alt' => $project['Image'][0]['alt'], 'width' => '288', 'height' => '364')
                        ); 
                    ?>                    
                    <h2><?php echo $project['Project']['title'] ?></h2>
                    <p><?php echo $project['Project']['subtitle'] ?></p>
                </a>
            </li>
            <?php endforeach; ?>
        </ul>
        <div class="fix"></div>
    </section>
