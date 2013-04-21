
    <section class="main">
        <div class="slider">
            <div id="galeria">
                <?php foreach($tender['Image'] as $image): ?>
                <div class="slide">
                <?php 
                    echo $this->Html->image(
                        $image['filepath'], 
                        array('alt' => $image['alt'], 'width' => '960', 'height' => '410')
                    ); 
                ?>
                </div>  
                <?php endforeach; ?>
            </div>
            <div class="title">
                <h2><?php echo $tender['Tender']['title'] ?></h2>
                <p><?php echo $tender['Tender']['subtitle'] ?></p>
            </div>
            <div class="pagination"></div>
            <div class="btns">
                <a href="javascript:void(0)" class="prev"></a>
                <a href="javascript:void(0)" class="next"></a>
            </div>
        </div>
        
        <section class="colLeft">
            
            <p>
            <strong>Ubicación</strong><br>
            <?php echo $tender['Tender']['location']; ?>
            </p>
            
            <p>
            <strong>Proyecto y Dirección</strong><br>
            <?php echo $tender['Tender']['project_idea_and_management']; ?>
            </p>
            
            <p>
            <strong>Cliente</strong><br>
            <?php echo $tender['Tender']['client']; ?>
            </p>
            
            <p>
            <strong>Superficie total</strong><br>
            <?php echo $tender['Tender']['total_area']; ?> m2
            </p>
            
            <p>
            <strong>Año</strong><br>
            <?php echo $tender['Tender']['year']; ?>
            </p>
        </section>
        <section class="colMiddle">
            <h3>Propuesta</h3>
            <?php echo $tender['Tender']['proposal']; ?>
        </section>
        <section class="colRight">
            <?php if (count($tender['Video']) > 0): ?>
            <h3>Video</h3>
            <?php echo $tender['Video'][0]['embed_code']; ?>
            <?php endif; ?>
        </section>
        
        <div class="fix"></div>
    </section>
