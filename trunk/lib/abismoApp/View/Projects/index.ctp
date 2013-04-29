    <section class="main">
    
    <div class="slider">
        <div id="galeria">
            <?php foreach($featuredProjects as $project): ?>
            <div class="slide">
                <?php 
                    if (!isset($tender['Image'][0])) {
                        $tender['Image'][0]['filepath'] = 'default-thumb.jpg';
                        $tender['Image'][0]['alt'] = 'Default';
                    }                
                    echo $this->Html->link(
                        $this->Html->image(
                            $project['Image'][0]['filepath'], 
                            array(
                                'alt' => $project['Image'][0]['alt'], 
                                'width' => '960', 
                                'height' => '410'
                            )
                        ),
                        '/proyectos/detalle/'. $project['Project']['id'] . '-' . $this->Slug->transform($project['Project']['title']), 
                        array(
                            'escape' => false,
                        )
                    ); 
                ?>                
                    <span></span>
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
                  <?php 
                    if (!isset($project['Image'][0])) {
                        $project['Image'][0]['filepath'] = 'default-thumb.jpg';
                        $project['Image'][0]['alt'] = 'Default';
                    }
                    echo $this->Html->link(
                        $this->Html->image(
                            $project['Image'][0]['filepath'],                          
                            array(
                                'alt' => $project['Image'][0]['alt']
                            )
                        ) . 
                        '<span></span>' .                  
                        '<h2>' . $project['Project']['title'] . '</h2>' .
                        '<p>' . $project['Project']['subtitle'] . '</p>',
                        '/proyectos/detalle/'. $project['Project']['id'] . '-' . $this->Slug->transform($project['Project']['title']), 
                        array(
                            'escape' => false,
                        )
                    ); 
                    ?>
            </li>
            <?php endforeach; ?>
        </ul>
        <div class="fix"></div>
        <?php echo $this->element('paginator'); ?>      
        <div class="fix"></div>
    </section>
