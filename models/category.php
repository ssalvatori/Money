<?php

class Category extends AppModel {

    var $name = 'Category';
    //The Associations below have been created with all possible keys, those that are not needed can be removed
    var $hasMany = array(
        'Transaction' => array(
            'className' => 'Transaction',
            'foreignKey' => 'category_id',
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

    /*
     * static enum: Model::function()
     * @access static
     */
    static function statuses($value = null) {
        $options = array(
            self::OUTGOING => __('INCOMING', true),
            self::INCOMING => __('OUTGOING', true)
        );
        return parent::enum($value, $options);
    }

    const OUTGOING = 0; # causes sound, then marks itself as "unread"
    const INCOMING = 1;
    
}

?>