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

}

?>