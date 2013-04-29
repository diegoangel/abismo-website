<div class="span3">
    <div class="well sidebar-nav">
        <ul class="nav nav-list">
            <li class="nav-header"><?php echo __('Actions'); ?></li>
            <li><?php echo $this->Html->link(__('New Image'), array('action' => 'add')); ?></li>
            <li class="divider"></li>
            <li><?php echo $this->Html->link(__('List Projects'), array('controller' => 'projects', 'action' => 'index')); ?> </li>
            <li><?php echo $this->Html->link(__('New Project'), array('controller' => 'projects', 'action' => 'add')); ?> </li>
            <li class="divider"></li>            
            <li><?php echo $this->Html->link(__('List Tenders'), array('controller' => 'tenders', 'action' => 'index')); ?> </li>
            <li><?php echo $this->Html->link(__('New Tender'), array('controller' => 'tenders', 'action' => 'add')); ?> </li>
        </ul>
    </div>
</div>
<style>

</style>
<div class="span9">
    <?php echo $this->Session->flash(); ?>
    <div class="page-header">
        <h1><?php echo __('Images'); ?></h1>
    </div>
    <div class="btn-toolbar well">
        <div class="btn-group" id="filter" data-filter-group="type">
            <button type="button" class="btn active" data-filter="">Todo</button>       
            <button type="button" class="btn" data-filter=".home">Home</button>
            <button type="button" class="btn" data-filter=".slide">Destacadas</button>
            <button type="button" class="btn" data-filter=".thumb">Thumb</button>
        </div> 
        <div class="btn-group" id="filter" data-filter-group="referencedType">
            <button type="button" class="btn active" data-filter="">Todo</button>                  
            <button type="button" class="btn" data-filter=".project">Proyectos</button>
            <button type="button" class="btn" data-filter=".tender">Concursos</button>
        </div>
        <div class="btn-group" id="filter" data-filter-group="status">
            <button type="button" class="btn active" data-filter="">Todo</button>                  
            <button type="button" class="btn" data-filter=".active">Activas</button>
            <button type="button" class="btn" data-filter=".inactive">Inactivas</button>
        </div>
    </div>
    
    <ul class="thumbnails">
    <?php foreach($images as $image): ?>
        <li class="span2 thumbnail <?php echo $image['Image']['referenced_type'] ?> <?php echo $image['Image']['type'] ?> <?php echo ($image['Image']['active']) ? 'active' : 'inactive' ?>" data-id="<?php echo $image['Image']['id'] ?>">
            <?php
                echo $this->html->image(
                    'http://placehold.it/260x180',
                    array(
                        'alt' => $image['Image']['alt'],
                        'width' => '260',
                        'height' => '180'
                    )
                );
            ?>
        </li>
    <?php endforeach; ?>
    </ul>

</div>        
<script type="text/javascript">
    
$(window).load(function(){

    var $container = $('.thumbnails'),
    filters = {};

    $container.isotope({
        itemSelector : '.thumbnail'
    });

    // filter buttons
    $('#filter button').click(function(){
        
        var $this = $(this);
        // don't proceed if already selected
        if ( $this.hasClass('active') ) {
            return;
        }

        var $optionSet = $this.parents('#filter');
        // change selected class
        $optionSet.find('.active').removeClass('active');
        $this.addClass('active');

        // store filter value in object
        // i.e. filters.color = 'red'
        var group = $optionSet.attr('data-filter-group');
        filters[ group ] = $this.attr('data-filter');
        // convert object into array
        var isoFilters = [];
        for ( var prop in filters ) {
            isoFilters.push( filters[ prop ] )
        }
        var selector = isoFilters.join('');
        $container.isotope({ filter: selector });

        return false;
    });

    });

</script>
