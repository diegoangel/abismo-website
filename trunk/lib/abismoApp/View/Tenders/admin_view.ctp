<div class="tenders view">
<h2><?php  echo __('Tender'); ?></h2>
    <dl>
        <dt><?php echo __('Id'); ?></dt>
        <dd>
            <?php echo h($tender['Tender']['id']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Image'); ?></dt>
        <dd>
            <?php echo $this->Html->link($tender['Image']['id'], array('controller' => 'images', 'action' => 'view', $tender['Image']['id'])); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Video'); ?></dt>
        <dd>
            <?php echo $this->Html->link($tender['Video']['id'], array('controller' => 'videos', 'action' => 'view', $tender['Video']['id'])); ?>
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
        <dt><?php echo __('Headline'); ?></dt>
        <dd>
            <?php echo h($tender['Tender']['headline']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Description'); ?></dt>
        <dd>
            <?php echo h($tender['Tender']['description']); ?>
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
<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>
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
