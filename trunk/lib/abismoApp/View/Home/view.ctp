        <div class="imgBg">
            <?php
                echo $this->Html->link(
                    $this->Html->image(
                        $project['Image'][0]['filepath'], 
                        array('alt' => $project['Image'][0]['alt'])
                    ), 
                    '/proyectos/detalle/' . $project['Project']['id'] . '-' . $this->Slug->transform($project['Project']['title']),
                    array('escape' => false)
                );
            ?>        
        </div>
        <div class="titleBg">
            <?php echo $this->Html->link(
                    $project['Image'][0]['alt'], 
                    '/proyectos/detalle/' . $project['Project']['id'] . '-' . $this->Slug->transform($project['Project']['title']), 
                    array('escape' => false)
                ); 
            ?> 
        </div> 
