<?php

Warning: date(): It is not safe to rely on the system's timezone settings. You are *required* to use the date.timezone setting or the date_default_timezone_set() function. In case you used any of those methods and you are still getting this warning, you most likely misspelled the timezone identifier. We selected 'America/Santiago' for 'CLT/-4.0/no DST' instead in /Users/stefano/Sites/cake/cake/console/templates/default/classes/test.ctp on line 22
/* Banks Test cases generated on: 2011-08-05 20:08:12 : 1312590912*/
App::import('Controller', 'Banks');

class TestBanksController extends BanksController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class BanksControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.bank', 'app.account');

	function startTest() {
		$this->Banks =& new TestBanksController();
		$this->Banks->constructClasses();
	}

	function endTest() {
		unset($this->Banks);
		ClassRegistry::flush();
	}

	function testIndex() {

	}

	function testView() {

	}

	function testAdd() {

	}

	function testEdit() {

	}

	function testDelete() {

	}

}
?>