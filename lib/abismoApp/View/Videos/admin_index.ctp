<div class="span3">
    <div class="well sidebar-nav">
        <ul class="nav nav-list">
            <li class="nav-header"><?php echo __('Actions'); ?></li>
            <li><?php echo $this->Html->link(__('New Video'), array('action' => 'add')); ?></li>
            <li class="divider"></li>              
            <li><?php echo $this->Html->link(__('List Projects'), array('controller' => 'projects', 'action' => 'index')); ?> </li>
            <li><?php echo $this->Html->link(__('New Project'), array('controller' => 'projects', 'action' => 'add')); ?> </li>
            <li class="divider"></li>  
            <li><?php echo $this->Html->link(__('List Tenders'), array('controller' => 'tenders', 'action' => 'index')); ?> </li>
            <li><?php echo $this->Html->link(__('New Tender'), array('controller' => 'tenders', 'action' => 'add')); ?> </li>
        </ul>
    </div>
</div>

<div class="span9">
    <?php echo $this->Session->flash(); ?>
    <div class="page-header">
        <h1><?php echo __('Videos'); ?></h1>
    </div>
    
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th><?php echo $this->Paginator->sort('id'); ?></th>
                <th><?php echo $this->Paginator->sort('referenced_type', 'Pertenece a'); ?></th>
                <th><?php echo $this->Paginator->sort('title'); ?></th>
                <th style="text-align: center;"><?php echo $this->Paginator->sort('active'); ?></th>
                <th style="text-align: center;" class="actions"><?php echo __('Actions'); ?></th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($videos as $video): ?>
            <tr>
                <td><?php echo h($video['Video']['id']); ?>&nbsp;</td>
                <td>
                    <?php
                        switch(h($video['Video']['referenced_type'])) {
                            case 'project':
                                echo '<span class="label label-info">Proyecto</span> ' . $video['Project']['title'];
                                break;
                            case 'tender':
                                echo '<span class="label label-important">Concurso</span> ' . $video['Tender']['title'];
                                break;
                        }
                    ?>
                &nbsp;</td>
                <td><?php echo h($video['Video']['title']); ?>&nbsp;</td>
                <td style="text-align: center;"><?php echo (h($video['Video']['active'])) ? '<span class="label label-success"><i class="icon icon-white icon-ok"></i></span>' : '<span class="label label-important"><i class="icon icon-white icon-remove"></i></span>'; ?>&nbsp;</td>
                <td style="text-align: center;">
                    <div class="btn-group"> 
                    <?php echo $this->Html->link('<span class="icon-eye-open"></span>', array('action' => 'view', $video['Video']['id']), array('class' => 'btn btn-small', 'escape' => false)); ?>

                    <?php echo $this->Html->link('<span class="icon-pencil"></span>', array('action' => 'edit', $video['Video']['id']), array('class' => 'btn btn-small', 'escape' => false)); ?>

                    <?php echo $this->Form->postLink('<span class="icon-white icon-trash"></span>', array('action' => 'delete', $video['Video']['id']), array('class' => 'btn btn-danger btn-small', 'escape' => false), __('Are you sure you want to delete # %s?', $video['Video']['id'])); ?>
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
