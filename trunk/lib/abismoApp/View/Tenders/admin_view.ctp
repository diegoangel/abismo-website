<div class="span3">
    <div class="well sidebar-nav">
        <ul class="nav nav-list">
            <li class="nav-header"><?php echo __('Actions'); ?></li>
            <li><?php echo $this->Html->link(__('Edit Tender'), array('action' => 'edit', $tender['Tender']['id'])); ?> </li>
            <li><?php echo $this->Form->postLink(__('Delete Tender'), array('action' => 'delete', $tender['Tender']['id']), null, __('Are you sure you want to delete # %s?', $tender['Tender']['id'])); ?> </li>
            <li><?php echo $this->Html->link(__('List Tenders'), array('action' => 'index')); ?> </li>
            <li><?php echo $this->Html->link(__('New Tender'), array('action' => 'add')); ?> </li>
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
    </div>
    <dl>
        <dt><?php echo __('Id'); ?></dt>
        <dd>
            <?php echo h($tender['Tender']['id']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Title'); ?></dt>
        <dd>
            <?php echo h($tender['Tender']['title']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Subtitle'); ?></dt>
        <dd>
            <?php echo h($tender['Tender']['subtitle']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Location'); ?></dt>
        <dd>
            <?php echo h($tender['Tender']['location']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Project Idea And Management'); ?></dt>
        <dd>
            <?php echo h($tender['Tender']['project_idea_and_management']); ?>
            &nbsp;
        </dd>        
        <dt><?php echo __('Client'); ?></dt>
        <dd>
            <?php echo h($tender['Tender']['client']); ?>
            &nbsp;
        </dd>   
        <dt><?php echo __('Total Area'); ?></dt>
        <dd>
            <?php echo h($tender['Tender']['client']); ?>
            &nbsp;
        </dd> 
        <dt><?php echo __('Year'); ?></dt>
        <dd>
            <?php echo h($tender['Tender']['client']); ?>
            &nbsp;
        </dd>                       
        <dt><?php echo __('Proposal'); ?></dt>
        <dd>
            <?php echo h($tender['Tender']['proposal']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Featured'); ?></dt>
        <dd>
            <?php echo h($tender['Tender']['featured']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Active'); ?></dt>
        <dd>
            <?php echo h($tender['Tender']['active']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Created'); ?></dt>
        <dd>
            <?php echo h($tender['Tender']['created']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Modified'); ?></dt>
        <dd>
            <?php echo h($tender['Tender']['modified']); ?>
            &nbsp;
        </dd>
    </dl>
</div>
