<?php
/* History Fixture generated on: 
Warning: date(): It is not safe to rely on the system's timezone settings. You are *required* to use the date.timezone setting or the date_default_timezone_set() function. In case you used any of those methods and you are still getting this warning, you most likely misspelled the timezone identifier. We selected 'America/Santiago' for 'CLT/-4.0/no DST' instead in /Users/stefano/Sites/cake/cake/console/templates/default/classes/fixture.ctp on line 24
2011-08-05 21:08:01 : 1312593121 */
class HistoryFixture extends CakeTestFixture {
	var $name = 'History';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'key' => 'primary'),
		'user_id' => array('type' => 'integer', 'null' => true, 'default' => NULL),
		'created' => array('type' => 'date', 'null' => true, 'default' => NULL),
		'indexes' => array(),
		'tableParameters' => array()
	);

	var $records = array(
		array(
			'id' => 1,
			'user_id' => 1,
			'created' => '2011-08-05'
		),
	);
}
?>