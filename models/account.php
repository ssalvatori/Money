<?php

class Account extends AppModel {

    var $name = 'Account';
    var $displayField = 'name';
    var $actsAs = array('Containable');
    var $validate = array(
        'name' => array(
            'notempty' => array(
                'rule' => array('notempty'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'number' => array(
            'notempty' => array(
                'rule' => array('notempty'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'bank_id' => array(
            'numeric' => array(
                'rule' => array('numeric'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'created' => array(
            'date' => array(
                'rule' => array('date'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'user_id' => array(
            'numeric' => array(
                'rule' => array('numeric'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'accounttype_id' => array(
            'numeric' => array(
                'rule' => array('numeric'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
    );
    //The Associations below have been created with all possible keys, those that are not needed can be removed

    var $belongsTo = array(
        'Bank' => array(
            'className' => 'Bank',
            'foreignKey' => 'bank_id',
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
    var $hasMany = array(
        'Transaction' => array(
            'className' => 'Transaction',
            'foreignKey' => 'account_id',
            'dependent' => false,
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
        )
    );

    function get_stat($id) {

        $results = $this->find('all', array(
            'conditions' => array('Account.id' => $id),
            'contain' => array(
                'Transaction' => array(
                    'Category' => array('fields' => array('type')
                    ),
                    'fields' => array('category_id', 'amount')
                )
            ),
                )
        );
           
        return $this->doCalculeStatistics($results);

//        foreach ($results as $result) {
//            $incoming = 0;
//            $outgoing = 0;
//            foreach ($result['Transaction'] as $transaction) {
//                if ($transaction['Category']['type'] == 0) {
//                    $incoming += $transaction['amount'];
//                } elseif ($transaction['Category']['type'] == 1) {
//                    $outgoing += $transaction['amount'];
//                }
//            }
//
//            $tmp['accounttype_id'] = $result['Account']['accounttype_id'];
//            
//            if($result['Account']['accounttype_id'] == 0) {
//                $tmp['creditcard_amount'] = $result['Account']['creditcard_amount'];
//            }
//            
//            $tmp['name'] = $result['Account']['name'];
//            $tmp['incoming'] = $incoming;
//            $tmp['outgoing'] = $outgoing;
//            array_push($results, $tmp);
//            
//            return $tmp;
//        }
    }
    
    function get_group_by_type($user_id) {
        
        $this->recursive = -1;
        $results = $this->find('all',array('conditions'=>array('Account.user_id'=>$user_id)));
        
        $credit_account = array();
        $debit_account = array();
        
        foreach($results as $account) {
            if($account['Account']['accounttype_id'] == 0) {
                array_push($credit_account,$account);
            }
            else if($account['Account']['accounttype_id'] == 1) {
                array_push($debit_account,$account);
            }
        }
        
        $credit_account = Set::combine($credit_account, '{n}.Account.id', '{n}.Account.name');
        $debit_account =  Set::combine($debit_account, '{n}.Account.id', '{n}.Account.name');
        
        return array($credit_account,$debit_account);
    }

    function get_Dout_amount() {
        $account_stats = $this->get_stat($this->id);
        return abs($account_stats['0']['incoming'] - $account_stats['0']['outgoing']);
    }
    
    function get_Avaliable_amount() {
        $account_stats = $this->get_stat($this->id);
        return abs($account_stats['0']['incoming'] - $account_stats['0']['outgoing']);
    }
}
?>