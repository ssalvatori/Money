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

    function statistics() {
        if ($this->data) {
            $start_date = $this->data['Transaction']['date_realized'];
            $account_id = $this->data['Transaction']['account_id'];
            $user_id = $this->Auth->user('id');
            $category_type = $this->data['Transaction']['category_type'];


           // $this->Transaction->recursive = -1;
            $this->Transaction->Behaviors->attach('Containable');
            $transactions_results = $this->Transaction->find('all', array(
                'conditions' => array('account_id' => $account_id, 'month(date_realized)' => $start_date['month'], 'year(date_realized)' => $start_date['year']),
                'contain' => array('Category' =>
                    array('conditions' => array('Category.user_id' => $user_id, 'Category.type' => $category_type)
                    )
                )
                    )
            );

            $transactions_stats = $this->Transaction->calculate_statistics($transactions_results, $user_id);

            $this->set(compact('transactions_stats'));
            $this->set('month', $this->data['Transaction']['date_realized']['month']);
            $this->set('year', $this->data['Transaction']['date_realized']['year']);
        }

        $min = $this->Transaction->find('first', array('order' => 'month(date_realized) ASC', 'limit' => 1, 'fields' => array('year(date_realized) as year_min')));
        $accounts = $this->Transaction->Account->find('list', array('conditions' => array('Account.user_id' => $this->Auth->user('id'))));

        $this->set('min_year', $min['0']['year_min']);
        $this->set(compact('accounts'));
    }

}

?>
