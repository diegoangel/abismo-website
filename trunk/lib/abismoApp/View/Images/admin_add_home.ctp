<div class="span3">
    <div class="well sidebar-nav">
        <ul class="nav nav-list">
            <li class="nav-header"><?php echo __('Actions'); ?></li>
            <li><?php echo $this->Html->link(__('List Images'), array('action' => 'index')); ?></li>
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
    <?php echo $this->Form->create('Image', array('type' => 'file')); ?>
        <fieldset>
            <legend><?php echo __('Add Image') . ' de tipo Home'; ?></legend>
        <?php
            echo $this->Form->hidden('referenced_id');
            echo $this->Form->hidden('referenced_type');
            echo $this->Form->hidden('type', array('value' => 'home'));
            echo '<div class="btn-group" id="linkOptions">
                    <button type="button" class="btn active" data-option="sin">Imagen sin Link</button>       
                    <button type="button" class="btn" data-option="con">Imagen con Link</button>
                    <button type="button" class="btn" data-option="relacionado">Relacionado a Proyecto/Concurso</button>
                </div><br />'; 
            echo '<div id="sin">';
                echo '<div id="relacionado">';
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
                echo '</div>';  
                echo '<div id="con">';
                echo $this->Form->input(
                    'link',
                    array(
                        'type' => 'text',
                        'label' => false,
                        'autocomplete' => 'off',                    
                        'before' => '<label for="ImageLink">Link</label><div class="control-group input-prepend required"><span class="add-on"> http://</span>',
                        'after' => '</div>',
                        'class' => 'span2'
                    )
                );
                echo '</div>';
            echo '</div>';            
            echo $this->Form->input(
                'title', 
                array(
                    'autocomplete' => 'off',
                    'label' => __('Title')
                )
            );
            echo $this->Form->input(
                'filepath', 
                array(
                    'type' => 'file',
                    'autocomplete' => 'off'
                )
            );
            echo $this->Form->input(
                'alt', 
                array('label' => __('Alternative text'))
            );
            echo $this->Form->input(
                'active', 
                array('label' => __('Activa'))
            );
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
        $('#ImageBelongsToName').typeahead({
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
    
    $('#ImageBelongsToName').attr('disabled', 'disabled');
    $('#ImageLink').attr('disabled', 'disabled');
    $('#con').hide();
    $('#relacionado').hide();                    
  
    $('#linkOptions button').click(function(){
        
        var $this = $(this);
        // don't proceed if already selected
        if ($this.hasClass('active')) {
            return;
        }

        var $optionSet = $this.parents('#linkOptions');
        // change selected class
        $optionSet.find('.active').removeClass('active');
        $this.addClass('active');
        
        $linkOption = $this.attr('data-option');
        
        if ($linkOption == 'relacionado') {
            console.log('relacionado');
        // relacionado a un proyecto o concurso
            $('#ImageLink').attr('disabled', true);   
            $('#ImageBelongsToName').attr('disabled', false);
            $('#con').hide();
            $('#ImageBelongsToName').show();
            $('#relacionado').show();       
        } else if ($linkOption == 'con') {
        // con link
            $('#ImageBelongsToName').attr('disabled', true);
            $('#ImageLink').attr('disabled', false);              
            $('#relacionado').hide();        
            $('#ImageLink').show();
            $('#con').show();        
        } else if ($linkOption == 'sin') {
        // sin link
            $('#ImageBelongsToName').attr('disabled', true);
            $('#ImageLink').attr('disabled', true);
            $('#con').hide();
            $('#relacionado').hide();                    
        }
    });
</script>

