<div class="span4"></div>
<div class="span4">
    <?php echo $this->Session->flash('auth'); ?>
    <?php 

    echo $this->Form->create('', array('action'=>'login', 'admin' => true));
    echo $this->Form->input('username', array('autocomplete' => 'off'));
    echo $this->Form->input('password');
    echo $this->Form->end('Login');
    ?>
</div>
<div class="span4"></div>
