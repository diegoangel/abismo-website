<div class="span3">
    <div class="well sidebar-nav">
        <ul class="nav nav-list">
            <li class="nav-header"><?php echo __('Actions'); ?></li>
            <li><?php echo $this->Html->link(__('Edit Project'), array('action' => 'edit', $project['Project']['id'])); ?> </li>
            <li><?php echo $this->Form->postLink(__('Delete Project'), array('action' => 'delete', $project['Project']['id']), null, __('Are you sure you want to delete # %s?', $project['Project']['id'])); ?> </li>
            <li><?php echo $this->Html->link(__('List Projects'), array('action' => 'index')); ?> </li>
            <li><?php echo $this->Html->link(__('New Project'), array('action' => 'add')); ?> </li>
            <li><?php echo $this->Html->link(__('List Images'), array('controller' => 'images', 'action' => 'index')); ?> </li>
            <li><?php echo $this->Html->link(__('New Image'), array('controller' => 'images', 'action' => 'add')); ?> </li>
            <li><?php echo $this->Html->link(__('List Videos'), array('controller' => 'videos', 'action' => 'index')); ?> </li>
            <li><?php echo $this->Html->link(__('New Video'), array('controller' => 'videos', 'action' => 'add')); ?> </li>
        </ul>
    </div>
</div>

<div class="span9">
    <?php echo $this->Session->flash(); ?>
    <div class="page-header">
        <h1><?php  echo __('Project'); ?></h1>
    <dl>
        <dt><?php echo __('Id'); ?></dt>
        <dd>
            <?php echo h($project['Project']['id']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Title'); ?></dt>
        <dd>
            <?php echo h($project['Project']['title']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Subtitle'); ?></dt>
        <dd>
            <?php echo h($project['Project']['subtitle']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Location'); ?></dt>
        <dd>
            <?php echo h($project['Project']['location']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Project Idea And Management'); ?></dt>
        <dd>
            <?php echo h($project['Project']['project_idea_and_management']); ?>
            &nbsp;
        </dd>        
        <dt><?php echo __('Client'); ?></dt>
        <dd>
            <?php echo h($project['Project']['client']); ?>
            &nbsp;
        </dd>   
        <dt><?php echo __('Total Area'); ?></dt>
        <dd>
            <?php echo h($project['Project']['client']); ?>
            &nbsp;
        </dd> 
        <dt><?php echo __('Year'); ?></dt>
        <dd>
            <?php echo h($project['Project']['client']); ?>
            &nbsp;
        </dd>                       
        <dt><?php echo __('Proposal'); ?></dt>
        <dd>
            <?php echo h($project['Project']['proposal']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Show In Home'); ?></dt>
        <dd>
            <?php echo h($project['Project']['show_in_home']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Featured'); ?></dt>
        <dd>
            <?php echo h($project['Project']['featured']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Active'); ?></dt>
        <dd>
            <?php echo h($project['Project']['active']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Created'); ?></dt>
        <dd>
            <?php echo h($project['Project']['created']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Modified'); ?></dt>
        <dd>
            <?php echo h($project['Project']['modified']); ?>
            &nbsp;
        </dd>
    </dl>
</div>
