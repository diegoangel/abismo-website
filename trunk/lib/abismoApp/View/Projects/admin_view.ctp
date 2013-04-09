<div class="projects view">
<h2><?php  echo __('Project'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($project['Project']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Image'); ?></dt>
		<dd>
			<?php echo $this->Html->link($project['Image']['id'], array('controller' => 'images', 'action' => 'view', $project['Image']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Video'); ?></dt>
		<dd>
			<?php echo $this->Html->link($project['Video']['id'], array('controller' => 'videos', 'action' => 'view', $project['Video']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($project['Project']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Subtitle'); ?></dt>
		<dd>
			<?php echo h($project['Project']['subtitle']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Headline'); ?></dt>
		<dd>
			<?php echo h($project['Project']['headline']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($project['Project']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Proposal'); ?></dt>
		<dd>
			<?php echo h($project['Project']['proposal']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Show In Home'); ?></dt>
		<dd>
			<?php echo h($project['Project']['show_in_home']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Featured'); ?></dt>
		<dd>
			<?php echo h($project['Project']['featured']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Active'); ?></dt>
		<dd>
			<?php echo h($project['Project']['active']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($project['Project']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($project['Project']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Project'), array('action' => 'edit', $project['Project']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Project'), array('action' => 'delete', $project['Project']['id']), null, __('Are you sure you want to delete # %s?', $project['Project']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Projects'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Project'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Images'), array('controller' => 'images', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Image'), array('controller' => 'images', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Videos'), array('controller' => 'videos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Video'), array('controller' => 'videos', 'action' => 'add')); ?> </li>
	</ul>
</div>
