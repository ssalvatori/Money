<h1><?php echo __("Pay Credit Card"); ?></h1>

<?php

echo $this->Form->create();

foreach($accounts as $type_account) {
    pr($type_account);
}

echo $this->Form->end(__("Pay",true));

?>