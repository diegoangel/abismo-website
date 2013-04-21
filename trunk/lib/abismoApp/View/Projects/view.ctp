    <section class="main">
        <div class="slider">
            <div id="galeria">
                <?php foreach($project['Image'] as $image): ?>
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
                <h2><?php echo $project['Project']['title'] ?></h2>
                <p><?php echo $project['Project']['subtitle'] ?></p>
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
            <?php echo $project['Project']['location']; ?>
            </p>
            
            <p>
            <strong>Proyecto y Dirección</strong><br>
            <?php echo $project['Project']['project_idea_and_management']; ?>
            </p>
            
            <p>
            <strong>Cliente</strong><br>
            <?php echo $project['Project']['client']; ?>
            </p>
            
            <p>
            <strong>Superficie total</strong><br>
            <?php echo $project['Project']['total_area']; ?>
            </p>
            
            <p>
            <strong>Año</strong><br>
            <?php echo $project['Project']['year']; ?>
            </p>
        </section>
        <section class="colMiddle">
            <h3>Propuesta</h3>
            <?php echo $project['Project']['proposal']; ?>
        </section>
        <section class="colRight">
            <?php if (count($project['Video']) > 0): ?>
            <h3>Video</h3>
            <?php echo $project['Video'][0]['embed_code']; ?>
            <?php endif; ?>
        </section>
        
        <div class="fix"></div>
    </section>
