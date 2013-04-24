    <section class="main">
    
    <div class="slider">
        <div id="galeria">
            <?php foreach($featuredTenders as $tender): ?>
            <div class="slide">
                <?php 
                    echo $this->Html->link(
                        $this->Html->image(
                            $tender['Image'][0]['filepath'], 
                            array(
                                'alt' => $tender['Image'][0]['alt'], 
                                'width' => '960', 
                                'height' => '410'
                            )
                        ),
                        '/concursos/detalle/'. $tender['Tender']['id'] . '-' . $this->Slug->transform($tender['Tender']['title']), 
                        array(
                            'escape' => false,
                        )
                    ); 
                ?> 
                    <span></span>
                    <?php 
                        echo $this->Html->image(
                            $tender['Image'][0]['filepath'], 
                            array('alt' => $tender['Image'][0]['alt'], 'width' => '960', 'height' => '410')
                        ); 
                    ?>
                </a>
                <div>
                    <h2><?php echo $tender['Tender']['title'] ?></h2>
                    <p><?php echo $tender['Tender']['subtitle'] ?></p>
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
        
        <h4>Más Concursos</h4>
            <ul class="listadoProyectos">
            <?php foreach($otherTenders as $tender): ?> 
                <li>                    
                  <?php 
                    if (!isset($tender['Image'][0])) {
                        $tender['Image'][0]['filepath'] = 'default-thumb.jpg';
                        $tender['Image'][0]['alt'] = 'Default';
                    }
                    echo $this->Html->link(
                        $this->Html->image(
                            $tender['Image'][0]['filepath'],                          
                            array(
                                'alt' => $tender['Image'][0]['alt'], 
                                'width' => '960', 
                                'height' => '410'
                            )
                        ) . 
                        '<span></span>' .                  
                        '<h2>' . $tender['Tender']['title'] . '</h2>' .
                        '<p>' . $tender['Tender']['subtitle'] . '</p>',
                        '/concursos/detalle/'. $tender['Tender']['id'] . '-' . $this->Slug->transform($tender['Tender']['title']), 
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
