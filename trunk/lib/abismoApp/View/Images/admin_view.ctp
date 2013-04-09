<div class="images view">
<h2><?php  echo __('Image'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($image['Image']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Filename'); ?></dt>
		<dd>
			<?php echo h($image['Image']['filename']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Filepath'); ?></dt>
		<dd>
			<?php echo h($image['Image']['filepath']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Alt'); ?></dt>
		<dd>
			<?php echo h($image['Image']['alt']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Active'); ?></dt>
		<dd>
			<?php echo h($image['Image']['active']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($image['Image']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($image['Image']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Image'), array('action' => 'edit', $image['Image']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Image'), array('action' => 'delete', $image['Image']['id']), null, __('Are you sure you want to delete # %s?', $image['Image']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Images'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Image'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Projects'), array('controller' => 'projects', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Project'), array('controller' => 'projects', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tenders'), array('controller' => 'tenders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tender'), array('controller' => 'tenders', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Projects'); ?></h3>
	<?php if (!empty($image['Project'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Image Id'); ?></th>
		<th><?php echo __('Video Id'); ?></th>
		<th><?php echo __('Title'); ?></th>
		<th><?php echo __('Subtitle'); ?></th>
		<th><?php echo __('Headline'); ?></th>
		<th><?php echo __('Description'); ?></th>
		<th><?php echo __('Proposal'); ?></th>
		<th><?php echo __('Show In Home'); ?></th>
		<th><?php echo __('Featured'); ?></th>
		<th><?php echo __('Active'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($image['Project'] as $project): ?>
		<tr>
			<td><?php echo $project['id']; ?></td>
			<td><?php echo $project['image_id']; ?></td>
			<td><?php echo $project['video_id']; ?></td>
			<td><?php echo $project['title']; ?></td>
			<td><?php echo $project['subtitle']; ?></td>
			<td><?php echo $project['headline']; ?></td>
			<td><?php echo $project['description']; ?></td>
			<td><?php echo $project['proposal']; ?></td>
			<td><?php echo $project['show_in_home']; ?></td>
			<td><?php echo $project['featured']; ?></td>
			<td><?php echo $project['active']; ?></td>
			<td><?php echo $project['created']; ?></td>
			<td><?php echo $project['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'projects', 'action' => 'view', $project['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'projects', 'action' => 'edit', $project['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'projects', 'action' => 'delete', $project['id']), null, __('Are you sure you want to delete # %s?', $project['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Project'), array('controller' => 'projects', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Tenders'); ?></h3>
	<?php if (!empty($image['Tender'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Image Id'); ?></th>
		<th><?php echo __('Video Id'); ?></th>
		<th><?php echo __('Title'); ?></th>
		<th><?php echo __('Subtitle'); ?></th>
		<th><?php echo __('Headline'); ?></th>
		<th><?php echo __('Description'); ?></th>
		<th><?php echo __('Proposal'); ?></th>
		<th><?php echo __('Show In Home'); ?></th>
		<th><?php echo __('Featured'); ?></th>
		<th><?php echo __('Active'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($image['Tender'] as $tender): ?>
		<tr>
			<td><?php echo $tender['id']; ?></td>
			<td><?php echo $tender['image_id']; ?></td>
			<td><?php echo $tender['video_id']; ?></td>
			<td><?php echo $tender['title']; ?></td>
			<td><?php echo $tender['subtitle']; ?></td>
			<td><?php echo $tender['headline']; ?></td>
			<td><?php echo $tender['description']; ?></td>
			<td><?php echo $tender['proposal']; ?></td>
			<td><?php echo $tender['show_in_home']; ?></td>
			<td><?php echo $tender['featured']; ?></td>
			<td><?php echo $tender['active']; ?></td>
			<td><?php echo $tender['created']; ?></td>
			<td><?php echo $tender['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'tenders', 'action' => 'view', $tender['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'tenders', 'action' => 'edit', $tender['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'tenders', 'action' => 'delete', $tender['id']), null, __('Are you sure you want to delete # %s?', $tender['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Tender'), array('controller' => 'tenders', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
