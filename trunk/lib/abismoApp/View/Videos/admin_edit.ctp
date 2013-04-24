<div class="span3">
    <div class="well sidebar-nav">
        <ul class="nav nav-list">
            <li class="nav-header"><?php echo __('Actions'); ?></li>
            <li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Video.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Video.id'))); ?></li>
            <li><?php echo $this->Html->link(__('List Videos'), array('action' => 'index')); ?></li>
            <li><?php echo $this->Html->link(__('List Projects'), array('controller' => 'projects', 'action' => 'index')); ?> </li>
            <li><?php echo $this->Html->link(__('New Project'), array('controller' => 'projects', 'action' => 'add')); ?> </li>
            <li><?php echo $this->Html->link(__('List Tenders'), array('controller' => 'tenders', 'action' => 'index')); ?> </li>
            <li><?php echo $this->Html->link(__('New Tender'), array('controller' => 'tenders', 'action' => 'add')); ?> </li>
        </ul>
    </div>
</div>

<div class="span9">
    <?php echo $this->Session->flash(); ?>
    <?php echo $this->Form->create('Video'); ?>
        <fieldset>
            <legend><?php echo __('Edit Video'); ?></legend>
        <?php
        echo $this->Form->input('id');
            echo $this->Form->hidden('referenced_id');
            echo $this->Form->hidden('referenced_type');
            echo $this->Form->input(
                'belongsToName',
                array(
                    'type' => 'text',
                    'label' => __('Related to ID'),
                    'autocomplete' => 'off',                    
                    'after' => '',
                    'help' => 'Comience a escribir el nombre del proyecto o concurso al cual desea relacionar la imagen e inmediatamente se desplegara una lista con las coincidencias encontradas.'
                )
            );
        echo $this->Form->input('title');
        echo $this->Form->input('embed_code');
        echo $this->Form->input('active');
        ?>
        </fieldset>
    <?php echo $this->Form->end(__('Submit')); ?>
</div>

<?php
$linkToService =  $this->Html->url(array(
    'controller' => 'GetProjectsAndTendersService',
    'action' => 'getProjectsAndTenders',
    'admin' => false
));
?>
<script type="text/javascript"> 
    $.get('<?php echo $linkToService ?>', function(data) {
        data = $.parseJSON(data)
        for (var j in data) {
            if (data[j].id == $('#VideoReferencedId').val() && data[j].type == $('#VideoReferencedType').val()) {
                $('#VideoBelongsToName').val(data[j].title);
            }
        }        
        $('#VideoBelongsToName').typeahead({
            source: data,
            display: 'title',
            itemSelected: function(selected, value, text) {
                    $('#VideoReferencedId').val(value);
                    $('#VideoReferencedType').val(function() {
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
</script>
