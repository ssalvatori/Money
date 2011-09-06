<?php

Warning: date(): It is not safe to rely on the system's timezone settings. You are *required* to use the date.timezone setting or the date_default_timezone_set() function. In case you used any of those methods and you are still getting this warning, you most likely misspelled the timezone identifier. We selected 'America/Santiago' for 'CLT/-4.0/no DST' instead in /Users/stefano/Sites/cake/cake/console/templates/default/classes/test.ctp on line 22
/* Transactions Test cases generated on: 2011-08-07 10:08:01 : 1312726441*/
App::import('Controller', 'Transactions');

class TestTransactionsController extends TransactionsController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class TransactionsControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.transaction', 'app.account', 'app.bank', 'app.user', 'app.history', 'app.category');

	function startTest() {
		$this->Transactions =& new TestTransactionsController();
		$this->Transactions->constructClasses();
	}

	function endTest() {
		unset($this->Transactions);
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