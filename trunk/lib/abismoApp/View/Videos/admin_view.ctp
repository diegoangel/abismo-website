<div class="span3">
    <div class="well sidebar-nav">
        <ul class="nav nav-list">
            <li class="nav-header"><?php echo __('Actions'); ?></li>
            <li><?php echo $this->Html->link(__('Edit Video'), array('action' => 'edit', $video['Video']['id'])); ?> </li>
            <li><?php echo $this->Form->postLink(__('Delete Video'), array('action' => 'delete', $video['Video']['id']), null, __('Are you sure you want to delete # %s?', $video['Video']['id'])); ?> </li>
            <li><?php echo $this->Html->link(__('List Videos'), array('action' => 'index')); ?> </li>
            <li><?php echo $this->Html->link(__('New Video'), array('action' => 'add')); ?> </li>
        </ul>
    </div>
</div>
<div class="span9">
    <?php echo $this->Session->flash(); ?>
    <div class="page-header">
        <h1><?php  echo __('Video'); ?></h1>
    </div>
    <dl>
        <dt><?php echo __('Id'); ?></dt>
        <dd>
            <?php echo h($video['Video']['id']); ?>
            &nbsp;
        </dd>
        <?php if ($video['Video']['referenced_type'] == 'project'): ?>     
        <dt><?php echo __('Project'); ?></dt>
        <dd>
            <?php echo $this->Html->link($video['Project']['title'], array('controller' => 'projects', 'action' => 'view', $video['Project']['id'])); ?>
            &nbsp;
        </dd>
        <?php else: ?>
        <dt><?php echo __('Tender'); ?></dt>
        <dd>
            <?php echo $this->Html->link($video['Tender']['title'], array('controller' => 'tenders', 'action' => 'view', $video['Tender']['id'])); ?>
            &nbsp;
        </dd>        
        <?php endif; ?>        
        <dt><?php echo __('Title'); ?></dt>
        <dd>
            <?php echo h($video['Video']['title']); ?>
            &nbsp;
        </dd>             
        <dt><?php echo __('Embed Code'); ?></dt>
        <dd>
            <?php echo $video['Video']['embed_code']; ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Active'); ?></dt>
        <dd>
            <?php echo h($video['Video']['active']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Created'); ?></dt>
        <dd>
            <?php echo $this->Time->niceShort($video['Video']['created']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Modified'); ?></dt>
        <dd>
            <?php echo $this->Time->niceShort($video['Video']['modified']); ?>
            &nbsp;
        </dd>
    </dl>
</div>
