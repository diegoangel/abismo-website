        <div class="imgBg">
            <?php
                $disabled = '';
                $type = ($data['Image']['referenced_type'] == 'project') ? 'proyectos' : 'concursos';
                if(isset($data['Image']['filepath'])) {
                    if (!is_null($data['Image']['referenced_id'])) {
                        $link = '/' . $type . '/detalle/' . $data['Data']['id'] . '-' . $this->Slug->transform($data['Data']['title']);
                    } else if($data['Image']['link']) {
                        $link = 'http://' . $data['Image']['link'];
                    } else{
                        $link = '#';
                        $disabled = 'cursor:default;';
                    }                    
                    echo $this->Html->link(
                        $this->Html->image(
                            $data['Image']['filepath'], 
                            array('alt' => $data['Image']['alt'], 'id' => 'imgBg')
                        ), 
                        $link,
                        array('escape' => false, 'style' => $disabled)
                    );
                } else {
                    echo $this->Html->link(                    
                        $this->Html->image(
                            'default-home.jpg', 
                            array('alt' => 'default')
                        ), 
                        '/estudio',
                        array('escape' => false)
                    );                    
                }
            ?>        
        </div>
        <?php if(!empty($data['Image']['title'])): ?>
        <div class="titleBg">
            <?php
                echo $this->Html->link(
                    $data['Image']['title'], 
                    $link, 
                    array('escape' => false, 'style' => $disabled)
                ); 
            ?> 
        </div> 
        <?php endif; ?>
