<?php

/**
 * Application model for Cake.
 *
 * This file is application-wide model file. You can put all
 * application-wide model-related methods here.
 *
 * PHP versions 4 and 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2010, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2010, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       cake
 * @subpackage    cake.app
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

/**
 * Application model for Cake.
 *
 * Add your application-wide methods in the class below, your models
 * will inherit them.
 *
 * @package       cake
 * @subpackage    cake.app
 */
class AppModel extends Model {

    /**
     * static enums
     * @access static
     */
    static function enum($value, $options, $default = '') {
        if ($value !== null) {
            if (array_key_exists($value, $options)) {
                return $options[$value];
            }
            return $default;
        }
        return $options;
    }

    function doCalculeStatistics($InformationAccounts) {

        $results = Array();

        foreach ($InformationAccounts as $account) {

            $incoming = 0;
            $outgoing = 0;
            foreach ($account['Transaction'] as $transaction) {

                if (!array_key_exists('type', $transaction['Category'])) {
                    $transaction['Category']['type'] = $account['Account']['accounttype_id'];
                }

                if ($transaction['Category']['type'] == 0) {
                    $incoming += $transaction['amount'];
                } elseif ($transaction['Category']['type'] == 1) {
                    $outgoing += $transaction['amount'];
                }
            }

            $tmp['name'] = $account['Account']['name'];
            $tmp['incoming'] = $incoming;
            $tmp['outgoing'] = $outgoing;
            array_push($results, $tmp);
        }
        
        return $results;
    }

}
