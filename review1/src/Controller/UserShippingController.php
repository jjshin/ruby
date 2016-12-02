<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * UserShipping Controller
 *
 * @property \App\Model\Table\UserShippingTable $UserShipping
 */
class UserShippingController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Countries']
        ];
        $userShipping = $this->paginate($this->UserShipping);

        $this->set(compact('userShipping'));
        $this->set('_serialize', ['userShipping']);
    }

    /**
     * View method
     *
     * @param string|null $id User Shipping id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $userShipping = $this->UserShipping->get($id, [
            'contain' => ['Users', 'Countries', 'Orders']
        ]);

        $this->set('userShipping', $userShipping);
        $this->set('_serialize', ['userShipping']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $userShipping = $this->UserShipping->newEntity();
        if ($this->request->is('post')) {
            $userShipping = $this->UserShipping->patchEntity($userShipping, $this->request->data);
            if ($this->UserShipping->save($userShipping)) {
                $this->Flash->success(__('The user shipping has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The user shipping could not be saved. Please, try again.'));
            }
        }
        $users = $this->UserShipping->Users->find('list', ['limit' => 200]);
        $countries = $this->UserShipping->Countries->find('list', ['limit' => 200]);
        $this->set(compact('userShipping', 'users', 'countries'));
        $this->set('_serialize', ['userShipping']);
    }

    /**
     * Edit method
     *
     * @param string|null $id User Shipping id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $userShipping = $this->UserShipping->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $userShipping = $this->UserShipping->patchEntity($userShipping, $this->request->data);
            if ($this->UserShipping->save($userShipping)) {
                $this->Flash->success(__('The user shipping has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The user shipping could not be saved. Please, try again.'));
            }
        }
        $users = $this->UserShipping->Users->find('list', ['limit' => 200]);
        $countries = $this->UserShipping->Countries->find('list', ['limit' => 200]);
        $this->set(compact('userShipping', 'users', 'countries'));
        $this->set('_serialize', ['userShipping']);
    }

    /**
     * Delete method
     *
     * @param string|null $id User Shipping id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $userShipping = $this->UserShipping->get($id);
        if ($this->UserShipping->delete($userShipping)) {
            $this->Flash->success(__('The user shipping has been deleted.'));
        } else {
            $this->Flash->error(__('The user shipping could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
