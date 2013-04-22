<div class="span3">
    <div class="well sidebar-nav">
        <ul class="nav nav-list">
            <li class="nav-header"><?php echo __('Actions'); ?></li>
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
            <legend><?php echo __('Add Video'); ?></legend>
        <?php
            echo $this->Form->input('referenced_id');
            echo $this->Form->input('reference_type');
            echo $this->Form->input('title');
            echo $this->Form->input('embed_code');
            echo $this->Form->input('active');
        ?>
        </fieldset>
    <?php echo $this->Form->end(__('Submit')); ?>
</div>

<script type="text/javascript"> 
    $.get('/GetProjectsAndTendersService/getProjectsAndTenders', function(data) {
        data = $.parseJSON(data)
        $('#ImageBelongsToId').typeahead({
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
</script>
