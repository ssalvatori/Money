<ul>
    <li><?php echo __("Welcomen"); ?> <strong><?php echo $this->Session->read("Auth.User.username"); ?></strong></li>
    <li><?php echo $this->Html->link(__('My accounts', true), array('controller' => 'accounts', 'action' => 'index')); ?></li>
    <li><?php echo $this->Html->link(__('My categories', true), array('controller' => 'categories', 'action' => 'index')); ?></li>
    <li><?php echo $this->Html->link(__('Add transaction', true), array('controller' => 'transactions', 'action' => 'add')); ?></li>
    <li><?php echo $this->Html->link(__('Pay credit card', true), array('controller' => 'transactions', 'action' => 'paycreditcard')); ?></li>
    <li><?php echo $this->Html->link(__('Logout', true), array('controller' => 'users', 'action' => 'logout')); ?></li>
</ul>