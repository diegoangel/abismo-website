<div class="span3">
    <div class="well sidebar-nav">
        <ul class="nav nav-list">
            <li class="nav-header"><?php echo __('Actions'); ?></li>
            <li><?php echo $this->Html->link(__('List Projects'), array('action' => 'index')); ?></li>
            <li><?php echo $this->Html->link(__('List Images'), array('controller' => 'images', 'action' => 'index')); ?> </li>
            <li><?php echo $this->Html->link(__('New Image'), array('controller' => 'images', 'action' => 'add')); ?> </li>
            <li><?php echo $this->Html->link(__('List Videos'), array('controller' => 'videos', 'action' => 'index')); ?> </li>
            <li><?php echo $this->Html->link(__('New Video'), array('controller' => 'videos', 'action' => 'add')); ?> </li>
        </ul>
    </div>
</div>

<div class="span9">
    <?php echo $this->Session->flash(); ?>
    <?php echo $this->Form->create('Project'); ?>
        <fieldset>
            <legend><?php echo __('Add Project'); ?></legend>
        <?php
            echo $this->Form->input('title');
            echo $this->Form->input('subtitle');
            echo $this->Form->input('location');
            echo $this->Form->input('project_idea_and_management');
            echo $this->Form->input('client');
            echo $this->Form->input('total area');
            echo $this->Form->input('year');
            echo $this->Form->input('proposal');
            echo $this->Form->input('show_in_home');
            echo $this->Form->input('featured');
            echo $this->Form->input('active');
        ?>
        </fieldset>
    <?php echo $this->Form->end(__('Submit')); ?>
</div>


<script type="text/javascript">
tinyMCE.init({
        // General options
        mode : "textareas",
        theme : "advanced",
        language : "es",
        width : "640",
        height: "280",        
        convert_urls : false 
});
</script> 
