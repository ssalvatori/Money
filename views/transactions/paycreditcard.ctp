<?php
echo $this->Html->scriptBlock("
      $(document).ready(function(){

        $('#TransactionAccountSource').change(function () {
            if($(this).val()) {
                Account_Show_Avaliable_in_Field($(this).val(), '#TransactionAccountAvaliable');
                $('#pay_description').show();
            }
            else {
                $('#pay_description').hide();
            }
        });
        
        $('#TransactionAccountTarget').change(function () {
            if($(this).val()) {
                Account_Show_Dout_in_Field($(this).val(), '#TransactionAccountDout');
                $('#pay_description').show();
            }
            else {
                $('#pay_description').hide();
            }
        });
        
        $('#TransactionTotal').change(function () {
        
            var dout = $('#TransactionAccountDout').val();
            var avaliable = $('#TransactionAccountAvaliable').val();
            var total = $('#TransactionTotal').val();
            
            if(total > avaliable) {
                alert('The avaliable amount is not enaugh');
                
            }

        });
        
      });
");
?>

<h1><?php echo __("Pay Credit Card"); ?></h1>

<?php
echo $this->Form->create();

echo $this->Form->input("account_source", array('options' => $accounts[1], 'empty' => true));

echo $this->Form->input('account_target', array('options' => $accounts[0], 'empty' => true));

echo "<div id=\"pay_description\" style=\"display:none;\">";
echo "<h2>" . __('Payment description', true) . "</h2>";
echo $this->Form->input('Account_avaliable', array('READONLY' => 'READONLY'));
echo $this->Form->input('Account_dout', array('READONLY' => 'READONLY'));
echo $this->Form->input('total');
echo "</div>";

echo $this->Form->end(__("Pay", true));
?>