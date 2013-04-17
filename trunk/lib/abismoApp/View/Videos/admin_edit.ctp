<div class="span3">
    <div class="well sidebar-nav">
        <ul class="nav nav-list">
            <li class="nav-header"><?php echo __('Actions'); ?></li>
            <li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Video.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Video.id'))); ?></li>
            <li><?php echo $this->Html->link(__('List Videos'), array('action' => 'index')); ?></li>
            <li><?php echo $this->Html->link(__('List Projects'), array('controller' => 'projects', 'action' => 'index')); ?> </li>
            <li><?php echo $this->Html->link(__('New Project'), array('controller' => 'projects', 'action' => 'add')); ?> </li>
            <li><?php echo $this->Html->link(__('List Tenders'), array('controller' => 'tenders', 'action' => 'index')); ?> </li>
            <li><?php echo $this->Html->link(__('New Tender'), array('controller' => 'tenders', 'action' => 'add')); ?> </li>
        </ul>
    </div>
</div>

<div class="span9">
    <?php echo $this->Session->flash(); ?>
    <?php echo $this->Form->create('Video'); ?>
        <fieldset>
            <legend><?php echo __('Edit Video'); ?></legend>
        <?php
        echo $this->Form->input('id');
        echo $this->Form->input('referenced_id');
        echo $this->Form->input('reference_type');
        echo $this->Form->input('title');
        echo $this->Form->input('embed_code');
        echo $this->Form->input('active');
        ?>
        </fieldset>
    <?php echo $this->Form->end(__('Submit')); ?>
</div>
