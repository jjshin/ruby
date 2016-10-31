<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Enquires Controller
 *
 * @property \App\Model\Table\EnquiresTable $Enquires
 */
class EnquiresController extends AppController
{
    public function initialize()
    {
      parent::initialize();
      $this->Auth->deny();
      $this->Auth->allow(['add']);
      $this->viewBuilder()->layout('admin');
    }

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Products']
        ];
        $enquires = $this->paginate($this->Enquires);

        $this->set(compact('enquires'));
        $this->set('_serialize', ['enquires']);
    }

    /**
     * View method
     *
     * @param string|null $id Enquire id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $enquire = $this->Enquires->get($id, [
            'contain' => ['Users', 'Products']
        ]);

        $this->set('enquire', $enquire);
        $this->set('_serialize', ['enquire']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add($product_id=null)
    {
        $this->viewBuilder()->layout('default');
        $enquire = $this->Enquires->newEntity();
        if ($this->request->is('post')) {
            $this->request->data['users_id']=$this->Auth->user('id');
            $enquire = $this->Enquires->patchEntity($enquire, $this->request->data);
            if ($this->Enquires->save($enquire)) {
                $this->Flash->success(__('The enquire has been saved.'));

                if($product_id){
                  return $this->redirect(['controller'=>'Products', 'action'=>'view', $product_id]);
                }else{
                  return $this->redirect(['controller'=>'Main', 'action' => 'index']);
                }
            } else {
                $this->Flash->error(__('The enquire could not be saved. Please, try again.'));
            }
        }
        $this->request->data['products_id']=$product_id;
        $this->set(compact('enquire'));
        $this->set('_serialize', ['enquire']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Enquire id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $enquire = $this->Enquires->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $enquire = $this->Enquires->patchEntity($enquire, $this->request->data);
            if ($this->Enquires->save($enquire)) {
                $this->Flash->success(__('The enquire has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The enquire could not be saved. Please, try again.'));
            }
        }
        $users = $this->Enquires->Users->find('list', ['limit' => 200]);
        $products = $this->Enquires->Products->find('list', ['limit' => 200]);
        $this->set(compact('enquire', 'users', 'products'));
        $this->set('_serialize', ['enquire']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Enquire id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $enquire = $this->Enquires->get($id);
        if ($this->Enquires->delete($enquire)) {
            $this->Flash->success(__('The enquire has been deleted.'));
        } else {
            $this->Flash->error(__('The enquire could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
