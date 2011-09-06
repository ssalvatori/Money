<?php

class UsersController extends AppController {

    var $name = 'Users';

    function index() {
        $this->User->recursive = 0;
        $this->set('users', $this->paginate());
    }

    function view($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('Invalid user', true));
            $this->redirect(array('action' => 'index'));
        }
        $this->set('user', $this->User->read(null, $id));
    }

    function add() {
        if (!empty($this->data)) {
            $this->User->create();
            if ($this->User->save($this->data)) {
                $this->Session->setFlash(__('The user has been saved', true));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.', true));
            }
        }
    }

    function edit($id = null) {
        if (!$id && empty($this->data)) {
            $this->Session->setFlash(__('Invalid user', true));
            $this->redirect(array('action' => 'index'));
        }
        if (!empty($this->data)) {
            if ($this->User->save($this->data)) {
                $this->Session->setFlash(__('The user has been saved', true));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.', true));
            }
        }
        if (empty($this->data)) {
            $this->data = $this->User->read(null, $id);
        }
    }

    function delete($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('Invalid id for user', true));
            $this->redirect(array('action' => 'index'));
        }
        if ($this->User->delete($id)) {
            $this->Session->setFlash(__('User deleted', true));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('User was not deleted', true));
        $this->redirect(array('action' => 'index'));
    }

    function login() {
//        pr($this->data);
        if ($this->Auth->user()) {
            $this->redirect(array("action" => 'start'));
        }
    }

    function logout() {
        $this->redirect($this->Auth->logout());
    }

    function start() {
        $this->User->Account->Behaviors->attach('Containable');

        $accounts = $this->User->Account->find('all', array(
            'conditions' => array(
                'Account.user_id' => $this->Auth->user('id')
            ),
            'contain' => array(
                'Transaction' => array(
                    'Category' => array(
                        'fields' => array(
                            'type'
                        )
                    ),
                    'fields' => array(
                        'category_id',
                        'amount'
                    )
                )
            ),
            'fields' => array('name', 'id')
                )
        );

        $results = Array();

        foreach ($accounts as $account) {
            $incoming = 0;
            $outgoing = 0;
            foreach ($account['Transaction'] as $transaction) {
                if ($transaction['Category']['type'] == 0) {
                    $incoming += $transaction['amount'];
                } elseif ($transaction['Category']['type'] == 1) {
                    $outgoing += $transaction['amount'];
                }
            }

            $tmp['name'] = $account['Account']['name'];
            $tmp['incoming'] = $incoming;
            $tmp['outgoing'] = $outgoing;
            array_push($results, $tmp);
        }
        $this->set(compact('results'));
    }

    function start_test() {
        $accounts = $this->User->Account->find('all', array('recursive' => -1,'conditions' => array('Account.user_id' => $this->Auth->user("id"))));

        foreach ($accounts as $account) {
            pr($this->User->Account->get_stat($account['Account']['id']));
        }
    }

    function beforeFilter() {
        $this->Auth->allow('login');
        parent::beforeFilter();
    }

}

?>