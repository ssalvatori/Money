<div class="banks index">
	<h2><?php __('Banks');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<!-- <th><?php echo $this->Paginator->sort('id');?></th> -->
			<th><?php echo $this->Paginator->sort('name');?></th>
			<!-- <th><?php echo $this->Paginator->sort('created');?></th> -->
			<!-- <th><?php echo $this->Paginator->sort('modified');?></th> -->
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($banks as $bank):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<!-- <td><?php echo $bank['Bank']['id']; ?>&nbsp;</td> -->
		<td><?php echo $bank['Bank']['name']; ?>&nbsp;</td>
		<!-- <td><?php echo $bank['Bank']['created']; ?>&nbsp;</td> -->
		<!-- <td><?php echo $bank['Bank']['modified']; ?>&nbsp;</td> -->
		<td class="actions">
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $bank['Bank']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $bank['Bank']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $bank['Bank']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
	));
	?>	</p>

	<div class="paging">
		<?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $this->Paginator->numbers();?>
 |
		<?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?>
	</div>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Bank', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Accounts', true), array('controller' => 'accounts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Account', true), array('controller' => 'accounts', 'action' => 'add')); ?> </li>
	</ul>
</div>