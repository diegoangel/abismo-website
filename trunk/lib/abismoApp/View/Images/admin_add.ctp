<div class="span3">
    <div class="well sidebar-nav">
        <ul class="nav nav-list">
            <li class="nav-header"><?php echo __('Actions'); ?></li>
            <li><?php echo $this->Html->link(__('List Images'), array('action' => 'index')); ?></li>
            <li><?php echo $this->Html->link(__('List Projects'), array('controller' => 'projects', 'action' => 'index')); ?> </li>
            <li><?php echo $this->Html->link(__('New Project'), array('controller' => 'projects', 'action' => 'add')); ?> </li>
            <li><?php echo $this->Html->link(__('List Tenders'), array('controller' => 'tenders', 'action' => 'index')); ?> </li>
            <li><?php echo $this->Html->link(__('New Tender'), array('controller' => 'tenders', 'action' => 'add')); ?> </li>
        </ul>
    </div>
</div>

<div class="span9">
    <?php echo $this->Session->flash(); ?>
    <?php echo $this->Form->create('Image', array('type' => 'file')); ?>
        <fieldset>
            <legend><?php echo __('Add Image'); ?></legend>
        <?php
            echo $this->Form->hidden('referenced_type');          
            echo $this->Form->input(
                'referenced_id',
                array(
                    'type' => 'text',
                    'label' => __('Related to ID'),
                    'data-provide' => 'typeahead'
                )
            );
            echo $this->Form->input(
                'type', 
                array('options' => array(
                    'home' => 'Home', 
                    'slide' => 'Destacada', 
                    'thumb' => 'Thumbnail'), 
                    'empty' => 'Seleccione un tipo',
                    'label' => __('Image type')
                )
            );     
            echo $this->Form->input(
                'image', 
                array(
                    'label' => __('Image'), 
                    'type' => 'file'
                )
            );
            echo $this->Form->input(
                'alt', 
                array('label' => __('Alternative text'))
            );
            echo $this->Form->input(
                'active', 
                array('label' => __('Active')));
        ?>
        </fieldset>
    <?php echo $this->Form->end(__('Submit')); ?>
</div>

