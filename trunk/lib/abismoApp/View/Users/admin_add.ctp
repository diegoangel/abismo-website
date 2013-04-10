<div class="span3">
    <div class="well sidebar-nav">
        <ul class="nav nav-list">
            <li class="nav-header"><?php echo __d('cake', 'Actions'); ?></li>
            <li><?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?></li>
        </ul>
    </div>
</div>


<div class="span9">
    <?php echo $this->Session->flash(); ?>
<?php echo $this->Form->create('User'); ?>
    <fieldset>
        <legend><?php echo __('Nuevo Usuario'); ?></legend>
    <?php
        echo $this->Form->input('username', array('autocomplete'=>'off', 'label' => 'Nombre de Usuario'));
        echo $this->Form->input('passwd', array('autocomplete'=>'off', 'label' => 'Contrase&ntilde;a'));
        echo $this->Form->input('passwd_confirm', array('autocomplete'=>'off', 'label' => 'Confirmar contrase&ntilde;a', 'type' => 'password'));                
        echo $this->Form->input('is_admin',array('label' => 'Admin'));
        echo $this->Form->input('is_active',array('label' => 'Activo'));
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>

