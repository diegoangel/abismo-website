<div class="span3">
    <div class="well sidebar-nav">
        <ul class="nav nav-list">
            <li class="nav-header"><?php echo __d('cake', 'Actions'); ?></li>
            <li><?php echo $this->Html->link(__('Edit User'), array('action' => 'edit', $user['User']['id'])); ?> </li>
            <li><?php echo $this->Form->postLink(__('Delete User'), array('action' => 'delete', $user['User']['id']), null, __('Are you sure you want to delete # %s?', $user['User']['id'])); ?> </li>
            <li><?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?> </li>
            <li><?php echo $this->Html->link(__('New User'), array('action' => 'add')); ?> </li>
        </ul>
    </div>
</div>

<div class="span9">
    <?php echo $this->Session->flash(); ?>
    <div class="page-header">
        <h1><?php  echo __('Usuario'); ?></h1>
    </div>
    <dl>
        <dt><?php echo __('Id'); ?></dt>
        <dd>
            <?php echo h($user['User']['id']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Usuario'); ?></dt>
        <dd>
            <?php echo h($user['User']['username']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Contrase&ntilde;a'); ?></dt>
        <dd>
            <?php echo h($user['User']['password']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Admin'); ?></dt>
        <dd>
            <?php echo h($user['User']['is_admin']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Activo'); ?></dt>
        <dd>
            <?php echo h($user['User']['is_active']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Creado'); ?></dt>
        <dd>
            <?php echo h($user['User']['created']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Modificado'); ?></dt>
        <dd>
            <?php echo h($user['User']['modified']); ?>
            &nbsp;
        </dd>
    </dl>
</div>
