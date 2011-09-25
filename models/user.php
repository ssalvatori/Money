<?php

class User extends AppModel {

    var $name = 'User';
    //The Associations below have been created with all possible keys, those that are not needed can be removed
    var $displayField = 'username';
    var $hasMany = array(
        'Account' => array(
            'className' => 'Account',
            'foreignKey' => 'user_id',
            'dependent' => false,
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
        ),
        'Transaction' => array(
            'className' => 'Transaction',
            'foreignKey' => 'user_id',
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

    function makeStatistics($user_id) {
        $this->Account->Behaviors->attach('Containable');

        $accounts = $this->Account->find('all', array(
            'conditions' => array(
                'Account.user_id' => $user_id
            ),
            'contain' => array(
                'Transaction' => array(
                    'Category' => array(
                        'fields' => array(
                            'type'
                        )
                    ),
                    'fields' => array(
                        'category_id',
                        'amount'
                    )
                )
            ),
            'fields' => array('name', 'id', 'accounttype_id')
                )
        );



        return $this->doCalculeStatistics($accounts);
    }


}

?>