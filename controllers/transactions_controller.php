<?php

class TransactionsController extends AppController {

    var $name = 'Transactions';

    function index() {
        $this->Transaction->recursive = 0;
        $this->paginate = array('conditions' => array('Transaction.user_id' => $this->Auth->user('id')));

        $this->set('transactions', $this->paginate());
    }

    function view($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('Invalid transaction', true));
            $this->redirect(array('action' => 'index'));
        }
        $this->set('transaction', $this->Transaction->read(null, $id));
    }

    function add() {
        if (!empty($this->data)) {
            $this->data["Transaction"]["user_id"] = $this->Auth->user('id');
            $this->Transaction->create();
            if ($this->Transaction->save($this->data)) {
                $this->Session->setFlash(__('The transaction has been saved', true));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The transaction could not be saved. Please, try again.', true));
            }
        }
        $accounts = $this->Transaction->Account->find('list', array('conditions' => array('Account.user_id' => $this->Auth->user('id'))));
        $categories = $this->Transaction->Category->find('list', array('conditions' => array('Category.user_id' => $this->Auth->user('id'))));
        $this->set(compact('accounts', 'categories'));
    }

    function edit($id = null) {
        if (!$id && empty($this->data)) {
            $this->Session->setFlash(__('Invalid transaction', true));
            $this->redirect(array('action' => 'index'));
        }
        if (!empty($this->data)) {
            if ($this->Transaction->save($this->data)) {
                $this->Session->setFlash(__('The transaction has been saved', true));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The transaction could not be saved. Please, try again.', true));
            }
        }
        if (empty($this->data)) {
            $this->data = $this->Transaction->read(null, $id);
        }
        $accounts = $this->Transaction->Account->find('list');
        $categories = $this->Transaction->Category->find('list');
        $this->set(compact('accounts', 'categories'));
    }

    function delete($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('Invalid id for transaction', true));
            $this->redirect(array('action' => 'index'));
        }
        if ($this->Transaction->delete($id)) {
            $this->Session->setFlash(__('Transaction deleted', true));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Transaction was not deleted', true));
        $this->redirect(array('action' => 'index'));
    }

    function paycreditcard() {

        if ($this->data) {
            $AccountSource = $this->data['Transaction']['account_source'];
            $AccountTarget = $this->data['Transaction']['account_target'];
            $amount = $this->data['Transaction']['total'];
            $user_id = $this->Auth->user('id');

        if ($this->Transaction->paycreditcard($AccountSource, $AccountTarget, $amount, $user_id)) {
                $this->Session->setFlash(__('The transaction has been saved', true));
            } else {
                $this->Session->setFlash(__('The transaction could not be saved. Please, try again.', true));
            }
            
            $this->redirect("index");
        }

        $accounts = $this->Transaction->Account->get_group_by_type($this->Auth->user('id'));

        $this->set(compact('accounts'));
    }

}

?>