<?php

class AccountsController extends AppController {

    var $name = 'Accounts';

    function index() {
        $this->Account->recursive = 0;
        $this->paginate = array('conditions' => array('Account.user_id' => $this->Auth->user('id')));
        $this->set('accounts', $this->paginate());
    }

    function view($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('Invalid account', true));
            $this->redirect(array('action' => 'index'));
        }
        $this->Account->Behaviors->attach('Containable');
        $this->set('account', $this->Account->find('first', array(
                    'conditions' => array('Account.id' => $id),
                    'contain' => array('Bank', 'Transaction' => array('Account','Category')),
                )));
    }

    function add() {
        if (!empty($this->data)) {
            $this->data["Account"]["user_id"] = $this->Auth->user('id');
            $this->Account->create();
            if ($this->Account->save($this->data)) {
                $this->Session->setFlash(__('The account has been saved', true));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The account could not be saved. Please, try again.', true));
            }
        }
        $banks = $this->Account->Bank->find('list');
        $this->set(compact('banks'));
    }

    function edit($id = null) {
        if (!$id && empty($this->data)) {
            $this->Session->setFlash(__('Invalid account', true));
            $this->redirect(array('action' => 'index'));
        }
        if (!empty($this->data)) {
            if ($this->Account->save($this->data)) {
                $this->Session->setFlash(__('The account has been saved', true));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The account could not be saved. Please, try again.', true));
            }
        }
        if (empty($this->data)) {
            $this->data = $this->Account->read(null, $id);
        }
        $banks = $this->Account->Bank->find('list');
        $this->set(compact('banks'));
    }

    function delete($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('Invalid id for account', true));
            $this->redirect(array('action' => 'index'));
        }
        if ($this->Account->delete($id)) {
            $this->Session->setFlash(__('Account deleted', true));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Account was not deleted', true));
        $this->redirect(array('action' => 'index'));
    }

    function beforeFilter() {
        $this->set('accounttype_id', Configure::read('accounttype_id'));
    }

    function get_dout_amount() {
        Configure::write('debug', 0);
        $account_id = $this->params['form']['account_id'];

        $this->Account->id = $account_id;
        $dout = $this->Account->get_Dout_amount();

        $this->set(compact('dout'));
    }

    function get_avaliable_amount() {
        Configure::write('debug', 0);
        $account_id = $this->params['form']['account_id'];

        $this->Account->id = $account_id;
        $avaliable = $this->Account->get_Avaliable_amount();
        
        $this->set(compact('avaliable'));
    }

}

?>