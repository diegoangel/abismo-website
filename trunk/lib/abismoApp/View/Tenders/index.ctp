    <section class="main">
    
    <div class="slider">
        <div id="galeria">
            <?php foreach($featuredTenders as $tender): ?>
            <div class="slide">
                <a href="/concursos/detalle/<?php echo $tender['Tender']['id'] . '-' . $this->Slug->transform($tender['Tender']['title']) ?>">
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
        
        <h4>Más Proyectos</h4>
        <ul class="listadoProyectos">
            <?php foreach($otherTenders as $tender): ?> 
            <li>
                <a href="/concursos/detalle/<?php echo $tender['Tender']['id'] . '-' . $this->Slug->transform($tender['Tender']['title']) ?>">
                    <span></span>
                    <?php
                        if (!isset($tender['Image'][0])) {
                            $tender['Image'][0]['filepath'] = 'default-thumb.jpg';
                            $tender['Image'][0]['alt'] = 'Default';
                        }
                        
                        echo $this->Html->image(
                            $tender['Image'][0]['filepath'], 
                            array('alt' => $tender['Image'][0]['alt'], 'width' => '288', 'height' => '364')
                        ); 
                    ?>                    
                    <h2><?php echo $tender['Tender']['title'] ?></h2>
                    <p><?php echo $tender['Tender']['subtitle'] ?></p>
                </a>
            </li>
            <?php endforeach; ?>
        </ul>
        <div class="fix"></div>
        <?php echo $this->element('paginator'); ?>      
        <div class="fix"></div>
    </section>
