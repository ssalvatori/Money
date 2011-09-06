<div class="categories view">
<h2><?php  __('Category');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<!-- <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $category['Category']['id']; ?>
			&nbsp;
		</dd>-->
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $category['Category']['name']; ?>
			&nbsp;
		</dd>
		<!-- <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $category['Category']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $category['Category']['modified']; ?>
			&nbsp;
		</dd> -->
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Type'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo Category::statuses($category['Category']['type']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Category', true), array('action' => 'edit', $category['Category']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Category', true), array('action' => 'delete', $category['Category']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $category['Category']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Categories', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Category', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Transactions', true), array('controller' => 'transactions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Transaction', true), array('controller' => 'transactions', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php __('Related Transactions');?></h3>
	<?php if (!empty($category['Transaction'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<!-- <th><?php __('Id'); ?></th> -->
		<th><?php __('Name'); ?></th>
		<th><?php __('Monto'); ?></th>
		<!-- <th><?php __('Account Id'); ?></th> -->
		<!-- <th><?php __('Category Id'); ?></th> -->
		<!-- <th><?php __('Created'); ?></th> -->
		<!-- <th><?php __('Modified'); ?></th> -->
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($category['Transaction'] as $transaction):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<!-- <td><?php echo $transaction['id'];?></td> -->
			<td><?php echo $transaction['name'];?></td>
			<td><?php echo $transaction['monto'];?></td>
			<!-- <td><?php echo $transaction['account_id'];?></td> -->
			<!-- <td><?php echo $transaction['category_id'];?></td> -->
			<!-- <td><?php echo $transaction['created'];?></td> -->
			<!-- <td><?php echo $transaction['modifed'];?></td>-->
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'transactions', 'action' => 'view', $transaction['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'transactions', 'action' => 'edit', $transaction['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'transactions', 'action' => 'delete', $transaction['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $transaction['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Transaction', true), array('controller' => 'transactions', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
