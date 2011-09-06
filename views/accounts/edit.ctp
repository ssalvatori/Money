<div class="accounts form">
    <?php echo $this->Form->create('Account'); ?>
    <fieldset>
        <legend><?php __('Edit Account'); ?></legend>
        <?php
        echo $this->Form->input('id');
        echo $this->Form->input('name');
        echo $this->Form->input('number');
        echo $this->Form->input('bank_id');
        echo $this->Form->input('accounttype_id', array('label' => __('Account type', true), 'options' => $accounttype_id,'selected'=>$this->data['Account']['accounttype_id']));
        ?>
    </fieldset>
    <?php echo $this->Form->end(__('Submit', true)); ?>
</div>
<div class="actions">
    <h3><?php __('Actions'); ?></h3>
    <ul>

        <li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Account.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Account.id'))); ?></li>
        <li><?php echo $this->Html->link(__('List Accounts', true), array('action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('List Banks', true), array('controller' => 'banks', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Bank', true), array('controller' => 'banks', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('List Transactions', true), array('controller' => 'transactions', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Transaction', true), array('controller' => 'transactions', 'action' => 'add')); ?> </li>
    </ul>
</div>