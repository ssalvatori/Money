<?php
class BanksController extends AppController {

	var $name = 'Banks';

	function index() {
		$this->Bank->recursive = 0;
		$this->set('banks', $this->paginate());
	}


	function add() {
		if (!empty($this->data)) {
			$this->Bank->create();
			if ($this->Bank->save($this->data)) {
				$this->Session->setFlash(__('The bank has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The bank could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid bank', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Bank->save($this->data)) {
				$this->Session->setFlash(__('The bank has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The bank could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Bank->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for bank', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Bank->delete($id)) {
			$this->Session->setFlash(__('Bank deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Bank was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>