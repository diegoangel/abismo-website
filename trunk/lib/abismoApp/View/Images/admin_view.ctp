<div class="span3">
    <div class="well sidebar-nav">
        <ul class="nav nav-list">
            <li class="nav-header"><?php echo __('Actions'); ?></li>
            <li><?php echo $this->Html->link(__('Edit Image'), array('action' => 'edit', $image['Image']['id'])); ?> </li>
            <li><?php echo $this->Form->postLink(__('Delete Image'), array('action' => 'delete', $image['Image']['id']), null, __('Are you sure you want to delete # %s?', $image['Image']['id'])); ?> </li>
            <li><?php echo $this->Html->link(__('List Images'), array('action' => 'index')); ?> </li>
            <li><?php echo $this->Html->link(__('New Image'), array('action' => 'add')); ?> </li>
        </ul>
    </div>
</div>
<div class="span9">
    <?php echo $this->Session->flash(); ?>
    <div class="page-header">
        <h1><?php  echo __('Image'); ?></h1>
    </div>
    <dl>
        <dt><?php echo __('Id'); ?></dt>
        <dd>
            <?php echo h($image['Image']['id']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Project'); ?></dt>
        <dd>
            <?php echo $this->Html->link($image['Project']['title'], array('controller' => 'projects', 'action' => 'view', $image['Project']['id'])); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Referenced Type'); ?></dt>
        <dd>
            <?php echo h($image['Image']['referenced_type']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Filename'); ?></dt>
        <dd>
            <?php echo h($image['Image']['filename']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Filepath'); ?></dt>
        <dd>
            <?php echo h($image['Image']['filepath']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Alt'); ?></dt>
        <dd>
            <?php echo h($image['Image']['alt']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Active'); ?></dt>
        <dd>
            <?php echo h($image['Image']['active']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Created'); ?></dt>
        <dd>
            <?php echo h($image['Image']['created']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Modified'); ?></dt>
        <dd>
            <?php echo h($image['Image']['modified']); ?>
            &nbsp;
        </dd>
    </dl>
</div>
