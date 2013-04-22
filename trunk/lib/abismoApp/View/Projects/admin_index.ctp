<div class="span3">
    <div class="well sidebar-nav">
        <ul class="nav nav-list">
            <li class="nav-header"><?php echo __('Actions'); ?></li>
            <li><?php echo $this->Html->link(__('New Project'), array('action' => 'add')); ?></li>
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
        <h1><?php echo __('Projects'); ?></h1>
    </div>
    
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th><?php echo $this->Paginator->sort('id'); ?></th>
                <th><?php echo $this->Paginator->sort('title'); ?></th>
                <th><?php echo __('Imagenes'); ?></th>
                <th><?php echo $this->Paginator->sort('show_in_home'); ?></th>
                <th><?php echo $this->Paginator->sort('featured'); ?></th>
                <th><?php echo $this->Paginator->sort('active'); ?></th>
                <th class="actions"><?php echo __('Actions'); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($projects as $project): ?>
            <tr>
                <td><?php echo h($project['Project']['id']); ?>&nbsp;</td>
                <td><?php echo h($project['Project']['title']); ?>&nbsp;</td>
                <td><a href="/admin/images/getByProjectId/<?php echo $project['Project']['id'] ?>">Ver imagenes</a>&nbsp;</td>
                <td><?php echo (h($project['Project']['show_in_home'])) ? 'Si' : 'No'; ?>&nbsp;</td>
                <td><?php echo (h($project['Project']['featured'])) ? 'Si' : 'No'; ?>&nbsp;</td>
                <td><?php echo (h($project['Project']['active'])) ? 'Si' : 'No'; ?>&nbsp;</td>
                <td>
                    <?php echo $this->Html->link(__('View'), array('action' => 'view', $project['Project']['id']), array('class' => 'btn btn-info')); ?>
                </td>
                <td>
                    <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $project['Project']['id']), array('class' => 'btn btn-warning')); ?>
                </td>
                <td>
                    <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $project['Project']['id']), array('class' => 'btn btn-danger'), __('Are you sure you want to delete # %s?', $project['Project']['id'])); ?>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

     <div class="well">
        <?php echo $this->Paginator->counter(array('format' => __d('cake', 'Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}'))); ?>
    </div>
    <?php if ($this->Paginator->numbers()): ?>
        <div class="pagination">
            <ul>
                <?php echo $this->Paginator->first(); ?>
                <?php if($this->Paginator->hasPrev()): ?>
                    <?php echo $this->Paginator->prev(); ?>
                <?php endif; ?>
                <?php echo $this->Paginator->numbers(); ?>
                <?php if($this->Paginator->hasNext()): ?>
                    <?php echo $this->Paginator->next(); ?>                
                <?php endif; ?>
                <?php echo $this->Paginator->last(); ?>
            </ul>
        </div>
    <?php endif ?>
</div>

