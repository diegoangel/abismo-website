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
        <dt><?php echo __('Title'); ?></dt>
        <dd>
            <?php echo h($image['Image']['title']); ?>
            &nbsp;
        </dd>
        <?php if ($image['Image']['referenced_type'] == 'project'): ?>     
        <dt><?php echo __('Project'); ?></dt>
        <dd>
            <?php echo $this->Html->link($image['Project']['title'], array('controller' => 'projects', 'action' => 'view', $image['Project']['id'])); ?>
            &nbsp;
        </dd>
        <?php else: ?>
        <dt><?php echo __('Tender'); ?></dt>
        <dd>
            <?php echo $this->Html->link($image['Tender']['title'], array('controller' => 'tenders', 'action' => 'view', $image['Tender']['id'])); ?>
            &nbsp;
        </dd>        
        <?php endif; ?>
        <dt><?php echo __('Referenced Type'); ?></dt>
        <dd>
            <?php echo h($image['Image']['referenced_type']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Title'); ?></dt>
        <dd>
            <?php echo h($image['Image']['title']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Type'); ?></dt>
        <dd>
            <?php echo h($image['Image']['type']); ?>
            &nbsp;
        </dd>        
        <dt><?php echo __('Filepath'); ?></dt>
        <dd>
        <a href="#myModal" role="button" class="btn" data-toggle="modal">Ver imagen</a>
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
            <?php echo $this->Time->niceShort(h($image['Image']['created'])); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Modified'); ?></dt>
        <dd>
            <?php echo $this->Time->niceShort(h($image['Image']['modified'])); ?>
            &nbsp;
        </dd>
    </dl>
</div>


<!-- Modal -->
<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel"><?php echo $image['Image']['title'] ?></h3>
  </div>
  <div class="modal-body">
  <?php
        echo $this->Html->image(
                $image['Image']['filepath'], 
                array('alt' => $image['Image']['alt'])
            );
    ?>
  </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
    </div>
</div>
