<?php
$this->Html->scriptBlock("
      $(document).ready(function(){        
        $('#TransactionCategoryId').change(function() {
            category_get_type($(this).val());
        });
      });
  ", array('inline' => false));
?>
<div class="transactions form">
    <?php echo $this->Form->create('Transaction'); ?>
    <fieldset>
        <legend><?php __('Add Transaction'); ?></legend>
        <?php
        echo $this->Form->input('account_id');
        echo $this->Form->input('name');
        echo $this->Form->input('amount');
        echo $this->Form->input('category_id');
        echo "<div id='CategoryTypeMessage'></div>";
        echo $this->Form->input('date_realized');
        echo $this->Form->input('description');
        ?>
    </fieldset>
    <?php echo $this->Form->end(__('Submit', true)); ?>
</div>
<div class="actions">
    <h3><?php __('Actions'); ?></h3>
    <ul>

        <li><?php echo $this->Html->link(__('List Transactions', true), array('action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('List Accounts', true), array('controller' => 'accounts', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Account', true), array('controller' => 'accounts', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('List Categories', true), array('controller' => 'categories', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Category', true), array('controller' => 'categories', 'action' => 'add')); ?> </li>
    </ul>
</div>