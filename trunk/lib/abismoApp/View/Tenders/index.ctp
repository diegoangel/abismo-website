<div class="tenders index">
	<h2><?php echo __('Tenders'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('image_id'); ?></th>
			<th><?php echo $this->Paginator->sort('video_id'); ?></th>
			<th><?php echo $this->Paginator->sort('title'); ?></th>
			<th><?php echo $this->Paginator->sort('subtitle'); ?></th>
			<th><?php echo $this->Paginator->sort('headline'); ?></th>
			<th><?php echo $this->Paginator->sort('description'); ?></th>
			<th><?php echo $this->Paginator->sort('proposal'); ?></th>
			<th><?php echo $this->Paginator->sort('show_in_home'); ?></th>
			<th><?php echo $this->Paginator->sort('featured'); ?></th>
			<th><?php echo $this->Paginator->sort('active'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($tenders as $tender): ?>
	<tr>
		<td><?php echo h($tender['Tender']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($tender['Image']['id'], array('controller' => 'images', 'action' => 'view', $tender['Image']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($tender['Video']['id'], array('controller' => 'videos', 'action' => 'view', $tender['Video']['id'])); ?>
		</td>
		<td><?php echo h($tender['Tender']['title']); ?>&nbsp;</td>
		<td><?php echo h($tender['Tender']['subtitle']); ?>&nbsp;</td>
		<td><?php echo h($tender['Tender']['headline']); ?>&nbsp;</td>
		<td><?php echo h($tender['Tender']['description']); ?>&nbsp;</td>
		<td><?php echo h($tender['Tender']['proposal']); ?>&nbsp;</td>
		<td><?php echo h($tender['Tender']['show_in_home']); ?>&nbsp;</td>
		<td><?php echo h($tender['Tender']['featured']); ?>&nbsp;</td>
		<td><?php echo h($tender['Tender']['active']); ?>&nbsp;</td>
		<td><?php echo h($tender['Tender']['created']); ?>&nbsp;</td>
		<td><?php echo h($tender['Tender']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $tender['Tender']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $tender['Tender']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $tender['Tender']['id']), null, __('Are you sure you want to delete # %s?', $tender['Tender']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Tender'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Images'), array('controller' => 'images', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Image'), array('controller' => 'images', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Videos'), array('controller' => 'videos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Video'), array('controller' => 'videos', 'action' => 'add')); ?> </li>
	</ul>
</div>
