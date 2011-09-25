<div class="accounts view">
    <h2><?php __('Account'); ?></h2>
    <dl><?php $i = 0;
$class = ' class="altrow"'; ?>
        <!-- <dt<?php if ($i % 2 == 0)
            echo $class; ?>><?php __('Id'); ?></dt>
        <dd<?php if ($i++ % 2 == 0)
            echo $class; ?>>
        <?php echo $account['Account']['id']; ?>
                &nbsp;
        </dd>-->
        <dt<?php if ($i % 2 == 0)
            echo $class; ?>><?php __('Name'); ?></dt>
        <dd<?php if ($i++ % 2 == 0)
                echo $class; ?>>
                <?php echo $account['Account']['name']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0)
                    echo $class; ?>><?php __('Number'); ?></dt>
        <dd<?php if ($i++ % 2 == 0)
                echo $class; ?>>
                <?php echo $account['Account']['number']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0)
                    echo $class; ?>><?php __('Bank'); ?></dt>
        <dd<?php if ($i++ % 2 == 0)
                echo $class; ?>>
                <?php echo $account['Bank']['name']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0)
                    echo $class; ?>><?php __('Created'); ?></dt>
        <dd<?php if ($i++ % 2 == 0)
                echo $class; ?>>
                <?php echo $account['Account']['created']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0)
                    echo $class; ?>><?php __('Modified'); ?></dt>
        <dd<?php if ($i++ % 2 == 0)
                echo $class; ?>>
                <?php echo $account['Account']['modified']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0)
                    echo $class; ?>><?php __('Account type'); ?></dt>
        <dd<?php if ($i++ % 2 == 0)
                echo $class; ?>>
                <?php echo $accounttype_id[$account['Account']['accounttype_id']]; ?>
            &nbsp;
        </dd>
    </dl>
</div>
<div class="actions">
    <h3><?php __('Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('Edit Account', true), array('action' => 'edit', $account['Account']['id'])); ?> </li>
        <li><?php echo $this->Html->link(__('Delete Account', true), array('action' => 'delete', $account['Account']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $account['Account']['id'])); ?> </li>
        <li><?php echo $this->Html->link(__('List Accounts', true), array('action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Account', true), array('action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('List Banks', true), array('controller' => 'banks', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Bank', true), array('controller' => 'banks', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('List Transactions', true), array('controller' => 'transactions', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Transaction', true), array('controller' => 'transactions', 'action' => 'add')); ?> </li>
    </ul>
</div>
<div class="related">
    <h3><?php __('Related Transactions'); ?></h3>
    <?php if (!empty($account['Transaction'])): ?>
        <table cellpadding = "0" cellspacing = "0">
            <tr>
                    <!--<th><?php __('Id'); ?></th>-->
                <th><?php __('Name'); ?></th>
                <th><?php __('Amount'); ?></th>
                <!-- <th><?php __('Account Id'); ?></th> -->
                <th><?php __('Category Id'); ?></th>
                <th><?php __('Type'); ?></th>
                <!-- <th><?php __('Created'); ?></th> -->
                <!-- <th><?php __('Modified'); ?></th> -->
                <th><?php __('Date Realized'); ?></th>
                <th class="actions"><?php __('Actions'); ?></th>
            </tr>
            <?php
            $i = 0;
            foreach ($account['Transaction'] as $transaction):
                $class = null;
                if ($i++ % 2 == 0) {
                    $class = ' class="altrow"';
                }
                ?>
                <tr<?php echo $class; ?>>
                        <!-- <td><?php echo $transaction['id']; ?></td> -->
                    <td><?php echo $transaction['name']; ?></td>
                    <td><?php echo $transaction['amount']; ?></td>
                    <!-- <td><?php echo $transaction['account_id']; ?></td> -->
                    <td>
                        <?php
                        if (!array_key_exists('name', $transaction['Category'])) {
                            echo __('PAY CREDIT CARD', false);
                        } else {
                            echo $transaction['Category']['name'];
                        }
                        ?></td>
                    <td>
                        <?php
                        if (!array_key_exists('type', $transaction['Category'])) {
                            echo Category::statuses($transaction['Account']['accounttype_id']);
                        } else {
                            echo Category::statuses($transaction['Category']['type']);
                        }
                        ?>
                    </td>
                        <!-- <td><?php echo $transaction['created']; ?></td> -->
                        <!-- <td><?php echo $transaction['modified']; ?></td> -->
                    <td><?php echo $transaction['date_realized']; ?></td>
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
            <li><?php echo $this->Html->link(__('New Transaction', true), array('controller' => 'transactions', 'action' => 'add')); ?> </li>
        </ul>
    </div>
</div>
