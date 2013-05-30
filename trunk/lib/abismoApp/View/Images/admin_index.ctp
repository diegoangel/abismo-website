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
        <h1><?php echo __('Images'); ?></h1>
    </div>
    
    <div class="navbar">
        <div class="navbar-inner">
            <form action="#" method="post" class="navbar-search pull-right">
                <input type="hidden" name="ImageReferencedId" id="ImageReferencedId" value="">
                <input type="hidden" name="ImageReferencedId" id="ImageReferencedType" value="">
                <input type="text" data-provide="typeahead" autocomplete="off" placeholder="Buscar por Proyecto o Concurso" class="search-query">
            </form>
        </div>
    </div>
    
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th><?php echo $this->Paginator->sort('id'); ?></th>
                <th><?php echo $this->Paginator->sort('referenced_type', 'Pertenece a'); ?></th>
                <th><?php echo $this->Paginator->sort('title'); ?></th>
                <th><?php echo $this->Paginator->sort('type'); ?></th>
                <th><?php echo $this->Paginator->sort('active', 'Activa'); ?></th>
 
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

<?php
$linkToService =  $this->Html->url(array(
    'controller' => 'GetProjectsAndTendersService',
    'action' => 'getProjectsAndTenders',
    'admin' => false
));
?>

<script type="text/javascript">
    /**
     * Muestra una imagen en una ventana modal
     */
    $('a[id^="modal"]').on('click', function() {
        $('.modal-body').html('<?php echo $this->Html->image('#', array('alt' => 'preview', 'id' => 'preview')); ?>');
        var src = $('#preview').attr('src');
        $('#preview').attr('src', src.substring(0, src.length-1) + $(this).data('image'));
        $('#myModal').modal('show');
    })
    /**
     * Obtiene los datos necesarios para que funcione el plugin de 
     * sugerencias en el formulario de busqueda
     */
    $.get('<?php echo $linkToService ?>', function(data) {
        data = $.parseJSON(data)
        $('.search-query').typeahead({
            source: data,
            display: 'title',
            itemSelected: function(selected, value, text) {
                    $('#ImageReferencedId').val(value);
                    $('#ImageReferencedType').val(function() {
                        for (var i = 0; i < data.length; i++) {
                            if (data[i].title == text) {
                                return data[i].type
                            }
                        }
                    });
                },
            items: 10
        });  
    });
    /**
     * Gestor del envio de los datos del formulario de busqueda
     */
    $('.navbar-search').submit(function(){
        if ($('#ImageReferencedType').val() == 'project') {
            $(this).attr('action', "<?php echo $this->Html->url(array('admin' => true, 'controller' => 'images', 'action' => 'getByProjectId',)) ?>/" + $('#ImageReferencedId').val());
        } else {
            $(this).attr('action', "<?php echo $this->Html->url(array('admin' => true, 'controller' => 'images', 'action' => 'getByTenderId',)) ?>/" + $('#ImageReferencedId').val());
        }
        return true;
    });
</script>
