<div class="projects form">
<?php echo $this->Form->create('Project'); ?>
	<fieldset>
		<legend><?php echo __('Add Project'); ?></legend>
	<?php
		echo $this->Form->input('image_id');
		echo $this->Form->input('video_id');
		echo $this->Form->input('title');
		echo $this->Form->input('subtitle');
		echo $this->Form->input('headline');
		echo $this->Form->input('description');
		echo $this->Form->input('proposal');
		echo $this->Form->input('show_in_home');
		echo $this->Form->input('featured');
		echo $this->Form->input('active');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Projects'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Images'), array('controller' => 'images', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Image'), array('controller' => 'images', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Videos'), array('controller' => 'videos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Video'), array('controller' => 'videos', 'action' => 'add')); ?> </li>
	</ul>
</div>
