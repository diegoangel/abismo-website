<div class="span3">
    <div class="well sidebar-nav">
        <ul class="nav nav-list">
            <li class="nav-header"><?php echo __('Actions'); ?></li>
            <li><?php echo $this->Html->link(__('New User'), array('action' => 'add')); ?></li>
        </ul>
    </div>
</div>
<div class="span9">
    <?php echo $this->Session->flash(); ?>
    <div class="page-header">
        <h1><?php echo __('Usuarios'); ?></h1>
    </div>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th><?php echo $this->Paginator->sort('username', 'Usuario'); ?></th>
                <th style="text-align: center;"><?php echo $this->Paginator->sort('is_admin', 'Admin'); ?></th>
                <th style="text-align: center;"><?php echo $this->Paginator->sort('is_active', 'Activo'); ?></th>
                <th><?php echo $this->Paginator->sort('created', 'Creado'); ?></th>
                <th><?php echo $this->Paginator->sort('modified', 'Modificado'); ?></th>
                <th style="text-align: center;"><?php echo __('Actions'); ?></th>
            </tr>
        </thead>
        <tbody>    
        <?php
        foreach ($users as $user): ?>
            <tr>
                <td><?php echo h($user['User']['username']); ?>&nbsp;</td>
                <td style="text-align: center;"><?php echo (h($user['User']['is_admin'])) ? '<span class="label label-success"><i class="icon icon-white icon-ok"></i></span>' : '<span class="label label-important"><i class="icon icon-white icon-remove"></i></span>'; ?>&nbsp;</td>
                <td style="text-align: center;"><?php echo (h($user['User']['is_active'])) ? '<span class="label label-success"><i class="icon icon-white icon-ok"></i></span>' : '<span class="label label-important"><i class="icon icon-white icon-remove"></i></span>'; ?>&nbsp;</td>
                <td><?php echo h($this->Time->niceShort($user['User']['created'])); ?>&nbsp;</td>
                <td><?php echo h($this->Time->niceShort($user['User']['modified'])); ?>&nbsp;</td>
                <td style="text-align: center;">
                    <div class="btn-group">                      
                    <?php echo $this->Html->link('<span class="icon-eye-open"></span>', array('action' => 'view', $user['User']['id']), array('class' => 'btn btn-small', 'escape' => false)); ?>

                    <?php echo $this->Html->link('<span class="icon-pencil"></span>', array('action' => 'edit', $user['User']['id']), array('class' => 'btn btn-small', 'escape' => false)); ?>

                    <?php echo $this->Form->postLink('<span class="icon-white icon-trash"></span>', array('action' => 'delete', $user['User']['id']), array('class' => 'btn btn-danger btn-small', 'escape' => false), __('Are you sure you want to delete # %s?', $user['User']['id'])); ?>
                    </div>
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
                <?php echo $this->Paginator->prev(); ?>
                <?php echo $this->Paginator->numbers(); ?>
                <?php echo $this->Paginator->next(); ?>
                <?php echo $this->Paginator->last(); ?>
            </ul>
        </div>
    <?php endif ?>
</div>
