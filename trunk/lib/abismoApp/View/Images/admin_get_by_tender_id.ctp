<div class="span3">
    <div class="well sidebar-nav">
        <ul class="nav nav-list">
            <li class="nav-header"><?php echo __('Actions'); ?></li>
            <li><?php echo $this->Html->link(__('New Image'), array('action' => 'add')); ?></li>
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
        <h1><?php echo __('Images') . ' de ' . $images[0]['Tender']['title']; ?></h1>
    </div>
    
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th><?php echo $this->Paginator->sort('id'); ?></th>
                <th><?php echo $this->Paginator->sort('referenced_type', 'Pertenece a'); ?></th>                
                <th><?php echo $this->Paginator->sort('title'); ?></th>
                <th><?php echo $this->Paginator->sort('type'); ?></th>
                <th style="text-align: center;"><?php echo $this->Paginator->sort('active' ,'Activa'); ?></th>
                <th style="text-align: center;"><?php echo $this->Paginator->sort('order', 'Orden'); ?></th>
                <th style="text-align: center;" class="actions"><?php echo __('Actions'); ?></th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($images as $image): ?>
            <tr>
                <td><?php echo h($image['Image']['id']); ?>&nbsp;</td>
                <td>
                    <?php
                        switch(h($image['Image']['referenced_type'])) {
                            case 'project':
                                echo '<span class="label label-info">Proyecto</span> ' . $image['Project']['title'];
                                break;
                            case 'tender':
                                echo '<span class="label label-important">Concurso</span> ' . $image['Tender']['title'];
                                break;
                        }
                    ?>
                &nbsp;</td>
                <td><?php echo h($image['Image']['title']); ?>&nbsp;</td>
                <td>
                <?php
                    switch(h($image['Image']['type'])) {
                        case 'home':
                            echo '<span class="label label-info">Home</span>';
                            break;
                        case 'slide':
                            echo '<span class="label label-warning">Destacada</span>';
                            break;
                        case 'thumb':
                            echo '<span class="label label-success">Thumb</span>';
                            break;
                    }
                ?>
                &nbsp;</td>
                <td style="text-align: center;"><?php echo (h($image['Image']['active'])) ? '<span class="label label-success"><i class="icon icon-white icon-ok"></i></span>' : '<span class="label label-important"><i class="icon icon-white icon-remove"></i></span>'; ?>&nbsp;</td>
                <td style="text-align: center;">
                    <div class="btn-group">
                    <?php 
                        if ($image['Image']['type'] == 'slide'):
                        echo $this->Html->link(
                            '<i class="icon-chevron-up"></i>',
                            '/admin/images/sort/' . $image['Image']['referenced_id'] . '/' . $image['Image']['referenced_type']  . '/' . $image['Image']['id'] . '/up',
                            array(
                                'escape' => false,
                                'class' => 'btn btn-small'
                            )
                        );
                        echo $this->Html->link(
                            '<i class="icon-chevron-down"></i>',
                            '/admin/images/sort/' . $image['Image']['referenced_id'] . '/' . $image['Image']['referenced_type']  . '/' . $image['Image']['id'] . '/down',
                            array(
                                'escape' => false,
                                'class' => 'btn btn-small'
                            )
                        );
                        endif;                                    
                     ?>
                     </div>
                </td>                 
                <td style="text-align: center;">
                    <div class="btn-group">  
                    <a id="modal[<?php echo $image['Image']['id'] ?>]" data-image="<?php echo $image['Image']['filepath'] ?>" class="btn btn-small" href="#!/view/<?php echo $image['Image']['id'] ?>">
                        <span class="icon-eye-open"></span>
                    </a>             

                    <?php echo $this->Html->link('<span class="icon-pencil"></span>', array('action' => 'edit', $image['Image']['id']), array('class' => 'btn btn-small', 'escape' => false)); ?>
                    
                    <?php echo $this->Form->postLink('<span class="icon-white icon-trash"></span>', array('action' => 'delete', $image['Image']['id']), array('class' => 'btn btn-danger btn-small', 'escape' => false), __('Are you sure you want to delete # %s?', $image['Image']['id'])); ?>
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

<!-- Modal -->
<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Vista Previa</h3>
  </div>
  <div class="modal-body">
  <!-- image html tag -->
  </div>
    <div class="modal-footer">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">Close</button>
    </div>
</div>

<script type="text/javascript">
    $('a[id^="modal"]').on('click', function() {
        $('.modal-body').html('<?php echo $this->Html->image('#', array('alt' => 'preview', 'id' => 'preview')); ?>');
        var src = $('#preview').attr('src');
        $('#preview').attr('src', src.substring(0, src.length-1) + $(this).data('image'));
        $('#myModal').modal('show');
    })
</script>
