<div class="span3">
    <div class="well sidebar-nav">
        <ul class="nav nav-list">
            <li class="nav-header"><?php echo __('Actions'); ?></li>
            <li><?php echo $this->Html->link(__('New Project'), array('action' => 'add')); ?></li>
            <li class="divider"></li>  
            <li><?php echo $this->Html->link(__('List Images'), array('controller' => 'images', 'action' => 'index')); ?> </li>
            <li><?php echo $this->Html->link(__('New Image'), array('controller' => 'images', 'action' => 'add')); ?> </li>
            <li class="divider"></li>  
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
                <th style="text-align: center;"><?php echo __('Video'); ?></th>
                <th style="text-align: center;"><?php echo $this->Paginator->sort('featured'); ?></th>
                <th style="text-align: center;"><?php echo $this->Paginator->sort('active'); ?></th>
                <th style="text-align: center;"><?php echo $this->Paginator->sort('order', 'Orden'); ?></th>
                <th style="text-align: center;" class="actions"><?php echo __('Actions'); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($projects as $project): ?>
            <tr>
                <td><?php echo h($project['Project']['id']); ?>&nbsp;</td>
                <td><?php echo h($project['Project']['title']); ?>&nbsp;</td>
                <td>
                <?php
                $count = count($project['Image']);
                if ($count == 0) {
                    echo 'Sin imagenes';
                } else {
                    $text = ($count > 1) ? $count . ' imagenes' : $count . ' imagen';
                    echo $this->Html->link(
                        $text,
                        '/admin/images/getByProjectId/' . $project['Project']['id'],
                        array(
                            'escape' => false
                        )
                    );
                }
                ?>
                </td>
                <td style="text-align: center;"><?php echo (!empty($project['Video'])) ? '<span class="label label-success"><i class="icon icon-white icon-ok"></i></span>' : '<span class="label label-important"><i class="icon icon-white icon-remove"></i></span>';  ?></td>     
                <td style="text-align: center;"><?php echo (h($project['Project']['featured'])) ? '<span class="label label-success"><i class="icon icon-white icon-ok"></i></span>' : '<span class="label label-important"><i class="icon icon-white icon-remove"></i></span>'; ?>&nbsp;</td>
                <td style="text-align: center;"><?php echo (h($project['Project']['active'])) ? '<span class="label label-success"><i class="icon icon-white icon-ok"></i></span>' : '<span class="label label-important"><i class="icon icon-white icon-remove"></i></span>'; ?>&nbsp;</td>
                <td style="text-align: center;">
                    <div class="btn-group">
                    <?php 
                        echo $this->Html->link(
                            '<i class="icon-chevron-up"></i>',
                            '/admin/projects/sort/' . $project['Project']['id'] . '/up',
                            array(
                                'escape' => false,
                                'class' => 'btn btn-small'
                            )
                        );
                        echo $this->Html->link(
                            '<i class="icon-chevron-down"></i>',
                            '/admin/projects/sort/' . $project['Project']['id'] . '/down',
                            array(
                                'escape' => false,
                                'class' => 'btn btn-small'
                            )
                        );                                        
                     ?>
                     </div>
                </td>
                <td style="text-align: center;">
                    <div class="btn-group">                                         
                    <?php echo $this->Html->link('<span class="icon-eye-open"></span>', array('action' => 'view', $project['Project']['id']), array('class' => 'btn btn-small', 'escape' => false)); ?>

                    <?php echo $this->Html->link('<span class="icon-pencil"></span>', array('action' => 'edit', $project['Project']['id']), array('class' => 'btn btn-small', 'escape' => false)); ?>

                    <?php echo $this->Form->postLink('<span class="icon-white icon-trash"></span>', array('action' => 'delete', $project['Project']['id']), array('class' => 'btn btn-danger btn-small', 'escape' => false), __('Are you sure you want to delete # %s?', $project['Project']['id'])); ?>
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

