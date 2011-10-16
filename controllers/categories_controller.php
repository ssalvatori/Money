<?php

class CategoriesController extends AppController {

    var $name = 'Categories';

    function index() {
        $this->Category->recursive = 0;
        $this->paginate = array('conditions' => array('Category.user_id' => $this->Auth->user('id')));

        $this->set('categories', $this->paginate());
    }

    function view($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('Invalid category', true));
            $this->redirect(array('action' => 'index'));
        }
        $this->set('category', $this->Category->read(null, $id));
    }

    function add() {
        if (!empty($this->data)) {
            $this->data['Category']['user_id'] = $this->Auth->user('id');
            $this->Category->create();

            if ($this->Category->save($this->data)) {
                $this->Session->setFlash(__('The category has been saved', true));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The category could not be saved. Please, try again.', true));
            }
        }
    }

    function edit($id = null) {
        if (!$id && empty($this->data)) {
            $this->Session->setFlash(__('Invalid category', true));
            $this->redirect(array('action' => 'index'));
        }
        if (!empty($this->data)) {
            if ($this->Category->save($this->data)) {
                $this->Session->setFlash(__('The category has been saved', true));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The category could not be saved. Please, try again.', true));
            }
        }
        if (empty($this->data)) {
            $this->data = $this->Category->read(null, $id);
        }
    }

    function delete($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('Invalid id for category', true));
            $this->redirect(array('action' => 'index'));
        }
        if ($this->Category->delete($id)) {
            $this->Session->setFlash(__('Category deleted', true));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Category was not deleted', true));
        $this->redirect(array('action' => 'index'));
    }

    function get_by_type() {
        Configure::write('debug', 0);
        $this->Category->recursive = -1;
        $categories = $this->Category->find('all', array(
            'conditions' => array('Category.user_id' => $this->Auth->user('id')),
            'fields' => array('id', 'type'),
                )
        );
        $this->set(compact('categories'));
    }

    function get_type() {
        Configure::write('debug', 0);
        $this->Category->recursive = -1;
        $category_id = $this->params['url']['category_id'];
        $categories = $this->Category->find('first', array(
            'conditions' => array('Category.id' => $category_id),
            'fields' => array('id', 'type'),
                )
        );
        $this->set(compact('categories'));
    }

}
?>