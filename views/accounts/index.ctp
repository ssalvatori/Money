<div class="accounts index">
	<h2><?php __('Accounts');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<!-- <th><?php echo $this->Paginator->sort('id');?></th> -->
			<th><?php echo $this->Paginator->sort('name');?></th>
			<th><?php echo $this->Paginator->sort('number');?></th>
			<th><?php echo $this->Paginator->sort('bank_id');?></th>
			<!-- <th><?php echo $this->Paginator->sort('created');?></th> -->
			<!-- <th><?php echo $this->Paginator->sort('modified');?></th> -->
			<!-- <th><?php echo $this->Paginator->sort('user_id');?></th> -->
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($accounts as $account):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<!-- <td><?php echo $account['Account']['id']; ?>&nbsp;</td> -->
		<td><?php echo $account['Account']['name']; ?>&nbsp;</td>
		<td><?php echo $account['Account']['number']; ?>&nbsp;</td>
		<td>
			<?php echo $account['Bank']['name']; ?>
		</td>
		<!-- <td><?php echo $account['Account']['created']; ?>&nbsp;</td> -->
		<!-- <td><?php echo $account['Account']['modified']; ?>&nbsp;</td> -->
		<!-- <td><?php echo $account['Account']['user_id']; ?>&nbsp;</td> -->
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $account['Account']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $account['Account']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $account['Account']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $account['Account']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Account', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Banks', true), array('controller' => 'banks', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Bank', true), array('controller' => 'banks', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Transactions', true), array('controller' => 'transactions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Transaction', true), array('controller' => 'transactions', 'action' => 'add')); ?> </li>
	</ul>
</div>