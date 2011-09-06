<?php
/* Account Fixture generated on: 
Warning: date(): It is not safe to rely on the system's timezone settings. You are *required* to use the date.timezone setting or the date_default_timezone_set() function. In case you used any of those methods and you are still getting this warning, you most likely misspelled the timezone identifier. We selected 'America/Santiago' for 'CLT/-4.0/no DST' instead in /Users/stefano/Sites/cake/cake/console/templates/default/classes/fixture.ctp on line 24
2011-08-07 17:08:54 : 1312753194 */
class AccountFixture extends CakeTestFixture {
	var $name = 'Account';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'name' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 300, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'number' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 100, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'bank_id' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 3),
		'created' => array('type' => 'date', 'null' => true, 'default' => NULL),
		'modified' => array('type' => 'date', 'null' => true, 'default' => NULL),
		'user_id' => array('type' => 'integer', 'null' => true, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
		'tableParameters' => array()
	);

	var $records = array(
		array(
			'id' => 1,
			'name' => 'Lorem ipsum dolor sit amet',
			'number' => 'Lorem ipsum dolor sit amet',
			'bank_id' => 1,
			'created' => '2011-08-07',
			'modified' => '2011-08-07',
			'user_id' => 1
		),
	);
}
?>