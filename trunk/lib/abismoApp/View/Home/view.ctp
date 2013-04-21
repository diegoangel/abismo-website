        <div class="imgBg">
            <?php
                echo $this->Html->link(
                    $this->Html->image(
                        $data['image'], 
                        array('alt' => $data['alt'])
                    ), 
                    '/proyectos/detalle/' . $data['id'] . '-' . $this->Slug->transform($data['title']),
                    array('escape' => false)
                );
            ?>        
        </div>
        <div class="titleBg">
            <?php echo $this->Html->link(
                    $data['alt'], 
                    '/proyectos/detalle/' . $data['id'] . '-' . $this->Slug->transform($data['title']), 
                    array('escape' => false)
                ); 
            ?> 
        </div> 
