<div class="span3">
    <div class="well sidebar-nav">
        <ul class="nav nav-list">
            <li class="nav-header"><?php echo __('Actions'); ?></li>
            <li><?php echo $this->Html->link(__('List Tenders'), array('action' => 'index')); ?></li>
            <li><?php echo $this->Html->link(__('List Images'), array('controller' => 'images', 'action' => 'index')); ?> </li>
            <li><?php echo $this->Html->link(__('New Image'), array('controller' => 'images', 'action' => 'add')); ?> </li>
            <li><?php echo $this->Html->link(__('List Videos'), array('controller' => 'videos', 'action' => 'index')); ?> </li>
            <li><?php echo $this->Html->link(__('New Video'), array('controller' => 'videos', 'action' => 'add')); ?> </li>
        </ul>
    </div>
</div>

<div class="span9">
    <?php echo $this->Session->flash(); ?>
<?php echo $this->Form->create('Tender'); ?>
    <fieldset>
        <legend><?php echo __('Add Tender'); ?></legend>
    <?php
        echo $this->Form->input('title');
        echo $this->Form->input('subtitle');
        echo $this->Form->input('location');
        echo $this->Form->input('project_idea_and_management');
        echo $this->Form->input('client');
            echo $this->Form->input('total area', array(
                'before' => '<div class="control-group input-append required">',
                'after' => '<span class="add-on"> m<sup>2</sup></span></div>',
                'div' => false
            ));
        echo $this->Form->input('year');
        echo $this->Form->input('proposal');
        echo $this->Form->input('featured', array(
            'help' => 'Marque esta casilla si desea que el concurso  aparezca en el slider de la pagina de concursos',
            'after' => ''
        ));
        echo $this->Form->input('active');
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>

