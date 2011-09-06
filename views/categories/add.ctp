<?php
$this->Html->scriptBlock("
      $(document).ready(function(){
      
      $('#CategoryName').change(function() {
        $(this).val($(this).val().toUpperCase());
      });

      });
      ", array('inline' => false));
?>
<div class="categories form">
    <?php echo $this->Form->create('Category'); ?>
    <fieldset>
        <legend><?php __('Add Category'); ?></legend>
        <?php
        echo $this->Form->input('name');
        echo $this->Form->input('type', array('options' => Category::statuses()));
        ?>
    </fieldset>
    <?php echo $this->Form->end(__('Submit', true)); ?>
</div>
<div class="actions">
    <h3><?php __('Actions'); ?></h3>
    <ul>

        <li><?php echo $this->Html->link(__('List Categories', true), array('action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('List Transactions', true), array('controller' => 'transactions', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Transaction', true), array('controller' => 'transactions', 'action' => 'add')); ?> </li>
    </ul>
</div>