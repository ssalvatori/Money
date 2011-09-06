<?php

Warning: date(): It is not safe to rely on the system's timezone settings. You are *required* to use the date.timezone setting or the date_default_timezone_set() function. In case you used any of those methods and you are still getting this warning, you most likely misspelled the timezone identifier. We selected 'America/Santiago' for 'CLT/-4.0/no DST' instead in /Users/stefano/Sites/cake/cake/console/templates/default/classes/test.ctp on line 22
/* History Test cases generated on: 2011-08-05 21:08:01 : 1312593121*/
App::import('Model', 'History');

class HistoryTestCase extends CakeTestCase {
	var $fixtures = array('app.history', 'app.user', 'app.account', 'app.bank', 'app.transaction', 'app.category');

	function startTest() {
		$this->History =& ClassRegistry::init('History');
	}

	function endTest() {
		unset($this->History);
		ClassRegistry::flush();
	}

}
?>