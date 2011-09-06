<?php

Warning: date(): It is not safe to rely on the system's timezone settings. You are *required* to use the date.timezone setting or the date_default_timezone_set() function. In case you used any of those methods and you are still getting this warning, you most likely misspelled the timezone identifier. We selected 'America/Santiago' for 'CLT/-4.0/no DST' instead in /Users/stefano/Sites/cake/cake/console/templates/default/classes/test.ctp on line 22
/* Account Test cases generated on: 2011-08-07 17:08:55 : 1312753195*/
App::import('Model', 'Account');

class AccountTestCase extends CakeTestCase {
	var $fixtures = array('app.account', 'app.bank', 'app.user', 'app.history', 'app.transaction', 'app.category');

	function startTest() {
		$this->Account =& ClassRegistry::init('Account');
	}

	function endTest() {
		unset($this->Account);
		ClassRegistry::flush();
	}

}
?>