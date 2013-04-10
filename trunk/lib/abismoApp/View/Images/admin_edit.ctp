<div class="span3">
    <div class="well sidebar-nav">
        <ul class="nav nav-list">
            <li class="nav-header"><?php echo __('Actions'); ?></li>
            <li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Image.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Image.id'))); ?></li>
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
    <?php echo $this->Form->create('Image'); ?>
        <fieldset>
            <legend><?php echo __('Edit Image'); ?></legend>
        <?php
            echo $this->Form->input('id');
            echo $this->Form->input('filename');
            echo $this->Form->input('filepath');
            echo $this->Form->input('alt');
            echo $this->Form->input('active');
        ?>
        </fieldset>
    <?php echo $this->Form->end(__('Submit')); ?>
</div>
