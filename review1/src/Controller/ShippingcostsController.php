<?php
/**
 * Created by PhpStorm.
 * User: Vuilniss
 * Date: 3/10/2016
 * Time: 7:34 PM
 */

namespace App\Controller;

use App\Controller\AppController;


class ShippingcostsController extends AppController
{

    public $paginate = ['order' => ['from_weight' => 'asc']];

    public function index()
    {
        if ($this->Auth->user('user_type') == 'admin' || $this->Auth->user('user_type') == 'staff' ) {
            $this->Auth->allow();
            $this->viewBuilder()->layout('internalmenu');
        } else {
            return $this->redirect(['controller' => 'Pages']);
        }

        $shippingcosts = $this->paginate($this->Shippingcosts);

        $this->set(compact('shippingcosts'));
        $this->set('_serialize', ['shippingcosts']);
    }
    
    
    public function add()
    {
        if ($this->Auth->user('user_type') == 'admin' || $this->Auth->user('user_type') == 'staff' ) {
            $this->Auth->allow();
            $this->viewBuilder()->layout('internalmenu');
        } else {
            return $this->redirect(['controller' => 'Pages']);
        }

        $shippingcosts = $this->Shippingcosts->newEntity();
        if ($this->request->is('post')) {
            $shippingcosts= $this->Shippingcosts->patchEntity($shippingcosts, $this->request->data);
            if ($this->Shippingcosts->save($shippingcosts)) {
                $this->Flash->success(__('This price has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('This price could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('shippingcosts'));
        $this->set('_serialize', ['shippingcosts']);
    }


    public function delete($id = null){
        if ($this->Auth->user('user_type') == 'admin') {
            $this->Auth->allow();
        } else {
            return $this->redirect(['controller' => 'Pages']);
        }

        $this->request->allowMethod(['post', 'delete']);
        $shippingcosts = $this->Shippingcosts->get($id);
        if ($this->Shippingcosts->delete($shippingcosts)) {
            $this->Flash->success(__('This price has been deleted.'));
        } else {
            $this->Flash->error(__('This price could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }

    public function edit($id = null){
        if ($this->Auth->user('user_type') == 'admin') {
            $this->Auth->allow();
            $this->viewBuilder()->layout('internalmenu');
        } else {
            return $this->redirect(['controller' => 'Pages']);
        }

        $shippingcosts = $this->Shippingcosts->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $shippingcosts = $this->Shippingcosts->patchEntity($shippingcosts, $this->request->data);
            if ($this->Shippingcosts->save($shippingcosts)) {
                $this->Flash->success(__('This price has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('This price could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('shippingcosts'));
        $this->set('_serialize', ['shippingcosts']);
    }

    public function view($id = null){
        if ($this->Auth->user('user_type') == 'admin' ) {
            $this->Auth->allow();
            $this->viewBuilder()->layout('internalmenu');
        } else {
            return $this->redirect(['controller' => 'Pages']);
        }

        $shippingcosts = $this->Shippingcosts->get($id, [
            'contain' => []
        ]);

        $this->set('shippingcosts', $shippingcosts);
        $this->set('_serialize', ['shippingcosts']);
    }
}
