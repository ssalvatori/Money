<?php
/* Type Fixture generated on: 
Warning: date(): It is not safe to rely on the system's timezone settings. You are *required* to use the date.timezone setting or the date_default_timezone_set() function. In case you used any of those methods and you are still getting this warning, you most likely misspelled the timezone identifier. We selected 'America/Santiago' for 'CLT/-4.0/no DST' instead in /Users/stefano/Sites/cake/cake/console/templates/default/classes/fixture.ctp on line 24
2011-08-05 20:08:24 : 1312590924 */
class TypeFixture extends CakeTestFixture {
	var $name = 'Type';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'key' => 'primary'),
		'name' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 300, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'created' => array('type' => 'date', 'null' => true, 'default' => NULL),
		'modified' => array('type' => 'date', 'null' => true, 'default' => NULL),
		'indexes' => array(),
		'tableParameters' => array()
	);

	var $records = array(
		array(
			'id' => 1,
			'name' => 'Lorem ipsum dolor sit amet',
			'created' => '2011-08-05',
			'modified' => '2011-08-05'
		),
	);
}
?>