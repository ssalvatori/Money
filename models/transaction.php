<?php

class Transaction extends AppModel {

    var $name = 'Transaction';
    var $displayField = 'name';
    var $order = array("date_realized DESC");
    var $validate = array(
        'account_id' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                'message' => 'Your custom message here',
                //'allowEmpty' => false,
                'required' => true,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'category_id' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                'message' => 'Your custom message here',
                //'allowEmpty' => false,
                'required' => true,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'date_realized' => array(
            'date' => array(
                'rule' => array('date', 'ymd'),
                'message' => 'Your custom message here',
                //'allowEmpty' => false,
                'required' => true,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'amount' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                'message' => 'Your custom message here',
                //'allowEmpty' => false,
                'required' => true,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'name' => array(
            'notEmpty' => array(
                'rule' => array('notEmpty'),
                'message' => 'Your custom message here',
                //'allowEmpty' => false,
                'required' => true,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
    );
    //The Associations below have been created with all possible keys, those that are not needed can be removed
    var $belongsTo = array(
        'Account' => array(
            'className' => 'Account',
            'foreignKey' => 'account_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'Category' => array(
            'className' => 'Category',
            'foreignKey' => 'category_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'User' => array(
            'className' => 'User',
            'foreignKey' => 'user_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );

    function paycreditcard($AccountSource, $AccountTarget, $amount, $user_id) {

        if ($this->paycreditcardSource($AccountSource, $AccountTarget, $amount, $user_id) && $this->paycreditcardTarget($AccountSource, $AccountTarget, $amount, $user_id)) {
            return true;
        } else {
            return false;
        }
    }

    function _savepayment($AccountSource, $AccountTarget, $amount, $user_id) {
        $data['category_id'] = 0;
        $data['name'] = "PAY CREDIT CARD";
        $data['amount'] = $amount;
        $data['account_id'] = $AccountSource;
        $data['date_realized'] = date("Y-m-d");
        $data['user_id'] = $user_id;
        $data['description'] = $this->paycreditcarddescription($AccountSource, $AccountTarget, $amount);

        $this->log($data);
        $this->create();
        return $this->save($data);
    }

    function paycreditcardSource($AccountSource, $AccountTarget, $amount, $user_id) {
        return $this->_savepayment($AccountSource, $AccountTarget, $amount, $user_id);
    }

    function paycreditcardTarget($AccountSource, $AccountTarget, $amount, $user_id) {
        return $this->_savepayment($AccountTarget, $AccountSource, $amount, $user_id);
    }

    function paycreditcarddescription($IdAccountSource, $IdAccountTarget, $amount) {

        $AccountSource = $this->Account->read(null, $IdAccountSource);
        $AccountTarget = $this->Account->read(null, $IdAccountTarget);
        $date = date("d/m/Y");

        $description = "
        Account source: {$AccountSource["Account"]["name"]}
        Account target: {$AccountTarget["Account"]["name"]}
        Amoun: {$amount}
        Date: {$date}
        ";

        return $description;
    }

    function calculate_statistics($transactions, $user_id) {

        $transactions_by_category = Array();

        foreach ($transactions as $transaction) {
            if (!array_key_exists($transaction['Transaction']['category_id'], $transactions_by_category)) {
                $transactions_by_category[$transaction['Transaction']['category_id']] = 0;
            }

            $transactions_by_category[$transaction['Transaction']['category_id']] += $transaction['Transaction']['amount'];
        }

        return $this->_getCategoryName($transactions_by_category, $user_id);
    }

    function _getCategoryName($transactions_by_category, $user_id) {

        $this->Category->recursive = -1;
        $categories = $this->Category->find('all', array('user_id' => $user_id,'type'=>1));

        $transactions_category_stats = Array();
        foreach ($categories as $category) {
            if(array_key_exists($category['Category']['id'], $transactions_by_category)) {
                $transactions_category_stats[$category['Category']['name']] = $transactions_by_category[$category['Category']['id']];
            } else {
                $transactions_category_stats[$category['Category']['name']] = 0;
            }
        }

        return $transactions_category_stats;
    }

}

?>
