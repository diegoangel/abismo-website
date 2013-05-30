<div class="span3">
    <div class="well sidebar-nav">
        <ul class="nav nav-list">
            <li class="nav-header"><?php echo __('Actions'); ?></li>
            <li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete_home', $this->Form->value('Image.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Image.id'))); ?></li>
            <li><?php echo $this->Html->link(__('List Images'), array('action' => 'filterByTypeHome')); ?></li>
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
            <legend><?php echo __('Edit Image'); ?></legend>
        <?php
            echo $this->Form->input('id');
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
                array('label' => __('Active')));
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
            if (data[j].id == $('#ImageReferencedId').val() && data[j].type == $('#ImageReferencedType').val()) {
                $('#ImageBelongsToName').val(data[j].title);
            }
        }
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
    // botonera de opciones de link de la imagen
    // TODO: refactorizar y poner el codigo que muestra y oculta en funciones 
    // separadas asi no se repite codigo
    
    $('#con').hide();
    $('#relacionado').hide();                    

    var hasLink = <?php echo !empty($this->request->data['Image']['link']) ? 1 : 0; ?>;
    var hasRelacionado = <?php echo !empty($this->request->data['Image']['referenced_type']) ? 1 : 0; ?>;
    
    if (hasLink == 1) {
        $('#ImageLink').show();
        $('#con').show();
        $('#linkOptions button').removeClass('active');
        $('#linkOptions button[data-option*="con"]').addClass('active')              
    }
    
    if (hasRelacionado == 1) {
        $('#ImageBelongsToName').show();
        $('#relacionado').show();  
        $('#linkOptions button').removeClass('active');
        $('#linkOptions button[data-option*="relacionado"]').addClass('active')              
    }
  
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
        // relacionado a un proyecto o concurso
            $('#con').hide();
            $('#ImageLink').val('');
            $('#ImageBelongsToName').show();
            $('#relacionado').show();       
        } else if ($linkOption == 'con') {
        // con link
            $('#relacionado').hide();        
            $('#ImageBelongsToName').val('');
            $('#ImageReferencedId').val('');
            $('#ImageReferencedType').val('');
            $('#ImageLink').show();
            $('#con').show();        
        } else if ($linkOption == 'sin') {
        // sin link
            $('#ImageBelongsToName').val('');
            $('#ImageReferencedId').val('');
            $('#ImageReferencedType').val('');     
            $('#ImageLink').val('');
            $('#con').hide();
            $('#relacionado').hide();                    
        }
    });    
</script>

